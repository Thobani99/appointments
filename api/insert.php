<?php
 include "db.php"; 
 
$input = file_get_contents('php://input');
 $data = json_decode($input, true);
 $message = array(); 
if($data['action'] == "insert"){ 
	$email = $data['EMAIL'];
	$password = $data['U_PASSWORD'];
	$type = $data['U_TYPE'];
	$id = $data['ID'];
	$name = $data['NAME'];
	$surname = $data['SURNAME'];
	$cell = $data['CONTACT'];
	$address = $data['ADDRESS'];
	$qaul = $data['QUALIFICATION'];
	$field = $data['FIELD_AREA'];
	$w_name = "EDENDALE CROSS MEDICAL CENTRE";

    $q = mysqli_query($con, "INSERT INTO `login` (`EMAIL` , `U_PASSWORD` , `U_TYPE`) VALUES ('$email', '$password', '$type')"); 
	
  if($type == "DOCTOR"){
	// $q = mysqli_query($con, "INSERT INTO `staff` (`S_ID`,`S_NAME`,`S_SURNAME`,`CONTACT`,`EMAIL`,`NAME`) VALUES('$id','$name','$surname','$cell','$email','$w_name')"); 
	$q = mysqli_query($con, "INSERT INTO `staff` (`S_ID`,`S_NAME`,`S_SURNAME`,`CONTACT`,`EMAIL`,`W_NAME`) VALUES('$id','$name','$surname','$cell','$email','$w_name')"); 
	$q = mysqli_query($con, "INSERT INTO `specialize` (`QUALIFICATION` , `FIELD_AREA` , `S_ID`) VALUES ('$qaul', '$field', '$id')");
   }
   else if($type == "PATIENT"){
	$q = mysqli_query($con, "INSERT INTO `patient` (`P_ID`,`P_NAME`,`P_SURNAME`,`P_ADDRESS`,`CONTACT`,`EMAIL`) VALUES('$id','$name','$surname','$address','$cell','$email')");
   }
   
   if($q){  
       $message['status'] = "success";   
  } 
   else{  
  $message['status'] = "error"; 
   } 
   echo json_encode($message);
   }
  else
	 if($data['action'] == "insert1"){ 
 
		$email = $data['EMAIL'];
		
		//getting ID
		$sql = "SELECT P_ID FROM `patient` WHERE EMAIL = '$email'";
		$result = $con->query($sql);
		if($result->num_rows > 0)
	     {
		while($row = $result->fetch_assoc())
		{
			
			$id = $row['P_ID'];
		}
	   }
	   
		$date = substr($data['DATE'], 0, -19);
		$time = $data['TIME'];
		$reason = $data['REASON'];
		$status = "PENDING";

    $q = mysqli_query($con, "INSERT INTO `appointments` (`P_ID` , `A_DATE` , `A_TIME`, `REASON`, `A_STATUS`) VALUES ('$id', '$date', '$time', '$reason', '$status')"); 
   
   if($q){  
       $message['status'] = "success";   
  } 
   else{  
     $message['status'] = "error"; 
   } 
   echo json_encode($message);
   }
   else
	 if($data['action'] == "update"){ 
 
		$email = $data['EMAIL'];
	    $password = $data['U_PASSWORD'];

       $q = mysqli_query($con, "UPDATE `login` SET U_PASSWORD = '$password' WHERE EMAIL = '$email'"); 
   
   if($q){  
       $message['status'] = "success";   
  } 
   else{  
     $message['status'] = "error"; 
   } 
   echo json_encode($message);
   }
   echo mysqli_error($con); 
?>