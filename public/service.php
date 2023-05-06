<?php 

$contentType = 'text/xml';
$rawdata = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SERVER['HTTP_CONTENT_TYPE'])) {
        $contentType = $_SERVER['HTTP_CONTENT_TYPE'];
    }
    $rawdata = file_get_contents("php://input");
} else {
    $rawdata = file_get_contents(dirname(__DIR__).'/shell.xml');
}
header("content-type: $contentType");
header("content-length: ". strlen($rawdata));

echo $rawdata;
