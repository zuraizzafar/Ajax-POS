<?php
    include 'conn.php';
    $cname = $_POST['cname'];

    $sql = "INSERT INTO categories(name) VALUES('$cname')";
    mysqli_query($conn, $sql);
    // header('Location: ../../add-category/');
    $last_id = mysqli_insert_id($conn);
    echo $last_id;
?>