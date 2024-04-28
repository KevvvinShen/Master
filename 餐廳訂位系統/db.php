<!-- 資料庫連線 -->

<?php
    $host = "us-cdbr-east-06.cleardb.net";
    $dbname = "heroku_65c7eaf8d4c61b1";
    $username = "b81a62157c38a1";
    $password = "cb4f1aa2";
    $conn=mysqli_connect($host, $username, $password, $dbname);
    $conn->query('SET NAMES "utf8"');
    $conn->query('SET time_zone = "+8:00"');
    if (!$conn) {
        printf("資料庫連線失敗: %s\n", mysqli_connect_error());
        exit();
    }
?>