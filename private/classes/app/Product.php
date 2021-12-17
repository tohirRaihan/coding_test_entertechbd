<?php

namespace App;

use Database\Database;

class Product extends Database
{
    public static function all()
    {
        $sql = "SELECT * FROM `products` ORDER BY `name`";
        return parent::getRows($sql, []);
    }

    public static function find($id)
    {
        $sql = "SELECT * FROM `products` WHERE `id`=?";
        return parent::getRow($sql, [$id]);
    }

    public static function create($name, $unit_price, $location)
    {
        $sql = "INSERT INTO `products`(`name`, `unit_price`, `location`) VALUES (?, ?, ?)";
        return parent::insertRow($sql, [$name, $unit_price, $location]);
    }
}
// Create a new product to instantiate a Connection
$item = new Product;
