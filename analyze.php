<?php
session_start();

require_once "alternative_func.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="Owl link shortener">
    <title>Owl link shortener : Analyze</title>
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
    <div class="container-fluid bg-dark text-white p-5 rounded-5 w-75 mt-3 shadow border-bottom border-end border-start border-5 border-success">
        <h1 class="text-center vonique"><strong>Owl</strong> URL Analysis</h1>
        <h2 class="text-center vonique">Streamline, track and manage your links</h2>
    </div>
    <!-- Link information -->
    <?php if (session("long_url")) : ?>
        <div id="result" class="container-fluid bg-warning rounded-5 p-5 mt-3 shadow border border-5 border-dark">
            <div class="row">
                <div class="col">
                    <h3 class="audiowide text-center">last visit</h3>
                    <p class="text-center"><?= session("last_visit_date"); ?></p>
                </div>
                <div class="col">
                    <h3 class="audiowide text-center">Total visit</h3>
                    <p class="text-center"><?= session("visit"); ?></p>
                </div>
                <div class="col">
                    <h3 class="audiowide text-center">Date of creation</h3>
                    <p class="text-center"><?= session("create_date"); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <h3 class="audiowide text-center">Short link</h3>
                    <?php $short_url = WEB_ADDRESS . "/" . session('short_url'); ?>
                    <a href="<?= $short_url; ?>"><?= $short_url; ?></a>
                </div>
                <div class="col text-center">
                    <h3 class="audiowide text-center">QR Code</h3>
                    <img class="img-fluid w-50 border border-dark" src="<?= qr($short_url, WEB_ADDRESS) ?> ">
                </div>
                <div class="col text-center">
                    <h3 class="audiowide text-center">Main link</h3>
                    <?php $long_url = session('long_url'); ?>
                    <a href="<?= $long_url; ?>"><?= $long_url; ?></a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Form -->
    <div class="container-fluid bg-light p-5 rounded-5 text-center mt-3">
        <!-- Error -->
        <?php if (session("error")) : ?>
            <div id="error" class="alert alert-danger alert-dismissible shadow w-75 mx-auto">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <p>
                    <?= error(); ?>
                </p>
            </div>
        <?php endif; ?>
        <!-- Get Information -->
        <form method="POST" action="core/get_status.php">
            <div class="input-group my-4 shadow">
                <label class="input-group-text bg-success text-white" for="link">URL : </label>
                <input class="form-control" type="url" autofocus required placeholder="Enter a valid link" id="link" name="link" value="<?php if (session('link')) {
                                                                                                                                            e_session('link');
                                                                                                                                        } ?>">
                <button class="btn btn-primary" type="submit">Check it out</button>
            </div>
        </form>
        <span class="btn-group shadow">
            <a class="btn btn-outline-success" href="index.php">Shorten the link</a>
            <a class="btn btn-outline-success" href="easy_shorten.php">Shorten the link easily</a>
        </span>
    </div>
    <!-- Other -->
    <div class="container-fluid bg-info rounded-5 p-5">
        <div class="row">
            <div class="col">
                <h2 class="audiowide h-120">More than a link shortener</h2>
                <p>Owl lets you know more about click through links. We offer you a huge marketing tool with an advanced
                    URL tracking system for free and without any hidden obligations. Why? Because we believe the best
                    things should be free.</p>
            </div>
            <div class="col">

                <h2 class="audiowide h-120">Link management platform</h2>
                <p>Optimize and customize each short URL to get the most out of it. Set your nickname (name), use it in
                    affiliate programs. For example, in virtual networks and various messengers, both internal and
                    external, without restrictions.</p>
            </div>
            <div class="col">
                <h2 class="audiowide h-120">Detailed analysis</h2>
                <p>Linking each shortened link in real time and measuring its performance to understand it. Detailed
                    analysis provides information about clicks, social media clicks, page visitors, devices, browsers,
                    systems, geographic location.</p>
            </div>
            <div class="col">
                <h2 class="audiowide h-120">URL shortener</h2>
                <p>Free custom URL shortener with many features that give you better quality for shortening links.
                    Shortened URLs never expire. We do not display ads when redirecting directly to the original URL.
                </p>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="audiowide bg-dark text-white p-3 text-center border-top border-5 border-success">Copyright © 2020-<?= date('Y'); ?> by All rights reserved
    </footer>
</body>

</html>
<?php session_unset(); ?>