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
    <style>
        body {
            background-image: url("resources/owl-background.jpg");
            background-size: contain;
            background-repeat: repeat;
        }

        #up {
            display: none;
            position: fixed;
            bottom: 30px;
            right: 10px;
        }
    </style>
</head>

<body>
    <!-- header -->
    <div id="header">
        <!--w3-pale-yellow -->
        <h1>Link shortener</h1>
        <h1>Streamline, track and manage your links</h1>
    </div>
    <!-- error -->
    <div id="error">
        <?php if (issv("error")) : ?>
            <p>
                <?= rsv("error"); ?>
            </p>
        <?php endif; ?>
    </div>
    <!-- created link -->
    <div>
        <?php if (issv('short_url')) : ?>
            <?php
            $short_url = WEB_ADDRESS . "/" . $_SESSION['short_url']; ?>
            <p>
                <?= $short_url; ?>
            </p>
        <?php endif; ?>
    </div>
    <!-- form -->
    <form method="post" action="create.php">
        <input autofocus type="url" name="long_url" value="<?php if (issv('long_url')) {
                                                                esv('long_url');
                                                            } ?>" placeholder="یک لینک معتبر وارد کنید"></div>

        <button type="submit">Shorten it</button>
        <div><?= WEB_ADDRESS; ?>/</div>
        <input minlength="1" maxlength="256" name="short_address" value="<?php if (issv('short_address')) {
                                                                                esv('short_address');
                                                                            } ?>" placeholder="نام دلخواهی وارد کنید اختیاری">


        <a href="analyze.php">Link analysis</a>
        <a href="easy_shorten.php">Shorten the link easily</a>
    </form>
    <!-- other -->
    <h2>More than a link shortener</h2>
    <p>Owl lets you know more about click through links. We offer you a huge marketing tool with an advanced URL tracking system for free and without any hidden obligations. Why? Because we believe the best things should be free.</p>


    <h2>Link management platform</h2>
    <p>Optimize and customize each short URL to get the most out of it. Set your nickname (name), use it in affiliate programs. For example, in virtual networks and various messengers, both internal and external, without restrictions.</p>

    <h2>Detailed analysis</h2>
    <p>Linking each shortened link in real time and measuring its performance to understand it. Detailed analysis provides information about clicks, social media clicks, page visitors, devices, browsers, systems, geographic location.</p>
    <h2>URL shortener</h2>
    <p>Free custom URL shortener with many features that give you better quality for shortening links. Shortened URLs never expire. We do not display ads when redirecting directly to the original URL.</p>
    <!-- go to top -->
    <a id="up" href="#header"></a>
    <!-- footer -->
    <h3>Copyright © 2020-<?= date('Y'); ?> by All rights reserved</h3>
    <script>
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            var scroll = document.documentElement.scrollTop;
            if (scroll < 50) {
                document.getElementById('up').style.display = "none";
            } else {
                document.getElementById('up').style.display = "inline";
            }
        }
    </script>
</body>

</html>
<?php session_unset(); ?>