<?php
session_start();

require __DIR__."/../vendor/autoload.php";
require __DIR__."/bootstrap.php";
require __DIR__."/loader_env.php";
require __DIR__."/../database/db_connection.php";
require __DIR__."/../database/db_tools.php";
require __DIR__."/http.php";
require __DIR__."/utils.php";
require __DIR__."/services_loader.php";
require __DIR__."/../models/loader.php";
require __DIR__."/../forms/loader.php";
// require __DIR__."/template_engine.php";
?>
