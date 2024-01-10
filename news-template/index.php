<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                    <?php include "config.php"; ?>
                        <?php 
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
                               ORDER BY post.post_id DESC
                               LIMIT {$offset}, {$limit}";
                           $data = mysqli_query($mysqli, $sellectSql) or die('Query failed');;
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
                           echo '<li class="'.$active.'"><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                        }
                    ?>
                        </ul>
                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
