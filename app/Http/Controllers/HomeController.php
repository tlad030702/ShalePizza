<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FoodRepo;
use App\Repositories\CategoryRepos;

class HomeController extends Controller
{
    public function show($id)
    {
        $food = FoodRepo::getByIdWithCategory($id);

        return view('detail', [
            'food' => $food,
            'relatives' => FoodRepo::getRelativesByCategory($food->category_id, 4)
        ]);
    }
    public function index()
    {
        return view('welcome', [
            'foods' => FoodRepo::getAllWithCategory(),
            'categories'=> CategoryRepos::getAll()
        ]);
    }

    public function search(Request $request)
    {
        return view('search', [
            'search' => FoodRepo::search($request->search),
            'categories'=> CategoryRepos::getAll()
        ]);
    }

    public function filter($id)
    {
        return view('welcome',[
            'foods' => CategoryRepos::getAllFoodByCate($id),
            'categories'=> CategoryRepos::getAll()
        ]);
    }
}
