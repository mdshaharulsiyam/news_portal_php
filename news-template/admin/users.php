<?php include "header.php"; ?>
<?php include "config.php"; ?>
<?php 
if ($_SESSION['role'] == 0) {
    header("location: {$server}admin/");
}
?>
<?php
    $limit = 10;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $ofset = ($page - 1) * $limit;
    $sql = "SELECT * FROM `user` ORDER BY `user`.`user_id` DESC LIMIT {$ofset},{$limit}";
    $result = mysqli_query($mysqli,$sql) or die('sql error');

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                    <?php 
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                        //   echo $row['first_name'];
                            echo "<tr>
                            <td>".$row['first_name'].' '.$row['last_name']."</td>
                            <td>".$row['username']."</td>
                            <td>".(($row['role'] == 1 )? 'admin' : 'normal user')."</td>
                            <td class='edit'><a href='update-user.php?id=".$row['user_id']."'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-user.php?id=".$row['user_id']."'><i class='fa fa-trash-o'></i></a></td>
                            </tr>";
                        }
                    }else{
                        echo "no data found in database";
                    }
                    ?>
                      </tbody>
                  </table>
                  <ul class='pagination admin-pagination'>
                    <?php 
                    $sql1 = "SELECT * FROM `user`";
                    $result1 = mysqli_query($mysqli,$sql1) or die('sql error');
                    $total_record = mysqli_num_rows($result1);
                    $total_page = ceil($total_record / $limit);
                    for ($i=1; $i <= $total_page ; $i++) {
                        if ($i == $page) {
                           $active = 'active';
                        }else{
                           $active = '';
                        }
                       echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    ?>
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
