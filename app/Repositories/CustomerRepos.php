<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CustomerRepos
{
    public static function getAll()
    {
        $sql ='SELECT * FROM customers';

        return DB::select($sql);
    }

    public static function getById($id)
    {
        $sql = 'SELECT * FROM customers WHERE id = ?';

        return DB::selectOne($sql, [$id]);
    }

    public static function insert($name, $email, $phone, $address, $country, $gender)
    {
        $sql = 'INSERT INTO customers (name, email, phone, address, country, gender) VALUES (?, ?, ?, ?, ?, ?)';

        DB::insert($sql, [$name, $email, $phone, $address, $country, $gender ]);

        return DB::getPdo()->lastInsertId();
    }

    public static function update($id, $name, $email, $phone, $address, $country, $gender)
    {
        $sql ='UPDATE customers SET name =?, email = ?, phone = ?, address = ?, country = ?, gender = ? WHERE id = ?';

        return DB::update($sql, [$name, $email, $phone, $address, $country, $gender, $id ]);
    }

    public static function delete($id)
    {
        $sql = 'DELETE FROM customers WHERE id = ?';

        return DB::delete($sql, [$id]);
    }
}