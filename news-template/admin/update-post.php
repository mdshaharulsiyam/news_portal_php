<?php include "header.php"; ?>
<?php include "config.php"; ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="update-data-to-server.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <?php 
          $post_id = $_GET['post_id'];
          $sql = "SELECT * FROM post
          INNER JOIN category ON post.category = category.category_id WHERE post_id = $post_id";
          $result = mysqli_query($mysqli,$sql) or die('qierry failed');
          while ($row = mysqli_fetch_assoc($result)) {
            echo'<div class="form-group">
            <input type="hidden" name="post_id"  class="form-control" value="'.$post_id.'" placeholder="">
            <input type="hidden" name="category_id"  class="form-control" value="'.$row["category"].'" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleInputTile">Title</label>
            <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="'.$row["title"].'">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1"> Description</label>
            <textarea name="postdesc" class="form-control" required rows="5">'.$row["description"].'
            </textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputCategory">Category</label>
            <select class="form-control" name="category">';
            $sql2 = "SELECT * FROM `category`";
                $result2 = mysqli_query($mysqli,$sql2);
            while ($row2 = mysqli_fetch_assoc($result2)) {
                if($row['category'] == $row2['category_id']){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
               echo'<option '.$selected.' value = "'.$row2['category_id'].'">'.$row2['category_name'].'</option>';
            }


          echo '</select>
        </div>
        <div class="form-group">
            <label for="">Post image</label>
            <input type="file" name="new_img">
            <img  src="upload/'.$row["post_img"].'" height="150px">
            <input type="hidden" value="'.$row["post_img"].'" name="old_image">
        </div>';
          }
         ?>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
