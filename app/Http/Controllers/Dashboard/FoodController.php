<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\FoodRepo;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

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
        return view('dashboard.foods.create',
            // [
            //     "food" = (object)[
            //         'name'=>'',
            //         'price' =>0,
            //         'image' =>'',
            //         'description'=>'',
            //         'category_id'=>''
            //     ]
            // ]
        );
    }

    public function store(Request $request){
        $this->validate($request, $this->rules());
        // $this->formValidatee($request)->validate();
        FoodRepo::insert(
            $request->name,
            $request->price,
            $this->upload($request->file('image')),
            $request->description,
            $request->category_id
        );
        // $this->rules($request)->validate();
        // $food =(object)[
        //     'name'=>$request->input('name'),
        //     'price' => $request->input('price'),
        //     'image' => $this->upload($request->file('image')),
        //     'description'=>$request->input('description'),
        //     'category_id'=>$request->input('category_id')
        // ];
        // FoodRepo::insert($food);
    }

    public function rules(){
        return[
            'name'=>'required|string|max:255',
            'price' => 'required|numeric|gte:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
            'description' => 'nullable',
            'category_id'=> 'required',
        ];
        // return Validator::make(
        //     $request->all(),
        //     [
        //         'name'=>'required|string|max:255',
        //         'price' => 'required|numeric|gte:0',
        //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
        //         'description' => 'nullable',
        //         'category_id'=> 'required',
        //     ],
        //     [
        //         'name.required'=>'Please enter name of food'
        //     ]
        // );
    }
}
