<?php include "header.php"; ?>
<?php include "config.php";?>
<?php 
if ($_SESSION['role'] == 0) {
    header("location: {$server}admin/");
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <?php 
                        $sql = "SELECT * FROM `category`";
                        $result = mysqli_query($mysqli,$sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                           echo" <tr>
                           <td>".$row['category_name']."</td>
                           <td>".$row['post']."</td>
                           <td class='edit'><a href='update-category.php?category_id=".$row['category_id']."'><i class='fa fa-edit'></i></a></td>
                           <td class='delete'><a href='delete-category.php?category_id=".$row['category_id']."'><i class='fa fa-trash-o'></i></a></td>
                       </tr>";
                        }
                    ?>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
