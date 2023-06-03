<?php

/**
 * Add your custom functions
 */

// Redirect to index.php page 
function finsish()
{
    change_url(WEB_ADDRESS . '/#error');
    die;
}

function analyze_finsish()
{
    change_url(WEB_ADDRESS . '/analyze.php#error');
    die;
}
