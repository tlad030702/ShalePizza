<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class FoodRepo
{
    public static function getAll()
    {
        $sql = "SELECT * FROM food";

        return DB::select($sql);
    }

    public static function getAllWithCategory()
    {
        $sql = 'select f.*, c.name as categoryName ';
        $sql .= 'from food as f ';
        $sql .= 'join categories as c on f.category_Id = c.id ';
        $sql .= 'order by f.name ';

        return DB::select($sql);
    }

    public static function insert($name, $price, $image, $description, $category_id){
        $sql = "INSERT INTO food (name, price, image, description, category_id) VALUES (?,?,?,?,?)";
        $result = DB::insert($sql,[$name, $price, $image, $description, $category_id]);
        
        if($result)
            return DB::getPdo()->lastInsertId();
        else
            return -1;
    }
}