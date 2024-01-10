<?php include "header.php"; ?>
<?php include "config.php";?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="update-category-To-server.php" method ="POST">
                  <?php 
                  $category_id = $_GET['category_id'];
                  $sql = "SELECT * FROM `category` WHERE category_id = $category_id";
                  $result = mysqli_query($mysqli,$sql);
                    echo '<div class="form-group">
                    <input type="hidden" name="category_id"  class="form-control" value='.$category_id.' placeholder="">
                </div><div class="form-group">
                <label>Category Name</label>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<input type="text" name="category_name" class="form-control" value='.$row['category_name'].'  placeholder='.$row['category_name'].' required>';
                    }
                  ?>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
