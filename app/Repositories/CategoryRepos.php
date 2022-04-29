<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CategoryRepos
{
    public static function getAll()
    {
        $sql ='SELECT * FROM categories';

        return DB::select($sql);
    }
}