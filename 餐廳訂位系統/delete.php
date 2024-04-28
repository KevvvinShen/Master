<!-- 取消訂位 -->
<?php
    include 'db.php';
    $permission = $_GET['permission'];
    $r_id = $_GET['r_id'];
    $re_id = $_GET['re_id'];
    $sql = "UPDATE `reservation` SET `status` = '已取消' WHERE `r_id`='$r_id' AND `re_id`='$re_id'";
    // $sql = "DELETE FROM `reservation` WHERE `r_id`='$r_id' AND `re_id`='$re_id'";
    mysqli_query($conn, $sql);
    if($permission=='manager'){
        header("location: board_manager.php");
    }
    else{
        header("location: board.php");
    }
    

?>