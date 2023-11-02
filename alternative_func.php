<?php

require_once 'vendor/codecrafted/iron-elephant/src/heart.php';
require_once 'vendor/autoload.php';
require_once 'config.php';


/**
 * Add your custom functions
 */


// Redirect to index.php page 
function finish($tag_id = '')
{
    redirect(WEB_ADDRESS . "/#$tag_id");
    die;
}

// Redirect to analyze.php page 
function analyze_finish($tag_id)
{
    redirect(WEB_ADDRESS . "/analyze.php#$tag_id");
    die;
}

function et(string $str)
{
    if (empty(trim($str))) {
        return true;
    } else {
        return false;
    }
}


/**
 * Create QR code
 */

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

function qr($value, $label)
{

    $result = Builder::create()
        ->writer(new PngWriter())
        ->writerOptions([])
        ->data($value)
        ->encoding(new Encoding('UTF-8'))
        ->errorCorrectionLevel(ErrorCorrectionLevel::High)
        ->size(300)
        ->margin(10)
        ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
        ->logoPath(__DIR__ . '/resources/fav/android-chrome-512x512.png')
        ->logoResizeToWidth(50)
        ->logoPunchoutBackground(true)
        ->labelText($label)
        ->labelFont(new NotoSans(20))
        ->labelAlignment(LabelAlignment::Center)
        ->validateResult(false)
        ->build();
    // Generate a data URI to include image data inline (i.e. inside an <img> tag)
    return $result->getDataUri();
}
