<?php include "header.php"; ?>
<?php include "config.php";?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <?php 
    $id = $_GET['id'];
    $sql = "SELECT * FROM `user` Where user_id=$id";
    $result = mysqli_query($mysqli,$sql) or die('sql error');
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-md-offset-4 col-md-4">
            <form  action="update-user-data-to-server.php" method ="POST">
                <div class="form-group">
                    <input type="hidden" name="user_id"  class="form-control" value="'.$row['user_id'].'" placeholder="" >
                </div>
                    <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fname" class="form-control" value="'.$row['first_name'].'" placeholder="" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lname" class="form-control" value="'.$row['last_name'].'" placeholder="" required>
                </div>
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="user" class="form-control" value="'.$row['username'].'" placeholder="" required>
                </div>
                <div class="form-group">
                    <label>User Role</label>
                    <select class="form-control" name="role" value="'.$row['role'].'">
                    <div>'.(($row['role'] == 1) ? '<option value="0">normal User</option><option selected value="1">Admin</option>' : '<option selected value="0">normal User</option><option value="1">Admin</option> ').'</div>
                    </select>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
            </form>';
        }
    }else{
        echo "no data found in database";
    }

 ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
