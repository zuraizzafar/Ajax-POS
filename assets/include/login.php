<?php
include 'conn.php';
$username = $_POST['uname'];
$password = $_POST['pass'];
$sql = "SELECT * from users where `user_name`='$username' and `password`='$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
    $response = 1;
    setcookie("username", $username, time() + (86400 * 7), "/");
    setcookie("user_id", $row['user_id'], time() + (86400 * 7), "/");
    setcookie("full_name", $row['full_name'], time() + (86400 * 7), "/");
    $user_id = $row['user_id'];
    $pids = $_SESSION["products"]["product"];
    asort($pids);
    foreach ($pids as $index => $id) {
        if ($id) {
            $indx = $index;
            $quan = $_SESSION["products"]["quantity"][$indx];
            $ceheck_sql = "SELECT * from cart where `user_id`='$user_id' and `product_id`='$id'";
            $check_result = mysqli_query($conn, $ceheck_sql);
            if (mysqli_num_rows($check_result)) {
                $sql = "UPDATE cart SET product_quantity = product_quantity + $quan where `user_id`='$user_id' and `product_id`='$id'";
            }
            else {
                $sql = "INSERT INTO cart(`user_id`,`product_id`,`product_quantity`) values('$user_id', '$id', '$quan')";
            }
            mysqli_query($conn, $sql);
        }
    }
    $sql = "SELECT count(`product_id`) from cart where `user_id`='$user_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
    setcookie("cart_items", $row[0], time() + (86400 * 7), "/");
    // if (!isset($_COOKIE['username'])) {
    // }
} else {
    $response = 0;
}
echo json_encode($response);
