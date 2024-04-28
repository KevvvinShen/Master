<!-- 使用者登入介面 -->
<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>

	<!-- 指定網頁編碼 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
                <a href="index.html"><h2>餐廳訂位系統</h2></a>
					<ol class="breadcrumb">
						<!-- <li><a href="restaurant_list.php">查看餐廳</a></li>
						<li><a href="board.php">查看訂位資訊</a></li> -->
						<li><a href="admin_customer_register.php">註冊會員帳號</a></li>
					</ol>
					<hr>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <!-- <登入介面> -->
            <h3>會員登入</h3>
            <form action="check_admin_customer.php" method="post">
                <div class="form">
                    <div class="modal-body">
                        <div class="title_font">
                            <div class="form-group">
                                <input type="text" class="form-control" name="account" placeholder="帳號 / Account">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="密碼 / Password">
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success" data-dismiss="modal">登入</button>
                    </div>
                </div>
            </form>    
            </div>
        </div>
    </section>
	<!-- 頁面底部 -->
    <footer>
         <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
					<hr>
                    <h4>餐廳訂位系統建置實作</4>
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