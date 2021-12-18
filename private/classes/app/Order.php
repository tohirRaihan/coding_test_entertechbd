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

    public static function updateStatus($status, $id)
    {
        $sql = "UPDATE `orders` SET `status`=? WHERE `id`=? LIMIT 1";
        return parent::updateRow($sql, [$status, $id]);
    }

    public static function checkProductAndOrder()
    {
        $sql = "SELECT
                orders.product_id,
                SUM(orders.quantity) AS total_orders,
                SUM(orders.amount) AS total_amount,
                products.name as product_name
                FROM `orders`
                JOIN products
                ON orders.product_id = products.id
                GROUP BY orders.product_id";
        return parent::getRows($sql, []);
    }
}
// Create a new order to instantiate a Connection
$order = new Order;
