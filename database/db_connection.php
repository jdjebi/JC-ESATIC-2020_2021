<?php

$config = require __DIR__."/../config/db.php";

$host = $config["host"];
$username = $config["username"];
$password = $config["password"];
$dbname = $config["dbname"];

try {
  $db = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  require __DIR__."/../src/config.php";
  require __DIR__."/failed.php";
  exit();
}

$db->exec('SET NAMES utf8mb4');

$DB = $db;

?>
