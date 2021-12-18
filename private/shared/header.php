<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/652ace3a30.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= url_for('assets/css/bootstrap.min.css') ?>" />
    <!-- File specific Styles -->
    <?php
    if (isset($styles)) {
        load_styles(url_for('assets/css/'), $styles);
    }
    ?>

    <title>Coding Task | <?= $page_title ?></title>
</head>

<body>
