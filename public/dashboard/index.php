<?php

require_once('../../private/initialize.php');

use App\Order;
use App\User;

User::authAdmin();
$checkOrders = Order::checkProductAndOrder();
$count = 1;
?>

<!-- #####=START Header=##### -->
<?php require_once(SHARED_PATH . '/header.php'); ?>
<!-- #####=END Header=##### -->

<!-- #####=START Admin nav=##### -->
<?php require_once(SHARED_PATH . '/admin_nav.php'); ?>
<!-- #####=END Admin nav=##### -->

<!-- main content -->
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-5 text-center">Welcome to the Admin Panel</h1>

            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Total Orders</th>
                        <th scope="col">Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($checkOrders as $checkOrder) : ?>
                        <tr>
                            <th scope="row"><?= $count++ ?></th>
                            <td><?= $checkOrder['product_name'] ?></td>
                            <td><?= $checkOrder['total_orders'] ?></td>
                            <td>$<?= $checkOrder['total_amount'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- #####=START FOOTER=##### -->
<?php require_once(SHARED_PATH . '/footer.php'); ?>
<!-- #####=END FOOTER=##### -->
