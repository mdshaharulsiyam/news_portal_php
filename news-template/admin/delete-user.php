<?php 
    include "config.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM `user` WHERE user_id = $id";
    if (mysqli_query($mysqli,$sql)) {
        header("Location: {$server}admin/users.php");
    }{
        echo "unable to delete data";
    }
?>