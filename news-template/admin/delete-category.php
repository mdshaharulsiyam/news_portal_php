<?php 
    include "config.php";
    $category_id = $_GET['category_id'];
    $sql = "DELETE FROM `category` WHERE category_id = $category_id";
    if (mysqli_query($mysqli,$sql)) {
        header("Location: {$server}admin/category.php");
    }{
        echo "unable to delete data";
    }
?>