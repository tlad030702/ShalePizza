<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class AdminRepos
{
    public static function getAll()
    {
        $sql = 'SELECT * FROM admins';
        //SQL Command
        return DB::select ($sql);
    }
}