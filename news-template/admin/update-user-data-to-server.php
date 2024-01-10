<?php include "config.php";?>

<?php 
 if (isset($_POST['submit'])) {
    $user_id =mysqli_real_escape_string($mysqli, $_POST['user_id']);
    $fname =mysqli_real_escape_string($mysqli, $_POST['fname']);
    $lname =mysqli_real_escape_string($mysqli, $_POST['lname']);
    $user =mysqli_real_escape_string($mysqli, $_POST['user']);
    $role =mysqli_real_escape_string($mysqli, $_POST['role']);
    echo $role;
    $sql = "UPDATE `user` SET `first_name`='$fname',`last_name`='$lname',`username`='$user',`role`='$role' WHERE user_id=$user_id";
    //  "UPDATE `user` SET (`first_name`, `last_name`, `username`,`role`) VALUES ('$fname','$lname','$user','$role') WHERE user_id=$user_id";
    $result = mysqli_query($mysqli, $sql);
    if($result){
       header("Location: {$server}admin/users.php");
    }else{
       echo 'unsert feiled';
    }
}else{
    echo "no data found";
 }

?>