<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    public function get(Request $request){
        return view('sign-in');
    }

    public function post(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'account_type' =>"Student"])) {   
            return redirect(route('student-view.get',32))->with("success","Credentials are valid");
        }
        
        return redirect(route('sign-in.get'))->with("error","Login Credentials are not Valid");
    }
}