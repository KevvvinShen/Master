<!-- 使用者登入檢驗 -->
<?php
	include ('db.php');
	$account = $_POST["account"];
	$password = $_POST["password"];
	$password_hash=password_hash($password,PASSWORD_DEFAULT);
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$sql = "SELECT * FROM `membership` WHERE `g_account` = '".$account."'";
		$result = mysqli_query($conn, $sql);
		$record = mysqli_fetch_assoc($result);
		if($password == $record['password']){
			@session_start();
			$_SESSION['g_account'] = $record['g_account'];
			$_SESSION['name'] = $record['name'];
			$_SESSION['phone'] = $record['phone'];
			$_SESSION['permission'] = 'membership';
			header('location:restaurant_list.php');	
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
		window.location.href='admin_customer.php';
	</script>"; 
	return false;
} 
?>