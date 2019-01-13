<?php
	include('lib/MySQLConn.php');
		
	$dataset = new MySQLConn();
	
	$id = $_POST['id'];
	$fname = trim(addslashes($_POST['fname']));
	$lname = trim(addslashes($_POST['lname']));
	$email = trim(addslashes($_POST['email']));
	$phone = trim(addslashes($_POST['phone']));
	$address = trim(addslashes($_POST['address']));
	$hfeet = trim(addslashes($_POST['hfeet']));
	
	$table = "details";
	if(empty($id)){
		$row = array("fname"=>$fname, "lname"=>$lname, "email"=>$email, "phone"=>$phone, "address"=>$address, "hfeet"=>$hfeet,);
		$result = $dataset->insertArray($table, $row);
		echo $result;
	}
	else{
		$row = array("fname"=>$fname, "lname"=>$lname, "email"=>$email, "phone"=>$phone, "address"=>$address, "hfeet"=>$hfeet,);
		$result = $dataset->updateArray($table, 'id', $id, $row);
		echo $id;
	}
	
	
?>
