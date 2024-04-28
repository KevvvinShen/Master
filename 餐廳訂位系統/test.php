<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>測試頁面</title>
</head>
<body>
    <?php
        include 'db.php';
        @session_start();
        $name = $_SESSION['name'];
    ?>
    <h1>恭喜成功!<?php echo $name?></h1>
    <img src="test.jpg" width="600">

    
</body>
</html>