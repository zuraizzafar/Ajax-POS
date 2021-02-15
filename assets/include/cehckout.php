<?php
    $id = $_POST['cid'];
    $quan = $_POST['quan'];
    $sql = "UPDATE products SET `quantity`= `quantity`-$quan WHERE id='$id'";
    mysqli_query($conn, $sql);
?>