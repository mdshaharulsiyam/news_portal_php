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
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                              <!-- <option value="" selected> Select Category</option> -->
                              <?php 
                              include "config.php";
                              $ofset = ($page - 1) * $limit;
                              $sql = "SELECT * FROM `category`";
                              $result = mysqli_query($mysqli,$sql) or die('sql error');
                              if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                                }
                              }
                              ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
                  <?php 
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
       if (!empty($error)) {
        echo "$error[0]";
        // header("location: {$server}admin/add-post.php");
        die();
       }else{
        move_uploaded_file($file_tmp,"upload/".$file_name);
       }
    }
    $post_title =mysqli_real_escape_string($mysqli, $_POST['post_title']);
    $postdesc =mysqli_real_escape_string($mysqli, $_POST['postdesc']);
    $category =mysqli_real_escape_string($mysqli, $_POST['category']);
    $date = date("d M, Y");
    $author = $_SESSION['user_id'];

    $sql = "INSERT INTO `post`(`title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES ('$post_title','$postdesc','$category','$date','$author','$file_name');";
    $sql .="UPDATE `category` SET post = post + 1 WHERE category_id = $category";
    $result = mysqli_multi_query($mysqli, $sql);
    if ($result) {
        // header("Location: {$server}admin/");
        echo "post added";
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
