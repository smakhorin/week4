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
    case 'result4':
      $headerXTestValue = $_SERVER['HTTP_X_TEST'];
      
      $body = '';
      $fh   = @fopen('php://input', 'r');
      if ($fh)
      {
        while (!feof($fh))
        {
          $s = fread($fh, 1024);
          if (is_string($s))
          {
            $body .= $s;
          }
        }
        fclose($fh);
      }
      
      $response = array(
          'message' => 'StepanM',
          'x-result' => $headerXTestValue,
          'x-body' => $body
        );
      
      header('Content-type: application/json');
      header('Access-Control-Allow-Headers: x-test');
      echo json_encode($response);
      break;
    default:
      http_response_code(404);
  }
}
else
{
  http_response_code(404);
}
