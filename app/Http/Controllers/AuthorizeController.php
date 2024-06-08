<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthorizeController extends Controller
{
    public function __invoke(Request $request)
    {
        

            $userId = Session::get('user_id');
            $password = Session::get('password');
            $roleId = Session::get('role_id'); // Changed hget to get

            if(!$userId && !$password){
                abort('404');
            }
            else{
                if(in_array($roleId, [0, 23])){
                    if (Auth::attempt(["id" => $userId, "password" => $password])) {
                        if ($roleId == 0) {
                            return redirect()->route('student-view.get');
                        } elseif ($roleId == 23) {
                            return redirect()->route('cp-dashboard');
                        }
                    }
                }
            }
        

        // If the environment is not production, you may want to handle this case as well
        return redirect()->route('login'); // or some other route
    
        }
    }
