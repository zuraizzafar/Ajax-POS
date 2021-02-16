<?php
    include "../../assets/include/conn.php";
    $uname = $_COOKIE['username'];
    $newUsername = $_POST['username'];
    $newFullname = $_POST['fname'];
    $sql = "UPDATE users set `full_name`='$newFullname', `user_name`='$newUsername' where `user_name`='$uname'";
    mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn)) {
        echo 1;
        $_COOKIE['username'] = $newUsername;
        setcookie('username', $newUsername, time()+(86400 * 7),"/");
        // $_COOKIE['full_name'] = $newFullname;
        setcookie('full_name', $newFullname, time()+(86400 * 7),"/");
    }
    else echo 0;
?>