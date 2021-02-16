<?php
    include "../../assets/include/conn.php";
    $current_password = $_POST['cpassword'];
    $new_password = $_POST['npassword'];
    $uname = $_COOKIE['username'];
    $sql = "UPDATE users set `password`='$new_password' where `user_name` = '$uname' and `password` = '$current_password'";
    mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn)) {
        echo 1;
    }
    else echo 0;
?>