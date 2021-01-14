<?php

require('../vendor/autoload.php');

header('X-Author: StepanM');
header('Access-Control-Allow-Origin: *');

$url = $_GET['url'];

var_dump($url);
$url = rtrim($url, '/');
var_dump($url);
$url = filter_var($url, FILTER_SANITIZE_URL);
var_dump($url);
$url = explode('/', $url);
var_dump($url);
