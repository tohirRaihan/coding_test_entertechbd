<?php

require_once('../../private/initialize.php');

use App\Order;
use Database\Session;

$orders = Order::all();
$count = 1;
$scripts = ['order'];
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

            <!-- success message goes here -->
            <?php if ($message = Session::getFlashData('success_message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $message ?>
                </div>
            <?php endif; ?>

            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Change Status</th>
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
                                <form onsubmit="changeStatus(event, <?= $order['id'] ?>)">
                                    <div class="input-group">
                                        <select id="change_status" class="form-select" required>
                                            <option value="" selected>Select Status</option>
                                            <option value="Submitted">Submitted</option>
                                            <option value="In transit">In transit</option>
                                            <option value="Delivered">Delivered</option>
                                        </select>
                                        <button type="submit" class="input-group-text btn btn-sm btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<!-- ########## START: MODALS ########## -->
<?php include_once PRIVATE_PATH . '/modals/orders/change_status.php' ?>
<!-- ########## END: MODALS ########## -->

<!-- #####=START FOOTER=##### -->
<?php require_once(SHARED_PATH . '/footer.php'); ?>
<!-- #####=END FOOTER=##### -->
