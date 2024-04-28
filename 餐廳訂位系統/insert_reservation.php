<?php

	@session_start();
	include('db.php');
	$account = $_GET['account'];
	$r_id = $_GET['r_id'];
	$permission = $_GET['permission'];
	$name = $_GET['name'];
	$phone = $_GET['phone'];
	$date = $_GET['date'];
	$time = $_GET['time'];
	$adult = $_GET['adult'];
	$kid = $_GET['kid'];	
	$note = $_GET['message'];
	$sql = "SELECT MAX(`re_id`)+1 FROM `reservation` WHERE `r_id` = $r_id";
	$result = mysqli_query($conn, $sql);
	$re_id = mysqli_fetch_row($result)[0];
	echo $re_id;
	echo $r_id, $permission, $re_id, $name, $phone;
	$sql = "INSERT INTO `reservation`
			VALUES('$r_id', '$re_id', '$account', '$name', '$phone', '$adult', '$kid', '$date', '$time', '', '$note')";
	mysqli_query($conn, $sql);
	if ($permission == 'manager'){
		header('location: board_manager.php');
	}
	elseif($permission == 'membership'){
		header('location: board.php');
	}
?>
	