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
}
// Create a new product to instantiate a Connection
$item = new Product;
