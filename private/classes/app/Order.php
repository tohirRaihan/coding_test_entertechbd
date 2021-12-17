<?php

namespace App;

use Database\Database;

class Order extends Database
{
    public static function all()
    {
        $sql = "SELECT
                orders.id,
                orders.quantity,
                orders.amount,
                orders.status,
                users.name as user_name,
                users.email as user_email,
                products.name as product_name
                FROM orders
                JOIN users
                ON orders.user_id = users.id
                JOIN products
                ON orders.product_id = products.id
                ORDER BY `id` DESC;";
        return parent::getRows($sql, []);
    }

    public static function create($user_id, $product_id, $quantity, $amount)
    {
        $sql = "INSERT INTO `orders`(`user_id`, `product_id`, `quantity`, `amount`) VALUES (?,?,?,?)";
        return parent::insertRow($sql, [$user_id, $product_id, $quantity, $amount]);
    }
}
// Create a new order to instantiate a Connection
$order = new Order;
