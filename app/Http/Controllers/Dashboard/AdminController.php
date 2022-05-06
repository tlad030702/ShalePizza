<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Repositories\AdminRepos;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        $admins = AdminRepos::getAll();
        return view('dashboard.admin.index', [
            'admin' => $admins,
        ]);
    }

     public function edit($id)
    {
        return view('dashboard.admin.edit', [
            'admin' => AdminRepos::getByID($id)
        ]);
    }

    public function update(Request $request, $id)
    { 
        $this->rules($request,$id)->validate();

        AdminRepos::update($id, $request->name, $request->email);

        return to_route('manager.admins');
    }


    public function confirm(Request $request,$id)
    {
        $validation = $this->rules($request,$id);
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }
        else{
            $email = $request->input('email');
            $password = sha1($request->input('password'));
        }
        
        $account = AdminRepos::confirm($email, $password);
        if($account != null){
            Session::put('name', $account->name);
            return to_route('manager.admin.update');
        }
        else{
            return redirect()->back()->with(['msg' => 'Wrong password'])->withInput();
        }
    }
    

    private function rules($request, $id)
    {
        return Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'email' => ['required','string','email','max:255',Rule::unique('admins')->ignore($id)],
            ],
        );
        
    }

    // protected function passwordRules()
    // {
    //     return [
    //         'confirmed',
    //         Password::min(8)
    //             ->mixedCase()
    //             ->letters()
    //             ->numbers()
    //             ->uncompromised()
    //     ];
    // }
}
