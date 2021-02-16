<?php
    include 'conn.php';
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $sql = "SELECT * from users where `user_name`='$username' and `password`='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        $response=1;
        setcookie("username", $username, time()+(86400 * 7),"/");
        setcookie("user_id", $row['user_id'], time()+(86400 * 7),"/");
        setcookie("full_name", $row['full_name'], time()+(86400 * 7),"/");
        // $_SESSION['username'] = $username;
        // $_SESSION['user_id'] = $row['user_id'];
        $user_id = $row['user_id'];
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