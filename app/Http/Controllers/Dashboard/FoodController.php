<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\FoodRepo;
use App\Repositories\CategoryRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class FoodController extends Controller
{
    public function index(){
        return view('dashboard.foods.index', [
            'foods' => FoodRepo::getAllWithCategory()
        ]);
    }

    public function search(Request $request){
        return view('dashboard.foods.search',[
            'search' => FoodRepo::search($request->search),
            'foods' => FoodRepo::getAllWithCategory()
        ]);
    }

    public function create(){
        return view('dashboard.foods.create',
            ['categories'=>CategoryRepos::getAll()]
        );
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
        $message = function ($attribute, $value, $fail){
            if($value == ''){
                $fail('You must enter name of food');
                return $value=='';
            }
        };
        return[
            'name'=>[$message,'string','max:255'],
            'price' => 'required|numeric|gte:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
            'description' => 'nullable',
            'category_id'=> 'required',
        ];
    }
}
