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
    case 'promise':
      header('Content-Type: text/plain; charset=UTF-8');
      $sample = <<<JS
          function task(x) {
            return  new Promise(function(resolve, reject) {
              if (x < 18)
              {
                resolve("yes");
              }
              else
              {
                reject("no");
              }
            });
          }
      JS;
      echo $sample;
      break;
    case 'fetch':
      $html = <<<HTML
        <html>
          <head>
            <title>Form</title>
            <script type="text/javascript">
              function fetchResult() {
                let url = document.getElementById("inp").value
                fetch(url)
                  .then(function(response) {
                    document.getElementById("inp").value = response.text();
                  });
              }
            </script>
          </head>
          <body>
            <input type="text" id="inp">
            <button id="bt" onclick="fetchResult()">Submit</button>
          </body>
        </html>
      HTML;
      echo $html;
      break;
    default:
      http_response_code(404);
  }
}
else
{
  http_response_code(404);
}
