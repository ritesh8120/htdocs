<?php
include('config.php');
    $a = array();
    
    $cid = $_POST["cid"];
	$fname = $_POST['name'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$lead = $_POST['leadowener'];
	$address = $_POST['address'];
	$type = $_POST['type'];
	if (!empty($_POST['Source'])) {
		$a = $_POST['Source'];
	}
	$source = implode(",", $a);
	$requeststatus = $_POST['requeststatus'];
	$ReplyStatus = $_POST['ReplyStatus'];
	$Audience = $_POST['Audience'];
	
	$rj = "UPDATE `client_info` SET  `firstname`='$fname',`lastname`='$lname',`email`='$email',`phone`='$number',`address`='$address',`source`='$source',`lead`='$lead', `Audience`='$Audience',`type`='$type',`connenction`='$requeststatus',`reply`='$ReplyStatus' WHERE `cid`='$cid'";
	$success = mysqli_query($conn, $rj);
	if($success){
	header('location:allAudience');
	}
?>