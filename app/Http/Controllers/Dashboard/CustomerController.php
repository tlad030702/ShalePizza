<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\CustomerRepos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        return view('dashboard.customer.index', [
            'customers' => CustomerRepos::getAll()
        ]);
    }
    
    public function store(Request $request){
        $this->validate($request, $this->rules());

        CustomerRepos::insert(
            $request->name,
            $request->email,
            $request->phone,
            $request->address,
            $request->country,
            $request->gender
        );
        return to_route('manager.home');
    }

    public function edit(int $id)
    {
        return view('dashboard.customer.edit', [
            'customer' => CustomerRepos::getById($id),
        ]);
    }

    public function update(Request $request, int $id)
    {
        $this->validate($request, $this->rules());

        CustomerRepos::update(
            $id,
            $request->name,
            $request->email,
            $request->phone,
            $request->address,
            $request->country,
            $request->gender
        );

        return to_route('manager.customer');
    }

    public function confirm($id){
        return view('dashboard.customer.confirm',[
            'customer'=>CustomerRepos::getById($id)
        ]);
    }

    public function delete(int $id)
    {
        CustomerRepos::delete($id);

        return to_route('manager.customer');
    }

    public function rules(){
        return [
            'name'=>'required', 
            'email'=>'required|email:rfc,dns',
            'phone'=>'required|digits:10,11|starts_with:0|',
            'address'=>'required',
            'gender' => 'required',
        ];
    }
}
