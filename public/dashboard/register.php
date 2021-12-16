<?php
require_once('../../private/initialize.php');
$scripts = ['register'];
?>

<!-- #####=START Header=##### -->
<?php require_once(SHARED_PATH . '/header.php'); ?>
<!-- #####=END Header=##### -->

<!-- main content -->
<div class="container pt-sm-5 ">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-5">
            <div class="card shadow-lg">
                <div class="border-top border-3 border-primary rounded-top"></div>
                <i class="d-block fas fa-user-circle text-center text-primary my-3" style="font-size: 80px;"></i>

                <div class="card-body px-5">
                    <form onsubmit="register(event)" method="POST">
                        <div class="mb-3">
                            <input id="name" type="text" class="form-control py-2" placeholder="Your full name">
                        </div>

                        <div class="mb-3">
                            <input id="email" type="email" class="form-control py-2" placeholder="Your email">
                        </div>

                        <div class="mb-3">
                            <input id="password" type="password" class="form-control py-2" placeholder="Password">
                        </div>

                        <div class="mb-3">
                            <input id="confirm_password" type="password" class="form-control py-2" placeholder="Confirm password">
                        </div>
                        <button type="submit" class="btn btn-primary d-block col-5 mx-auto my-3">Register</button>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <a href="<?= url_for('dashboard/login.php') ?>">Already have an account?</a>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<!-- #####=START FOOTER=##### -->
<?php require_once(SHARED_PATH . '/footer.php'); ?>
<!-- #####=END FOOTER=##### -->
