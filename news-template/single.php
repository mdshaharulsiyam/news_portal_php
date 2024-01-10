<?php include 'header.php'; ?>
<?php include "config.php"; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content single-post">
                            <?php 
                                 $post_id = $_GET['post_id'];
                                  $sellectSql = "SELECT * FROM post
                                  INNER JOIN category ON post.category = category.category_id
                                  INNER JOIN user ON post.author = user.user_id
                                  WHERE post_id = $post_id
                                  ORDER BY post.post_id DESC
                                  ";
                              $data = mysqli_query($mysqli, $sellectSql) or die('Query failed');;
                              while ($row = mysqli_fetch_assoc($data)) {
                                echo'<h3>'.$row['title'].'</h3>
                                <div class="post-information">
                                    <span>
                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                        '.$row['category_name'].'
                                    </span>
                                    <span>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <a href="author.php">'.$row['username'].'</a>
                                    </span>
                                    <span>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        '.$row['post_date'].'
                                    </span>
                                </div>
                                <img class="single-feature-image" src="admin/upload/'.$row['post_img'].'"  alt=""/>
                                <p class="description">
                                '.$row['description'].'
                                </p>';
                              }
                            ?>
                        </div>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
