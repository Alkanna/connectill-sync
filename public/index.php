<?php

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

require '../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

echo 'bitch';

throw new RuntimeException('Oh Snap!');