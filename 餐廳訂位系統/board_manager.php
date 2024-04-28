<!-- 管理者訂位資訊清單 -->

<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>

	<!-- 指定網頁編碼 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<!--
		響應式網頁
		width=device-width 頁面寬度與螢幕可視寬度相同
		initial-scale=1 手機上畫面放大倍率
		user-scalable=0 手機上禁止縮放
	-->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">

    <!-- title旁的小圖案-->
    <link rel="icon" href="img/board.ico">

	<!-- 網頁文件標題 -->
	<title>餐廳訂位系統</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- jQuery -->
	<script src="bootstrap/js/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="bootstrap/js/bootstrap.min.js"></script>

</head>

<body>

	<!-- 頁面標題 -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
				<a href="index.html"><h2>餐廳訂位系統</h2></a>
					<ol class="breadcrumb">
						<li><a href="reservation.php">新增訂位資訊</a></li>
						<!-- <li><a href="admin_customer.php">會員登入</a></li>
						<li><a href="admin.php">餐廳管理員登入</a></li> -->
						
					</ol>
					<hr>
                </div>
            </div>
        </div>
    </header>
	<!-- 頁面內容 -->
	<section>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
					<h3>訂位資訊管理系統</h3><hr>
					<form method="get">
					<table class="table table-striped">
	  				<thead>
						<th scope="col">訂位日期</th>
						<th scope="col">訂位人</th>
						<th scope="col">訂位時間</th>
						<th scope="col">訂位電話</th>
						<th scope="col">訂位人數</th>
						<th scope="col"></th>
					</thead>
        			<tbody>
<?php
	@session_start();
	$r_id = $_SESSION['r_id'];
	include('db.php');
	$sql = "SELECT DATE(NOW()), TIME(NOW())";
	$today = mysqli_fetch_row(mysqli_query($conn, $sql))[0];
	$time_now = mysqli_fetch_row(mysqli_query($conn, $sql))[1];
	$sql = "SELECT `date`, `re_id`, `g_name`, `time`, `g_phone`, `adult`, `kid`, `status`  
	 		FROM `reservation`
			WHERE `r_id` = '$r_id' ORDER BY `date`";
    $result=mysqli_query($conn, $sql);
    while($record=mysqli_fetch_assoc($result)){
        echo "<tr>
            <td>".$record['date']."</td>
            <td>".$record['g_name']."</td>
            <td>".$record['time']."</td>
            <td>".$record['g_phone']."</td>
            <td>大人: ".$record['adult']."
			<br>小孩: ".$record['kid']."</td>";
		$re_id = $record['re_id'];
		if ($record['date'] >= $today){
			if($record['time'] & $record['status'] != '已取消'){
				echo"<td>
				<a href=update.php?r_id=$r_id&re_id=$re_id><button type=button class=button_function btn btn-default btn-sm>修改訂位</button></a>
				<br><a href=delete.php?r_id=$r_id&re_id=$re_id&permission=manager><button type=button class=button_function btn btn-default btn-sm>取消訂位</button></a>
				</td>";
			}
		}
		else{
			echo "<td>".$record['status']."</td></tr>";
		}
	}
?>
        			</tbody>
				</table>
				</form>

                </div>
            </div>
        </div>
    </section>

	<!-- 頁面底部 -->
    <footer>
         <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
					<hr>
					<form class="form-inline my-2 my-lg-0" action="logout.php">
                			<button class="btn btn-outline-info my-2 my-sm-0" type="submit">登出(回首頁)</button>
            		</form>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="bootstrap/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
