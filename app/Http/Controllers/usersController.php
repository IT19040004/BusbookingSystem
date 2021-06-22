<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class usersController extends Controller
{
    //Get Function
    public function index()
    {
        $users = user::all();
        return response()->json(['users'=> $users], 200);
    }

    //Show Function
    public function show($id)
    {
        $users = user::find($id);

        if($users)
        {
            return response()->json(['users'=> $users], 200);
        }
        else
        {
            return response()->json(['message'=> 'No user Details'], 404);
        }
        
    }

    //Insert Function
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:191',
            'email'=>'required|max:191',
            'password'=>'required|max:191',
        ]);
  
        $users = new user;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;	
        $users->save();
        return response()->json(['message'=>'Added Successfully'], 200);
    }

    //Update Function
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:191',
            'email'=>'required|max:191',
            'password'=>'required|max:191',
        ]);
  
        $users = user::find($id);
        if($users)
        {
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = $request->password;	
            $users->update();
            return response()->json(['message'=>'Update Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Update user Details'], 404);
        }
        
    }

    //Delete Function
    public function destroy($id)
    {
        $users = user::find($id);
        if($users)
        {
            $users->delete();
            return response()->json(['message'=>'Delete Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Delete user Details'], 404);
        }
    }
}
