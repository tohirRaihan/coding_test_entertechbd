<?php

require_once('../private/initialize.php');

use App\Product;

$products = Product::all();
$count = 1;
?>

<!-- #####=START Header=##### -->
<?php require_once(SHARED_PATH . '/header.php'); ?>
<!-- #####=END Header=##### -->

<!-- main content -->
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-5 text-center">All products</h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Location</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product): ?>
                        <tr>
                            <th scope="row"><?= $count++ ?></th>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['unit_price'] ?></td>
                            <td><?= $product['location'] ?></td>
                            <td>
                                <button class="btn btn-sm btn-primary">Buy<i class="fas fa-shopping-basket ms-1"></i></button>
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
