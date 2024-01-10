<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <?php 
        $limit = 4 ;
        $offset = 0;
        $sellectSql = "SELECT * FROM post
        INNER JOIN category ON post.category = category.category_id
        INNER JOIN user ON post.author = user.user_id
        ORDER BY post.post_id DESC
        LIMIT {$offset}, {$limit}";
        $data = mysqli_query($mysqli, $sellectSql) or die('Query failed');
        while($row = mysqli_fetch_assoc($data)) {
            echo '<div class="recent-post">
            <a class="post-img" href="single.php?post_id='.$row["post_id"].'">
            <img src="admin/upload/'.$row['post_img'].'" alt=""/>
            </a>
            <div class="post-content">
            <h5><a href="single.php?post_id='.$row["post_id"].'">'.$row['title'].'</a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href="category.php?category_id='.$row['category_id'].'">'.$row['category_name'].'</a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    '.$row['post_date'].'
                </span>
                <a class="read-more pull-right" href="single.php?post_id='.$row["post_id"].'">read more</a>
            </div>
        </div>';
        }
        ?> 
        <!-- <div class="recent-post">
            <a class="post-img" href="">
                <img src="images/post-format.jpg" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="single.php">Lorem ipsum dolor sit amet</a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php'>Html</a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    01 Nov, 2019
                </span>
                <a class="read-more" href="single.php">read more</a>
            </div>
        </div> -->
    </div>
    <!-- /recent posts box -->
</div>
