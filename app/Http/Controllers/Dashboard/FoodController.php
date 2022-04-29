<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\FoodRepo;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(){
        return view('dashboard.foods.index', [
            'foods' => FoodRepo::getAllWithCategory()
        ]);
    }

    public function search(){

    }

    public function create(){
        return view('dashboard.foods.create');
    }

    public function store(Request $request){
        $this->validate($request, $this->rules());

        FoodRepo::insert(
            $request->name,
            $request->price,
            $this->upload($request->file('image')),
            $request->description,
            $request->category_id
        );
    }

    public function rules(){
        return[
            'name'=>'required|string|max:255',
            'price' => 'required|numeric|gte:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
            'description' => 'nullable',
            'category_id'=> 'required'
        ];
        [
            
        ];
    }
}
