<?php 
include "config.php";
if (isset($_FILES['fileToUpload'])) {
    $errors=array();
   $file_name = $_FILES['fileToUpload']['name'];
   $file_size = $_FILES['fileToUpload']['size'];
   $file_tmp = $_FILES['fileToUpload']['tmp_name'];
   $file_type = $_FILES['fileToUpload']['type'];
   $file_parts = explode('.',$file_name);
   $file_ext = end($file_parts);
   $file_toLowerCase = strtolower($file_ext);
   $extentions = array("jpeg","jpg","png");
   if (in_array($file_toLowerCase,$extentions) === false) {
    $error[]="plese input jpeg or png file";
   }
   if ($file_size >2097152) {
    $error[]="file side should not ebe bigger then 2mb";
   }
   if (empty($error)) {
    move_uploaded_file($file_tmp,"upload/".$file_name);
   }else{
    echo "$error[0]";
    header("location: {$server}admin/add-post.php");
    die();
   }
}
session_start();
$post_title =mysqli_real_escape_string($mysqli, $_POST['post_title']);
$postdesc =mysqli_real_escape_string($mysqli, $_POST['postdesc']);
$category =mysqli_real_escape_string($mysqli, $_POST['category']);
$date = date("d M, Y");
$author = $_SESSION['user_id'];

$sql = "INSERT INTO `post`(`title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES ('$post_title','$postdesc','$category','$date','$author','$file_name');";
$sql .="UPDATE `category` SET post = post + 1 WHERE category_id = $category";
$result = mysqli_multi_query($mysqli, $sql);
if ($result) {
    header("Location: {$server}admin/users.php");
}else{
    echo "querry failed";
}
// ?>