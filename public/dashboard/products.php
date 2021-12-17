<?php

require_once('../../private/initialize.php');

use App\Product;

$products = Product::all();
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
            <h1 class="text-center mb-4">All products</h1>
            <a class="btn btn-success mb-3" href="">
                New Product <i class="fa fa-plus-circle ml-2" aria-hidden="true"></i>
            </a>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Location</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <th scope="row"><?= $count++ ?></th>
                            <td><?= $product['name'] ?></td>
                            <td>$<?= $product['unit_price'] ?></td>
                            <td><?= $product['location'] ?></td>
                            <td><?= $product['created_at'] ?></td>
                            <td><?= $product['updated_at'] ?></td>
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
