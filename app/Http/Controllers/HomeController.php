<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FoodRepo;

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
}
