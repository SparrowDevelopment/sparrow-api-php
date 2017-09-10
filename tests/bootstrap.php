<?php
  
ini_set('display_errors', true);
require('./vendor/autoload.php');

$dotenv = new Dotenv\Dotenv(__DIR__.'/..');
$dotenv->load();