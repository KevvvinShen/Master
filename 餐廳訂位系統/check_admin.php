<!-- 管理者登入檢驗 -->

<?php
	include ('db.php');
	$account = $_POST["account"];
	$password = $_POST["password"];
	$password_hash=password_hash($password,PASSWORD_DEFAULT);
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$sql = "SELECT * FROM `restaurant` WHERE `r_account` = '".$account."'";
		$result = mysqli_query($conn, $sql);
		$record = mysqli_fetch_assoc($result);
		if($password == $record['password']){
			@session_start();
			$_SESSION['r_id'] = $record['r_id'];
			$_SESSION['name'] = $record['r_name'];
			$_SESSION['r_account'] = $record['r_account'];
			$_SESSION['permission'] = 'manager';
			header('location:board_manager.php');	
		}
		else{
			function_alert("帳號或密碼錯誤");
		}
	}
	else{
		function_alert("Something Wrong!");
	}
	mysqli_close($conn);

function function_alert($message) { 
	echo "<script>alert('$message');
		window.location.href='admin.php';
	</script>"; 
	return false;
} 
?>