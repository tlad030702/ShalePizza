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

    public static function search($search){
        $name = '%' . $search . '%';
        $sql = "SELECT food.* , categories.name as categoryName FROM food JOIN categories on food.category_id = categories.id WHERE food.name LIKE ?";
        return DB::select($sql,[$name]);
    }

    public static function getAllWithCategory()
    {
        $sql = 'select f.*, c.name as categoryName ';
        $sql .= 'from food as f ';
        $sql .= 'join categories as c on f.category_Id = c.id';

        return DB::select($sql);
    }

    public static function getById($id){
        $sql = "SELECT * FROM food WHERE id = ?";

        return DB::selectOne($sql,[$id]);
    }

    public static function getByIdWithCategory($id){
        $sql = 'SELECT food.* , categories.name as categoryName FROM food JOIN categories on food.category_id = categories.id WHERE food.id = ?';

        return DB::selectOne( $sql, [$id]);
    }

    public static function getRelativesByCategory($id, $limit){
        $sql = 'SELECT * FROM food WHERE category_id = ? LIMIT ?';

        return DB::select($sql, [$id, $limit]);
    }

    public static function insert($name, $price, $image, $description, $category_id){
        $sql = "INSERT INTO food (name, price, image, description, category_id) VALUES (?,?,?,?,?)";
        $result = DB::insert($sql,[$name, $price, $image, $description, $category_id]);
        
        if($result)
            return DB::getPdo()->lastInsertId();
        else
            return -1;
    }

    public static function update($id, $name, $price, $image, $description, $category_id){
        $sql = "UPDATE food SET name = ?, price =?, image=?, description=?, category_id=? WHERE id = ?";

        return DB::update($sql,[$name, $price, $image, $description, $category_id, $id]);
    }

    public static function delete($id)
    {
        $sql = 'DELETE FROM food WHERE id = ?';

        return DB::delete($sql, [ $id ]);
    }
}