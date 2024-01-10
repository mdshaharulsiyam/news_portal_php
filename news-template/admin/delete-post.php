<?php 
include "config.php";
$post_id = $_GET['post_id'];
$category_id = $_GET['category_id'];
$SellectSql = "SELECT * FROM post WHERE post_id = $post_id";
$result = mysqli_query($mysqli,$SellectSql);
$row = mysqli_fetch_assoc($result);
$sql= "DELETE FROM `post` WHERE post_id = $post_id;";
$sql .= "UPDATE `category` SET `post`= post - 1 WHERE category_id = $category_id";
if (mysqli_multi_query($mysqli,$sql)) {
    unlink("upload/".$row['post_img']);
    header("Location: {$server}admin/");
}else{
    echo "query failed";
}
?>