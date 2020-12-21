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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$input = file_get_contents('php://input');
 $data = json_decode($input, true);
 $message = array(); 
 
 //echo "Connected successfully";
$sql = "SELECT * FROM login";

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