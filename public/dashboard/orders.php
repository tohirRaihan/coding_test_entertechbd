<?php

use App\Order;

require_once('../../private/initialize.php');

$orders = Order::all();
$count = 1;
?>

<!-- #####=START Header=##### -->
<?php require_once(SHARED_PATH . '/header.php'); ?>
<!-- #####=END Header=##### -->

<!-- #####=START Admin nav=##### -->
<?php require_once(SHARED_PATH . '/admin_nav.php'); ?>
<!-- #####=END Admin nav=##### -->

<!-- main content -->
<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="text-center mb-4">All Orders</h1>

            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order) : ?>
                        <tr>
                            <th scope="row"><?= $count++ ?></th>
                            <td><?= $order['user_name'] ?></td>
                            <td><?= $order['product_name'] ?></td>
                            <td><?= $order['quantity'] ?></td>
                            <td>$<?= $order['amount'] ?></td>
                            <td><?= $order['status'] ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#change-order-status">
                                    Change Status
                                </button>
                            </td>
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
