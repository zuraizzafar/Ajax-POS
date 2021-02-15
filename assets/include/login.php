<?php
    include 'conn.php';
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $sql = "SELECT `user_name` from users where `user_name`='$username' and `password`='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)) {
        $response=1;
        $_SESSION['username'] = $username;
    }
    else {
        $response=0;
    }
    echo json_encode($response);
?>