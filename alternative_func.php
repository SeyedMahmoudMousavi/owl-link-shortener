<?php

/**
 * Add your custom functions
 */

// Redirect to index.php page 
function finish()
{
    change_url(WEB_ADDRESS . '/#error');
    die;
}

// Redirect to analyze.php page 
function analyze_finish()
{
    change_url(WEB_ADDRESS . '/analyze.php#error');
    die;
}


/**
 * Create QR code
 */

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

function create_qr(string $url, string $label)
{
    $result = Builder::create()
        ->writer(new PngWriter())
        ->writerOptions([])
        ->data($url)
        ->encoding(new Encoding('UTF-8'))
        ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
        ->size(300)
        ->margin(10)
        ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
        ->logoPath("resources/fav/favicon-32x32.png")
        ->labelText($label)
        ->labelFont(new NotoSans(20))
        ->labelAlignment(new LabelAlignmentCenter())
        ->validateResult(false)
        ->build();

    return $dataUri = $result->getDataUri();
}
