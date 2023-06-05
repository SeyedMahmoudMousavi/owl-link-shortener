<?php
session_start();
/**
 * Add IRON ELEPHANT library to project
 */
require_once __DIR__ . "/main.php";
require_once 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Owl link shortener : Craete link</title>
    <link rel="apple-touch-icon" sizes="180x180" href="resources/fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="resources/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="resources/fav/favicon-16x16.png">
    <link rel="manifest" href="resources/fav/site.webmanifest">
    <link rel="stylesheet" href="resources/bootstrap-5.3.0-dist/css/bootstrap.min.css">
    <script src="resources/bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="resources/font-family.css">
    <link rel="stylesheet" href="resources/style.css">
</head>

<body>
    <!-- Header -->
    <div class="container-fluid bg-dark text-white p-5 rounded-5 w-75 mt-3 border-bottom border-5 border-end border-start border-danger shadow">
        <h1 class="text-center vonique"><strong>Owl</strong> link shortener</h1>
        <h2 class="text-center vonique">Simplify, track and manage your links</h2>
    </div>
    <!-- Form -->
    <div class="container-fluid bg-light p-5 rounded-5 text-center mt-3">
        <span class="btn-group shadow my-4">
            <a class="btn btn-outline-success" href="analyze.php">link analysis</a>
            <a class="btn btn-outline-success" href="index.php">shortening the link</a>
        </span>
        <p class="display-6">Add the following button to the bookmark bar with 'dragging and dropping' and easily shorten the link when visiting a site by pressing this button.</p>
        <a class="btn btn-outline-danger shadow" href="javascript:void(location.href='<?= WEB_ADDRESS; ?>/core/create.php?short_url=&long_url='+encodeURIComponent(location.href));" title="Shorten">✂️ Shorten Owl</a>

    </div>
    <!-- Footer -->
    <footer class="audiowide bg-dark text-white p-3 text-center border-top border-5 border-danger">Copyright © 2020-<?= date('Y'); ?> by All rights reserved
    </footer>
</body>

</html>
<?php session_unset(); ?>