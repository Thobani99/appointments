<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

/*
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "DOC_M";*/


$servername = "b1creaan0bmecd1rubqo-mysql.services.clever-cloud.com";
$username   = "uc8bfqrjeaakm880";
$password   = "9kdlfm28wlgb9TdsINBP";
$dbname     = "b1creaan0bmecd1rubqo";

$con = mysqli_connect($servername, $username, $password, $dbname) or die("could not connect DB"); 
?>