<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepos;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.category.index', [
            'categories' => CategoryRepos::getAll()
        ]);
    }


    
}
