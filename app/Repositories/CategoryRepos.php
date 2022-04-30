<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CategoryRepos
{
    public static function getAll()
    {
        $sql = 'SELECT * FROM categories';
        //SQL Command
        return DB::select ($sql);
    }

    public static function getByID($id)
    {
        $sql = 'SELECT * FROM categories WHERE id = ?';

        return DB::selectOne($sql, [ $id ]);
    }

    public static function getAllFoodByCate($id){
        $sql = 'SELECT * FROM food WHERE category_id = ?';

        return DB::select($sql, [$id]);
    }

    public static function insert($name)
    {
        $sql = 'INSERT INTO categories (name) VALUES (?)';

        DB::insert($sql, [$name]);

        return DB::getPdo()->lastInsertId();
        
    }

    public static function updates($id, $name)
    {
        $sql = 'UPDATE categories SET name = ? WHERE id = ?';

         return DB::update($sql, [$name, $id]);
    }

    public static function delete($id)
     {
         $sql = 'DELETE FROM categories WHERE id = ?';

         return DB::delete($sql, [$id]);
     }

}