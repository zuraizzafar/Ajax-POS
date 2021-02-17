<?php
include '../../assets/include/conn.php';
$fname = $_POST['fname'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$sql = "INSERT INTO users(`full_name`,`user_name`,`password`) VALUES ('$fname','$uname','$pass')";
if (mysqli_query($conn, $sql)) {
    $response = 1;
    $user_id = mysqli_insert_id($conn);
    setcookie("username", $uname, time() + (86400 * 7), "/");
    setcookie("user_id", $user_id, time() + (86400 * 7), "/");
    setcookie("full_name", $fname, time() + (86400 * 7), "/");
    $pids = $_SESSION["products"]["product"];
    asort($pids);
    foreach ($pids as $index => $id) {
        if ($id) {
            $indx = $index;
            $quan = $_SESSION["products"]["quantity"][$indx];
            $sql = "INSERT INTO cart(`user_id`,`product_id`,`product_quantity`) values('$user_id', '$id', '$quan')";
            mysqli_query($conn, $sql);
        }
    }
    $sql = "SELECT count(`product_id`) from cart where `user_id`='$user_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
    // $_SESSION['cart_items'] = $row[0];
    setcookie("cart_items", $row[0], time() + (86400 * 7), "/");
} else {
    $response = 0;
}
echo json_encode($response);
