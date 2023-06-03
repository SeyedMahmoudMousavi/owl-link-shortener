<?php
session_start();
require_once "core/my_func.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="آسان کوتاه کن لینک لینشو">
    <meta name="keywords" content="لینشو,کوتاه کننده,کوتاه کردن,لینک,سایت کوتاه کننده,رایگان,بدون محدودیت,بهترین,لینک,سریع,url,طولانی,بزرگ,کوتاه,کوچک,دلخواه,انالیز,آنالیز,بازدید,اخرین بازدید,تعداد بازدید,اسان,آسان,قدرتمند,تاریخ,ساده,زیبا,مدیریت,بررسی,تمیز,عالی">
    <meta name="author" content="Seyed Mahmoud Mousavi-Hossien Erfani-سید محمود موسوی-حسین عرفانی-@Brogramers">
    <title>آسان کوتاه کن لینک لینشو</title>
    <link rel="shortcut icon" type="image/png" href="resources/img/favico.png">
    <link rel="stylesheet" href="resources/css/w3-ebs.css">
    <link rel="stylesheet" href="resources/css/w3-colors-flat.css">
    <link rel="stylesheet" href="resources/css/w3-colors-ios.css">
    <link rel="stylesheet" href="resources/css/my-colors.css">
    <link rel="stylesheet" href="resources/css/font.css">
    <script src="https://kit.fontawesome.com/15d572d769.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
    <style>
        div,p,h1,h2,h3,h4,h5,h6,input,button,form,a{
            font-family: Tanha,Vazir,sans-serif;

        }

        body{
            background-image:url("resources/img/Untitled-1.jpg");
            background-repeat: repeat;
        }
        input{
            width: 70%;
            display: inline;
            outline:none;
        }
        #header{
            background: linear-gradient(to right bottom, rgba(126, 213, 111, 0.8), rgba(40, 180, 133, 0.8)) !important;
        }
        #up{
            display: none;
            position: fixed;
            bottom: 30px;
            right: 10px;
        }
        #call{
            display: none;
            position: fixed;
            bottom: 30px;
            left: 10px;
        }
        .w3-en{
            direction: ltr;
        }
    </style>
</head>

<body class="w3-sand w3-persian">
    <!-- header -->
    <div id="header" class="w3-container w3-center w3-padding-24">
        <h1 class="w3-jumbo w3-animate-left">کوتاه کننده لینک لینشو</h1>
        <h1 class="w3-xxlarge w3-animate-right">لینک های خود را ساده کنید ، آنها را ردیابی و مدیریت کنید</h1>
    </div>
    <div class="w3-panel w3-center">
        <a href="analyze.php" class="w3-button w3-blue w3-hover-black w3-padding-16  w3-round-left-xxlarge w3-round-bottom-xxlarge w3-margin-bottom w3-card-4">آنالیز لینک</a>
        <a href="index.php" class="w3-button w3-blue w3-hover-black w3-padding-16  w3-round-left-xxlarge w3-round-bottom-xxlarge w3-margin-bottom w3-card-4">کوتاه کردن لینک</a>
    </div>
    <div class="w3-panel w3-center">
        <h1>دکمه ی زیر را با کشیدن(drag and drop) به نوار بوکمارک (book mark) اضافه کنید و در زمان بازدید از یک سایت با زدن این دکمه به راحتی لینکش را کوتاه کنید.</h1>
        <a class="w3-button w3-red w3-hover-yellow w3-padding-16  w3-round-left-xxlarge w3-round-bottom-xxlarge w3-margin-bottom w3-card-4" href="javascript:void(location.href='<?= WEB_ADDRESS;?>/create.php?short_address=&long_url='+encodeURIComponent(location.href));" title="کوتاه کن">✂️ کوتاه کن لینشو</a>
    </div>
    <!-- other -->
    <div class="w3-panel w3-center">
        <h2 class="w3-xxxlarge w3-bottombar">بیشتر از یک کوتاه کننده لینک</h2>
        <p class="w3-xlarge w3-bottombar">Linsho به شما امکان می دهد اطلاعات بیشتری درباره کلیک از طریق لینک های خود داشته باشید. ما یک ابزار بازاریابی عظیم با سیستم ردیابی URL های پیشرفته به صورت رایگان و بدون هیچ گونه تعهد پنهانی به شما ارائه می دهیم. چرا؟ زیرا ما معتقدیم بهترین چیزها باید رایگان باشند.</p>
    </div>

    <!-- go to top -->
    <a id="up" href="#header" class="w3-button w3-card-4 w3-black w3-hover-red w3-circle w3-padding-large w3-xlarge w3-animate-right fas fa-angle-double-up"></a>
    <!-- call -->
    <a id="call" href="tel:989904031398" class="w3-button w3-card-4 w3-black w3-hover-green w3-text-green w3-circle w3-padding-large w3-xlarge w3-animate-left fa fa-phone"></a>
    <!-- footer -->
    <div class="w3-container w3-center w3-flat-emerald">
        <h3 class="w3-large" title="سید محمود موسوی حسین عرفانی">Copyright © 2020 by <span class="fas fa-code"></span><i><strong onclick="window.location.href =
    'Brogramers.html';">Brogrammers</strong></i>. All rights reserved</h3>
    <img referrerpolicy='origin' id = 'rgvjjxlzwlaoesgtoeukrgvj' style = 'cursor:pointer' onclick = 'window.open("https://logo.samandehi.ir/Verify.aspx?id=314083&p=xlaorfthaodsobpdmcsixlao", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")' alt = 'logo-samandehi' src = 'https://logo.samandehi.ir/logo.aspx?id=314083&p=qftinbpdshwllymaaqgwqfti' />
    </div>
    <script>
    window.onscroll = function() { scrollFunction(); };

    function scrollFunction() {
        var scroll = document.documentElement.scrollTop;
        if (scroll < 50) {
            document.getElementById('up').style.display = "none";
            document.getElementById('call').style.display = "none";
        } else {
            document.getElementById('up').style.display = "inline";
            document.getElementById('call').style.display = "inline";
        }
    }

    function faToEn(el) {
        el.style.direction = 'ltr';
    }

    </script>
</body>

</html>
<?php session_unset();?>
