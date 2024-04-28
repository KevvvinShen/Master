<?php
    @session_start();
    include 'db.php';
    $re_id = $_GET['re_id'];
    $r_id = $_GET['r_id'];
    $name = $_GET['name'];
    $phone = $_GET['telNo'];
    $adult = $_GET['adult'];
    $kid = $_GET['kid'];
    $time = $_GET['time'];
    $date = $_GET['date'];
    $note = $_GET['message'];
    $sql = "UPDATE `reservation` SET `g_name` = '$name', `g_phone` = '$phone', 
            `adult` = '$adult', `kid` = '$kid', `time` = '$time', 
            `date` = '$date', `note` = '$note' 
            WHERE `re_id` = '$re_id' AND `r_id` = '$r_id'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header('location: board_manager.php');
?>