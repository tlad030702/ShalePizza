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

    public static function getByID($id)
    {
        $sql = 'SELECT * FROM admins WHERE id = ?';

        return DB::selectOne($sql, [ $id ]);
    }

    public static function update($id, $name, $email)
    {
        $sql = 'UPDATE admins SET name = ?, email = ? WHERE id = ?';

         return DB::update($sql, [$name, $email, $id]);
    }
  
    // public static function confirm($password)
    // {
    //     $sql = "SELECT * FROM admins WHERE password = ?";
    //     return DB::selectOne($sql,[$password]);
    // }
}