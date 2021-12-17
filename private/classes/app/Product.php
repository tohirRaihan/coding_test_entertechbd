<?php
namespace App;

use Database\Database;

class Product extends Database
{
    public static function all()
    {
        $sql = "SELECT * FROM `products` ORDER BY `id` DESC";
        return parent::getRows($sql, []);
    }
}
