<!-- 餐廳資料新增至資料庫 -->

<?php

	include('db.php');
	$account = $_GET['account'];
	$password = $_GET['password'];
	$check_password = $_GET['check_password'];
	$name = $_GET['name'];
	$address = $_GET['address'];
	$phone = $_GET['phone'];

	if(!empty($account)&&!empty($password)&&!empty($check_password)&&!empty($name)&&!empty($phone)&&!empty($address)){
		if($password == $check_password){
			try{
				$sql = "SELECT COUNT(*) FROM `restaurant` WHERE `r_account` = '$account'";
				$result = mysqli_query($conn, $sql);
				$check = mysqli_fetch_row($result)[0];
				if ($check == '0'){
					$sql = "SELECT MAX(`r_id`)+1 FROM `restaurant`";
					$result = mysqli_query($conn, $sql);
					$r_id = mysqli_fetch_row($result)[0];
					$sql = "INSERT INTO `restaurant` VALUES 
							('$r_id', '$name', '$account', '$password', '$address', '$phone')";
					if(mysqli_query($conn, $sql)){
						header('location: admin.php');
					}
					else{
						setcookie('message', '註冊失敗');
					}
				}
				else{
					setcookie('message', '帳號已被註冊');
				}
			}
				
			catch(PDOException $e)
			{
				setcookie('message', $e->getMessage());
			}
		}
		else{
		setcookie('message', '密碼與確認密碼不符');
		}
	}
	else{
		setcookie('message', '請確實填寫欄位');
	}