<?php

namespace App;

use Database\Database;

class Order extends Database
{
    public static function create($user_id, $product_id, $quantity, $amount)
    {
        $sql = "INSERT INTO `orders`(`user_id`, `product_id`, `quantity`, `amount`) VALUES (?,?,?,?)";
        return parent::insertRow($sql, [$user_id, $product_id, $quantity, $amount]);
    }
}
// Create a new order to instantiate a Connection
$order = new Order;
