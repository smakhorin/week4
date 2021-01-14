<?php

require('../vendor/autoload.php');

header('X-Author: StepanM');
header('Access-Control-Allow-Origin: *');

$url = $_GET['url'];

echo $url;
