<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


/*
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "DOC_M";*/


$servername = "b1creaan0bmecd1rubqo-mysql.services.clever-cloud.com";
$username   = "uc8bfqrjeaakm880";
$password   = "9kdlfm28wlgb9TdsINBP";
$dbname     = "b1creaan0bmecd1rubqo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM appointments";

$result = $conn->query($sql);
$myArr = array();
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$myArr[] = $row;
}
} else {
echo "0 results";
}
$myJSON = json_encode($myArr);
echo $myJSON;
?>