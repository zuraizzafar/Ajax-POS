<?php
    include 'conn.php';
    $id = $_POST['id'];
    $sql = "UPDATE products SET `disabled`='0' where id = '$id'";
    mysqli_query($conn, $sql)
?>