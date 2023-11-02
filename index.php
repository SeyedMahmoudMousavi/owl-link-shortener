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

    <!-- header -->
    <div class="container-fluid bg-dark text-white p-5 rounded-5 w-75 mt-2 shadow border-bottom border-end border-start border-5 border-info">
        <h1 class="text-center vonique"><b><strong>OWL</strong></b> Link shortener</h1>
        <h2 class="text-center vonique">Streamline, track and manage your links</h2>
    </div>
    <!-- Form -->
    <div class="container-fluid bg-light p-5 rounded-5 text-center mt-2">

        <!-- Error -->
        <?php if (error()) : ?>
            <div id="error" class="alert alert-danger alert-dismissible w-75 mx-auto">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <p>
                    <?= error(); ?>
                </p>
            </div>
        <?php endif; ?>
        <!-- New link -->
        <?php if (session('new_short_link')) : ?>
            <?php $new_short_link = WEB_ADDRESS . "/" . session('new_short_link'); ?>
            <!-- QR code show -->

            <div id="result" class="alert alert-success alert-dismissible w-75 mx-auto">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <p>
                    <?= $new_short_link; ?>
                </p>
                <img class="img-fluid border border-dark" src="<?= qr($new_short_link, WEB_ADDRESS) ?> ">
            </div>
        <?php endif; ?>

        <div id="warning"></div>
        <!-- Created link -->
        <form method="post" action="core/create.php" class="was-validated">
            <div class="input-group my-4 shadow">
                <label class="input-group-text bg-success text-white" for="long_url">URL : </label>
                <input class="form-control" autofocus required type="url" id="long_url" name="long_url" placeholder="Enter a valid link" value="<?php if (session('long_url')) {
                                                                                                                                                    e_session('long_url');
                                                                                                                                                } ?>">

                <button class="btn btn-primary" type="submit">Shorten it</button>
            </div>
            <div class="input-group my-4 shadow">
                <label class="input-group-text bg-danger text-white" for="short_url"><?= WEB_ADDRESS; ?>/</label>
                <input type="text" class="form-control" minlength="1" maxlength="256" id="short_url" name="short_url" placeholder="Enter a custom name Optional" onkeyup="ajax('core/index_validate.php', myCallBack,'ajax=' + this.value,'POST')" value="<?php if (session('short_url')) {
                                                                                                                                                                                                                                                                e_session('short_url');
                                                                                                                                                                                                                                                            } ?>">
            </div>


        </form>
        <span class="btn-group shadow">
            <a class="btn btn-outline-success" href="analyze.php">Link analysis</a>
            <a class="btn btn-outline-success" href="easy_shorten.php">Shorten the link easily</a>
        </span>
    </div>
    <!-- Other -->
    <div class="container-fluid bg-info rounded-5 p-5">
        <div class="row">
            <div class="col">

                <h2 class="audiowide h-120">More than a link shortener</h2>
                <p>Owl lets you know more about click through links. We offer you a huge marketing tool with an advanced
                    URL
                    tracking system for free and without any hidden obligations. Why? Because we believe the best things
                    should be
                    free.</p>
            </div>
            <div class="col">
                <h2 class="audiowide h-120">Link management platform</h2>
                <p>Optimize and customize each short URL to get the most out of it. Set your nickname (name), use it in
                    affiliate
                    programs. For example, in virtual networks and various messengers, both internal and external,
                    without
                    restrictions.</p>
            </div>
            <div class="col">
                <h2 class="audiowide h-120">Detailed analysis</h2>
                <p>Linking each shortened link in real time and measuring its performance to understand it. Detailed
                    analysis
                    provides information about clicks, social media clicks, page visitors, devices, browsers, systems,
                    geographic
                    location.</p>
            </div>
            <div class="col">
                <h2 class="audiowide h-120">URL shortener</h2>
                <p>Free custom URL shortener with many features that give you better quality for shortening links.
                    Shortened URLs
                    never expire. We do not display ads when redirecting directly to the original URL.</p>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="audiowide bg-dark text-white p-3 text-center  border-top border-5 border-primary">Copyright ©
        2020-<?= date('Y'); ?> by All rights reserved
    </footer>
    <script src="modules/ajaxFunc.js"></script>
    <script src="modules/mainAjax.js"></script>
</body>

</html>
<?php session_unset(); ?>