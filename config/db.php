<?php

if(!isset($_SERVER["HEROKU_APP_DIR"])){

  $DEBUG = false;

  return [
    "host" => "localhost",
    "username" => "root",
    "password" => "",
    "dbname" => "itweb"
  ];

}else{

  $DEBUG = true;

  return [
    "host" => "q7cxv1zwcdlw7699.chr7pe7iynqr.eu-west-1.rds.amazonaws.com",
    "username" => "sys2gnjehblaiwru",
    "password" => "dcmo6dyci37oxap7",
    "dbname" => "o6jxe6s44ipgpqjp"
  ];

}


?>
