<?php include "config.php"; 
$limit = 1;
$offset = 0;
$sql2 = "SELECT * FROM `setting` 
ORDER BY setting.id DESC
LIMIT {$offset}, {$limit}";
  $result2 = mysqli_query($mysqli,$sql2);
  while ($row2 = mysqli_fetch_assoc($result2)) {
   ?>
<div id ="footer">
    <div class="container">
        <?php  
        $limit = 1;
        $offset = 0; ?>
        <div class="row">
            <div class="col-md-12">
                <span><?php echo ''.$row2['website_desc'].''; ?> <a href="#">| Powered by shaharul siyam</a></span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php }?>