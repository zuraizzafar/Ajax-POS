<?php
    include 'conn.php';
    $scname = $_POST['scname'];
    $pscat = $_POST['pscat'];

    $sql = "INSERT INTO sub_category(`name`, `category`) VALUES ('$scname','$pscat')";
    mysqli_query($conn, $sql);
    $last_id = mysqli_insert_id($conn);
    echo $last_id;
?>