<?php
    include '../../assets/include/conn.php';
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $sql = "INSERT INTO users(`full_name`,`user_name`,`password`) VALUES ('$fname','$uname','$pass')";
    if(mysqli_query($conn, $sql)) {
        $response=1;
        setcookie("username", $uname, time()+(86400 * 7),"/");
        setcookie("user_id", mysqli_insert_id($conn), time()+(86400 * 7),"/");
        setcookie("full_name", $fname, time()+(86400 * 7),"/");
        // $_SESSION['username'] = $username;
        // $_SESSION['user_id'] = $row['user_id'];
        $user_id = $_COOKIE['user_id'];
        // $_SESSION['full_name'] = $row['full_name'];
        $sql = "SELECT count(`product_id`) from cart where `user_id`='$user_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($result);
        // $_SESSION['cart_items'] = $row[0];
        setcookie("cart_items", $row[0], time()+(86400 * 7),"/");
    }
    else {
        $response=0;
    }
    echo json_encode($response);
?>