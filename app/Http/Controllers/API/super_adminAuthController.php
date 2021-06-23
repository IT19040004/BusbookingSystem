<?php

namespace App\Http\Controllers\API;

use App\Models\super_admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class super_adminAuthController extends Controller
{
    public function super_admin_register(Request $request)
    {
        
        $data = $request->validate([
            'name'=>'required|string|max:191',
            'email'=>'required|email|max:191|unique:super_admins,email',
            'password'=>'required|string',
        ]);

        $super_admin = super_admin::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password']),
        ]);

        $token = $super_admin->createToken('BusBookingSystemProjectToken')->plainTextToken;

        $response = [
            'user'=>$super_admin,
            'token'=>$token,
        ];

        return response($response, 201);

    }
   
    public function super_admin_logout()
    {
        auth()->user()->tokens()->delete();
        return response(['message'=>'Logged Out Successfully.']);
    }

    public function super_admin_login(Request $request)
    {
        $data = $request->validate([
            'email'=>'required|email|max:191',
            'password'=>'required|string',
        ]);

        $super_admin = super_admin::where('email', $data['email'])->first();

        if(!$super_admin || !Hash::check($data['password'], $super_admin->password))
        {
            return response(['message'=>'Invalid Credentials'],401);
        }
        else
        {
            $token = $super_admin->createToken('BusBookingSystemProjectTokenLogin')->plainTextToken;

            $response = [
                'user'=>$super_admin,
                'token'=>$token,
            ];

             return response($response, 201);
        }
    }
}
