<?php include "header.php"; ?>
<?php include "config.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <?php 
                    $limit = 3;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    }else{
                        $page =1;
                    }
                    $offset = ($page -1) * $limit;
                    if ($_SESSION['role'] == 1) {
                        $sellectSql = "SELECT * FROM post
                        INNER JOIN category ON post.category = category.category_id
                        INNER JOIN user ON post.author = user.user_id ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                    }else{
                        $sellectSql = "SELECT * FROM post
                        INNER JOIN category ON post.category = category.category_id
                        INNER JOIN user ON post.author = user.user_id
                        WHERE user.role = 0
                        ORDER BY post.post_id DESC
                        LIMIT {$offset}, {$limit}";
                    
                    }
                    $data = mysqli_query($mysqli, $sellectSql) or die('Query failed');
                    while ($row = mysqli_fetch_assoc($data)) {
                        echo '<tbody>
                        <tr>
                            <td>'.$row["title"].'</td>
                            <td>'.$row["category_name"].'</td>
                            <td>'.$row["post_date"].'</td>
                            <td>'.$row["username"].'</td>
                            <td class="edit"><a href="update-post.php?post_id='.$row["post_id"].'"><i class="fa fa-edit"></i></a></td>
                            <td class="delete"><a href="delete-post.php?post_id='.$row["post_id"].'&category_id='.$row["category_id"].'"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                      
                    </tbody>';
                    }
                    ?>
                  </table>
                  <ul class='pagination admin-pagination'>
                    <?php 
                        $sql = "SELECT * FROM `post`";
                        $reuslt = mysqli_query($mysqli,$sql);
                        $total_record = mysqli_num_rows($reuslt);
                        $total_page = ceil($total_record / $limit);
                        for ($i=1; $i <= $total_page ; $i++) {
                            if ($i == $page) {
                               $active = 'active';
                            }else{
                               $active = '';
                            }
                           echo '<li class="'.$active.'"><a href="post.php?page='.$i.'">'.$i.'</a></li>';
                        }
                    ?>
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
