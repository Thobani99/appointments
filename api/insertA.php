<?php
 include "db.php"; 
 
$input = file_get_contents('php://input');
 $data = json_decode($input, true);
 $message = array(); 
 
if($data['action'] == "insert"){ 
 $name = $data['name'];   
 $surname = $data['surname']; 
 $phone = $data['phone'];
 $email = $data['email'];


 $q = mysqli_query($con, "INSERT INTO `user` (`name` , `surname` , `phone`, `email`) VALUES ('$name', '$surname', '$phone','$email')"); 

   if($q){  
       $message['status'] = "success";   
  } 
   else{  
  $message['status'] = "error"; 
   } 
   echo json_encode($message);
   }echo mysqli_error($con); 
?>