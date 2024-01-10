
<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post-container">
                    <?php 
                    $user_id = $_GET['user_id'];
                    $limit = 3;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    }else{
                        $page =1;
                    }
                    $offset = ($page -1) * $limit;
                        $sellectSql = "SELECT * FROM post
                        INNER JOIN category ON post.category = category.category_id
                        INNER JOIN user ON post.author = user.user_id
                        WHERE author = $user_id
                        ORDER BY post.post_id DESC
                        LIMIT {$offset}, {$limit}";
                    $data = mysqli_query($mysqli, $sellectSql) or die('Query failed');
                    $data1 = mysqli_query($mysqli, $sellectSql) or die('Query failed');
                    $row1 = mysqli_fetch_assoc($data1);
                     if (mysqli_num_rows($data1) > 0) {
                        echo '<h2 class="page-heading">'.$row1['username'].'</h2>';
                      }
                    while ($row = mysqli_fetch_assoc($data)) {
                        echo '<div class="post-content">
                               <div class="row">
                                   <div class="col-md-4">
                                   <a class="post-img" href="single.php?post_id='.$row["post_id"].'"><img src="admin/upload/'.$row['post_img'].'" alt=""/></a>
                                   </div>
                                   <div class="col-md-8">
                                       <div class="inner-content clearfix">
                                       <h3><a href="single.php?post_id='.$row["post_id"].'">'.$row['title'].'</a></h3>
                                           <div class="post-information">
                                               <span>
                                                   <i class="fa fa-tags" aria-hidden="true"></i>
                                                   <a href="category.php?category_id='.$row['category_id'].'">'.$row['category_name'].'</a>
                                               </span>
                                               <span>
                                                   <i class="fa fa-user" aria-hidden="true"></i>
                                                   <a href="author.php?user_id='.$row['user_id'].'">'.$row['username'].'</a>
                                               </span>
                                               <span>
                                               <i class="fa fa-calendar" aria-hidden="true"></i>
                                               '.$row['post_date'].'
                                               </span>
                                           </div>
                                           <p class="description">
                                           '.substr($row['description'],0,120).'...
                                           </p>
                                           <a class="read-more pull-right" href="single.php?post_id='.$row["post_id"].'">read more</a>
                                       </div>
                                   </div>
                               </div>
                           </div>';
                    }
                    ?>
                    <ul class='pagination'>
                    <?php 
                        $sql = "SELECT * FROM `post` WHERE author = $user_id";
                        $reuslt = mysqli_query($mysqli,$sql);
                        $total_record = mysqli_num_rows($reuslt);
                        $total_page = ceil($total_record / $limit);
                        for ($i=1; $i <= $total_page ; $i++) {
                            if ($i == $page) {
                               $active = 'active';
                            }else{
                               $active = '';
                            }
                           echo '<li class="'.$active.'"><a href="author.php?page='.$i.'&&user_id='.$user_id.'">'.$i.'</a></li>';
                        }
                    ?>
                    </ul>
                </div>
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
