<?php
    include "../../assets/include/conn.php";
    $uname = $_SESSION['username'];
    $newUsername = $_POST['username'];
    $newFullname = $_POST['fname'];
    $sql = "UPDATE users set `full_name`='$newFullname', `user_name`='$newUsername' where `user_name`='$uname'";
    mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn)) {
        echo 1;
        $_SESSION['username'] = $newUsername;
        $_SESSION['full_name'] = $newFullname;
    }
    else echo 0;
?>