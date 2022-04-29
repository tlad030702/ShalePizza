<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\FoodRepo;
use App\Repositories\CategoryRepo;
use App\Repositories\CategoryRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
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
            ['categories'=>CategoryRepos::getAll()]
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
        return to_route('foods');
    }

    public function edit($id){
        return view('dashboard.foods.edit',[
            'food'=>FoodRepo::getById($id),
            'categories'=>CategoryRepos::getAll()
        ]);
    }

    public function update(Request $request, $id){
        $this->validate($request, $this->rules());
        FoodRepo::update(
            $id,
            $request->name,
            $request->price,
            $this->upload($request->file('image')),
            $request->description,
            $request->category_id
        );

        return to_route('foods');
    }

    public function upload(UploadedFile $image){
        $str = Str::random(7) . $image->getClientOriginalName() . $image->getClientOriginalName();
        $image->move(public_path('media'), $str);
        return "media/$str";
    }

    public function confirm($id){
        return view('dashboard.foods.confirm',[
            'food'=>FoodRepo::getById($id),
            'categories'=>CategoryRepos::getAll()
        ]);
    }

    public function delete($id){
        FoodRepo::delete($id);
        return to_route('foods');
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
