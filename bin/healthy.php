<?php

function assumeUnhealthy($message)
{
    echo $message;
    http_response_code(500);
    exit;
}

/**
 * Example: Normal check for application bin script
 * Attention: This script will auto exist by default in slimapp
 */
try {
    $app = require_once __DIR__."/dynamo-test.php";
} catch (Exception $exception) {
    assumeUnhealthy($exception->getMessage());
}
