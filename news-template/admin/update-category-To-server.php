<?php include "config.php";

$category_id = $_POST['category_id'];
$category_name = $_POST['category_name'];
$sql = "UPDATE `category` SET `category_name`='$category_name' WHERE category_id = $category_id";
$result = mysqli_query($mysqli,$sql);
if($result){
    header("Location: {$server}admin/category.php");
}else{
    echo "querry failed";
}
?>
