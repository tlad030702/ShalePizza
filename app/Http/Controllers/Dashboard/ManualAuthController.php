<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManualAuthController extends Controller
{
    public function ask(){
        return view('auth.login');
    }

    public function signin(Request $request){

        //TODO: write your code to verify username and password
        /**
         * you have to check if username and password
         * match a record in database
         * then save username in Session and move to next page
         * Otherwise, go back to login form
         */
        Session::put('email', $request->input('email'));
        return to_route('manager');
    }

    public function logout(){
        if (Session::has('email')){
            Session::forget('email');
        }
        return to_route('auth.ask');
    }
}
