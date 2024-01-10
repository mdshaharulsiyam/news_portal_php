<?php include "config.php"; 
 $limit = 1;
 $offset = 0;
 $sql2 = "SELECT * FROM `setting` 
 ORDER BY setting.id DESC
 LIMIT {$offset}, {$limit}";
   $result2 = mysqli_query($mysqli,$sql2);
   while ($row2 = mysqli_fetch_assoc($result2)) {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ''.$row2['website_name'].''; ?></title>
    <link rel="shortcut icon" href="admin/upload/<?php echo ''.$row2['website_img'].''; ?>" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="header">
    <div class="container">
        <div class="row">
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="admin/upload/<?php echo ''.$row2['website_img'].''; ?>"></a>
            </div>
        </div>
    </div>
</div>
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
                <?php 
                        $sql = "SELECT * FROM `category`";
                        $result = mysqli_query($mysqli,$sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                           echo"<li><a href='category.php?category_id=".$row['category_id']."'>".$row['category_name']."</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php }?>