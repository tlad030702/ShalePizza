<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepos;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        // CateRepo là class nối một nguồn dữ liệu, bên trong là một static function

        $categories = CategoryRepos::getAll();
        return view('dashboard.category.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('dashboard.category.create',
        ["category" => (object)[
            'id' => '',
            'name' => '',
        ]]);
    }

    public function edit($id)
    //id from link
    {
        return view('dashboard.category.edit', [
            'category' => CategoryRepos::getByID($id)
        ]);
    }

    public function update(Request $request, $id)
    { 
        $this->rules($request)->validate();

        CategoryRepos::updates($id, $request->name);

        return to_route('category');
    }

    public function store(Request $request)
    {
        $this->rules($request)->validate(); //shortcut

        CategoryRepos::insert($request->name);

        return to_route('category');
    }

    public function destroy(int $id)
    {
        return view('dashboard.category.destroy', [
            'category' => CategoryRepos::getById($id),
            'shouldDelete' => count(CategoryRepos::getAllFoodByCate($id)) == 0
        ]);
        
    }

    public function delete(int $id)
    {
       CategoryRepos::delete($id);

        return to_route('category');
    }

    private function rules($request)
    {
        return Validator::make(
            $request->all(),
            [
                'name' =>'required|nullable|string',
            ],
        );
        
    }
}


