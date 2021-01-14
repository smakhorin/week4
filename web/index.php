<?php

require('../vendor/autoload.php');

header('X-Author: StepanM');
header('Access-Control-Allow-Origin: *');

$url = $_GET['url'];

// Url preprocessing
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

if (count($url) == 1)
{
  switch($url[0])
  {
    case 'login':
      echo 'StepanM';
      break;
    case 'sample':
      echo <<<JS
function task(x) {
  return x * this ^ 2;
}
      JS;
      break;
    default:
      http_response_code(404);
  }
}
else
{
  http_response_code(404);
}
