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

    public static function login($email, $password)
    {
        $sql = "SELECT * FROM admins WHERE email='" . $email . "' AND password ='" . $password ."'";
        return DB::selectOne($sql);
    }
}