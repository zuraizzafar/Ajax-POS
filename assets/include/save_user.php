<?php
    include '../../assets/include/conn.php';
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $sql = "INSERT INTO users(`full_name`,`user_name`,`password`) VALUES ('$fname','$uname','$pass')";
    if(mysqli_query($conn, $sql)) {
        $response=1;
    }
    else {
        $response=0;
    }
    echo json_encode($response);
?>