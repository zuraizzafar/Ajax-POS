<?php
    include 'conn.php';
    $id = $_POST['scid'];
    $sql = "DELETE FROM sub_category where id = '$id'";
    mysqli_query($conn, $sql);
?>