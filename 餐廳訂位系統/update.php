<?php
    @session_start();
    include 'db.php';
    $re_id = $_GET['re_id'];
    $r_id = $_GET['r_id'];
    $sql = "SELECT * FROM `reservation` WHERE `re_id` = $re_id AND `r_id` = $r_id";
    $result=mysqli_query($conn, $sql);
    $record=mysqli_fetch_assoc($result);
    $name = $record['g_name'];
    $phone = $record['g_phone'];
    $adult = $record['adult'];
    $kid = $record['kid'];
    $time = $record['time'];
    $date = $record['date'];
    $note = $record['note'];

?>
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

	

</head>

<body>

	<!-- 頁面標題 -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>餐廳訂位系統</h2>
					<ol class="breadcrumb">
						<li><a href="board.php">查看訂位資訊</a></li>
						<li><a href="admin.php">管理者</a></li>
					</ol>
					<hr>
                </div>
            </div>
        </div>
    </header>

	<!-- 頁面內容 -->
	<section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>修改訂位資訊訂位</h2>
        </div>

        <form action="modify.php" method="get" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
            <input type=hidden name="re_id" value=<?php echo $re_id ?>>
            <input type=hidden name="r_id" value=<?php echo $r_id ?>>
            <div class="row">
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" value=<?php echo $name ?> data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
			<div class="col-lg-4 col-md-6 form-group">
              <input type="tel" name="telNo" class="form-control" id="telNo" value=<?php echo $phone ?> data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
			<div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="date" name="date" class="form-control" id="date" value=<?php echo $date ?> data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="time" name="time" class="form-control" id="time" value=<?php echo $time ?> data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
			<div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="adult" class="form-control" id="adult" value=<?php echo $adult ?> data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="kid" class="form-control" id="kid" value=<?php echo $kid ?> data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="3" id="note" value=<?php echo $note ?>></textarea>
                <div class="validate"></div>
            </div>
            <div class="col-md-12 text-center">

                <button type="submit" class="btn btn-success" name="submit">確定送出</button>
            </div>
        </form>

      </div>
    </section>

	<!-- 頁面底部 -->
    <footer>
         <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
					<hr>
                    <form class="form-inline my-2 my-lg-0" action="logout.php">
                			<button class="btn btn-outline-info my-2 my-sm-0" type="submit">登出</button>
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
