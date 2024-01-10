<?php include "header.php"; ?>
<?php include "config.php";?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="website name">website name</label>
                          <input type="text" name="website_name" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload">
                          <?php 
                          $limit = 1;
                          $offset = 0;
                          $sql2 = "SELECT website_img FROM `setting` 
                          ORDER BY setting.id DESC
                          LIMIT {$offset}, {$limit}";
                            $result2 = mysqli_query($mysqli,$sql2);
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo '<img  src="upload/'.$row2["website_img"].'" height="150px">
                                <input type="hidden" value="'.$row2["website_img"].'" name="old_image"';
                            } 
                            ?>
                         
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="website_desc" class="form-control" rows="5"  required></textarea>
                        </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
                  <?php 
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_FILES['fileToUpload']['name'])) {
        $file_name = $_POST['old_image']; 
         
     }else{
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
       if (!empty($error)) {
        echo "$error[0]";
        die();
       }else{
        move_uploaded_file($file_tmp,"upload/".$file_name);
       }
    }
    $website_name =mysqli_real_escape_string($mysqli, $_POST['website_name']);
    $website_desc =mysqli_real_escape_string($mysqli, $_POST['website_desc']);
    $sql = "INSERT INTO `setting`(`website_name`, `website_img`, `website_desc`) VALUES ('$website_name','$file_name','$website_desc')";
    $result = mysqli_multi_query($mysqli, $sql);
    if ($result) {
        echo "new setting added";
    }else{
        echo "querry failed";
    }
   
}
  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
