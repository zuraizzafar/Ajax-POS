<?php
    include 'conn.php';
    $id = $_POST['cid'];
    $sql = "UPDATE categories SET `disabled`='1' where id = '$id'";
    mysqli_query($conn, $sql);
?>