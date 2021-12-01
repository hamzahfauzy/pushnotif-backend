<?php

date_default_timezone_set('Asia/Jakarta');
session_start();
require 'vendor/autoload.php';
require 'libs/JwtAuth.php';
require 'libs/Database.php';

$config = require 'config/main.php';
require 'functions.php';

// cron action
foreach ($argv as $arg) {
    $e=explode("=",$arg);
    if(count($e)==2)
        $_GET[$e[0]]=$e[1];
    else   
        $_GET[$e[0]]=0;
}

if(isset($_GET['action']))
    require 'actions/'.$_GET['action'].'.php';