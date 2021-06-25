<?php

namespace App\Http\Controllers;

use App\Mail\UserSendMail; 
use Illuminate\Http\Request; 
//use App\Models\User;
use Illuminate\Support\Facades\MAIL;

class UserMailController extends Controller
{
    public function sendEmail(Request $request) { 
        $title = 'Thank you for your order'; 
        $customer_details = [ 
        'name' => $request->get('name'), 
        
        'email' => $request->get('email') 
        ]; 
        
           $sendmail = MAIL::to($customer_details['email'])
           ->send(new UserSendMail($title, $customer_details));
           if (empty($sendmail)) { 
             return response()->json(['message'
             => 'Mail Sent Sucssfully'], 200); 
             }else{ 
                 return response()->json(['message' => 'Mail Sent fail'], 400); } } 
}
