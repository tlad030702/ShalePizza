<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AdminRepos;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ManualAuthController extends Controller
{
    public function ask(){
        return view('auth.login');
    }

    public function signin(Request $request){

        $validation = $this->rules($request);
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }
        else{
            $email = $request->input('email');
            $password = sha1($request->input('password'));
        }

        $account = AdminRepos::login($email, $password);
        // dd($account);
        if($account != null){
            Session::put('name', $account->name);
            return to_route('manager');
        }
        else{
            return redirect()->back()->with(['msg' => 'Wrong user name or password'])->withInput();
        }
    }

    public function logout(){
        if (Session::has('email')){
            Session::forget('email');
        }
        // session()->flush();
        return to_route('auth.ask');
    }

    public function rules($request)
    {
        return Validator::make(
            $request->all(),
            [
                'email' => ['required','string','email','max:255'],
                'password'=> ['required']
            ],
            [
                'email.required'=>'email must not empty',
                'password'=>'password must not empty'
            ]
        );
    }
}
