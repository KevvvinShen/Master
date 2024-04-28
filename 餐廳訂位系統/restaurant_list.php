<!-- 餐廳清單 -->

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
						<!-- <li><a href="reservation.php">(訂位)新增訂位資訊</a></li> -->
                        <li><a href="board.php">查看訂位資訊</a></li>
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
                    <h3>餐廳清單</h3><hr>
					<table class="table table-striped">
	  				<thead>
						<th scope="col">餐廳名稱</th>
						<th scope="col">連絡電話</th>
						<th scope="col">地址</th>
						<th scope="col"></th>
					</thead>
        			<tbody>
<?php
	@session_start();
	$account = $_SESSION['g_account'];
	include('db.php');
    $sql = "SELECT `r_id`, `r_name`, `phone`, `address` FROM `restaurant`";
    $result = mysqli_query($conn, $sql);
    
	while($record=mysqli_fetch_assoc($result)){
        $r_id = $record['r_id'];
        echo "<tr>
			<td>".$record['r_name']."</td>
			<td>".$record['phone']."</td>
			<td>".$record['address']."</td>
            <td><a href=reservation.php?r_id=$r_id>
            <button type=button class=btn btn-outline-dark>訂位</button></a></td>
            </tr>";

    }
?>
        			</tbody>
				</table>


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
                			<button class="btn btn-outline-info my-2 my-sm-0" type="submit">離開</button>
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
