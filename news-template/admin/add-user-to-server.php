<?php include "config.php"; ?>
<?php 
if(isset($_POST['save'])){
    $fname =mysqli_real_escape_string($mysqli, $_POST['fname']);
    $lname =mysqli_real_escape_string($mysqli, $_POST['lname']);
    $user =mysqli_real_escape_string($mysqli, $_POST['user']);
    $password =mysqli_real_escape_string($mysqli, sha1($_POST['password']));
    $role =mysqli_real_escape_string($mysqli, $_POST['role']);
    $sql = "INSERT INTO `user`(`first_name`, `last_name`, `username`, `password`, `role`) VALUES ('$fname','$lname','$user','$password','$role')";
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