<?php

if(!isset($_SERVER["HEROKU_APP_DIR"])){

  $DEBUG = false;

  return [
    "host" => "localhost",
    "username" => "root",
    "password" => "",
    "dbname" => "youniti"
  ];

}else{

  $DEBUG = true;

  return [
    "host" => "gi6kn64hu98hy0b6.chr7pe7iynqr.eu-west-1.rds.amazonaws.com",
    "username" => "vipft88ee325qrcg",
    "password" => "rvkqpzrk0ei8pzt3",
    "dbname" => "n9syu0b9t9ougqmw"
  ];

}


?>
