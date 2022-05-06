<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Repositories\AdminRepos;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

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
        $this->rules($request)->validate();

        AdminRepos::update($id, $request->name, $request->email);

        return to_route('admins');
    }

    private function rules($request)
    {
        return Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:admins,email',
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
