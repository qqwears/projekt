<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

define("DATABASE", array(
    "HOST" => "localhost",
    "PORT" => 3306,
    "DBNAME" => "projekt",
    "USER" => "root",
    "PASSWORD" => "",
));

require_once "classes/Database.php";

require_once "classes/Contact.php";
require_once "classes/Article.php";
require_once "classes/User.php";

session_start();
