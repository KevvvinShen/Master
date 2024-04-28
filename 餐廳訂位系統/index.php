<?php

	if( isset($_COOKIE['message']) )
	{
		$message = $_COOKIE['message'];
		setcookie('message','');
	}
	else
	{
		$message = '';
	}
  @session_start();
  $r_id = $_SESSION['r_id'];
  $account = $_SESSION['account'];
  if(isset($r_id)){
    $permission = 'manager';
  }
  elseif(isset($account)){
    $permission = 'user';
  }

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
        <form action="insert_reservation.php" method="post">
          <input type=hidden name="r_id" values=<?php echo $r_id ?>>
          <input type=hidden name="account" values=<?php echo $account?>>
          <input type=hidden name="permission" values=<?php echo $permission ?>>

          <div class="row">
              <div class="col-md-4 col-md-offset-4">
              <div class="section-title">
                <h2>訂位</h2>
                <p>請填寫以下欄位</p>
              </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="name" placeholder="姓名">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="phone" placeholder="連絡電話">
                  </div>
                  <div class="form-group">
                      <input type="date" class="form-control" name="date">
                  </div>
                  <div class="form-group">
                      <input type="time" class="form-control" name="time">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="adult" placeholder="大人人數">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="kid" placeholder="小孩人數">
                  </div>
                  <div class="form-group">
                      <textarea class="form-control" name="message" rows="3" placeholder="備註"></textarea>
                  <div class="validate"></div>
          </div>
              </div>

              <div class="col-md-12 text-center">
  <?php if( $message ): ?>
    <div class="alert alert-warning" role="alert"><?php echo $message; ?></div>
  <?php endif; ?>
                  <button type="submit" class="btn btn-success" name="submit">確定送出</button>
              </div>
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
                    <h5>餐廳訂位系統建置實作</h5>
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
