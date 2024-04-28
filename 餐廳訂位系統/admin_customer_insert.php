<!-- 會員資料新增至資料庫 -->

<?php

	include('db.php');
	$account = $_GET['account'];
	$password = $_GET['password'];
	$check_password = $_GET['check_password'];
	$name = $_GET['name'];
	$phone = $_GET['phone'];
	$birthday = $_GET['birthday'];

	if(!empty($account)&&!empty($password)&&!empty($check_password)&&!empty($name)&&!empty($phone)&&!empty($birthday)){
		if($password == $check_password){
			try{
				$sql = "SELECT COUNT(*) FROM `membership` WHERE `g_account` = '$account'";
				$result = mysqli_query($conn, $sql);
				$check = mysqli_fetch_row($result)[0];
				if ($check == '0'){
					$sql = "INSERT INTO `membership` (`g_account`, `name`, `birthday`, `phone`, `password`)
							VALUES ('$account', '$name', '$birthday', '$phone', '$password')";
					if(mysqli_query($conn, $sql)){
						header('location: admin_customer.php');
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