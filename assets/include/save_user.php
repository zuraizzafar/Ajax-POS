<?php
    include '../../assets/include/conn.php';
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $sql = "INSERT INTO users(`full_name`,`user_name`,`password`) VALUES ('$fname','$uname','$pass')";
    mysqli_query($conn, $sql);
?>