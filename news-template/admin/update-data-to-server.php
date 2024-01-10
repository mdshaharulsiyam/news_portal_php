<?php 
include "config.php";
    if (empty($_FILES['new_img']['name'])) {
       $file_name = $_POST['old_image']; 
        
    }else{
    $errors=array();
    $file_name = $_FILES['new_img']['name'];
    $file_size = $_FILES['new_img']['size'];
    $file_tmp = $_FILES['new_img']['tmp_name'];
    $file_type = $_FILES['new_img']['type'];
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
    if (!empty($error)) {
     echo "$error[0]";
     die();
    }else{
     move_uploaded_file($file_tmp,"upload/".$file_name);
    }
    }
    session_start();
    $post_id = $_POST['post_id'];
    $category_id = $_POST['category_id'];
    $post_title =mysqli_real_escape_string($mysqli, $_POST['post_title']);
    $postdesc =mysqli_real_escape_string($mysqli, $_POST['postdesc']);
    $category =mysqli_real_escape_string($mysqli, $_POST['category']);
    $date = date("d M, Y");
    $author = $_SESSION['user_id'];
    $sql = "UPDATE `post` SET `title`='$post_title',`description`='$postdesc',`category`='$category',`post_date`='$date',`author`='$author',`post_img`='$file_name' WHERE post_id = $post_id;";
    $sql .= "UPDATE `category` SET post = post - 1 WHERE category_id = $category;";
    $sql .= "UPDATE `category` SET post = post + 1 WHERE category_id = $category_id";
    $result = mysqli_multi_query($mysqli, $sql);
    if ($result) {
        header("Location: {$server}admin/");
    }else{
        echo "querry failed";
    }

  ?>