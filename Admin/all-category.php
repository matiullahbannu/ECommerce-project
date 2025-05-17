<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/top-header.php"); ?>


<div class="single-pro-review-area mt-t-30 mg-b-15">
    <?php if (isset($_SESSION['done-msg']) && !empty(isset($_SESSION['done-msg']))) {
        echo"<div>{$_SESSION['done-msg']}</div>";
             unset($_SESSION['done-msg']);
    }
    ?>
    <div class="container">
        <div class="row">
            <table class="table" style="width: 100%;">
                <thead>
                    <th>Category Id</th>
                    <th>Category Name</th>
                    <th>Images</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $selectcat = mysqli_query($conn, "SELECT * FROM category");
                    if ($selectcat) {
                        while ($row = mysqli_fetch_assoc($selectcat)) {
                            $categoryid = $row['category_id'];
                            $categoryname = $row['category_name'];
                            $image=$row['file'];
                    ?>
                            <tr>
                                <td><?php echo $categoryid; ?></td>
                                <td><?php echo $categoryname; ?></td>
                                <td><img src="images/<?php echo $image; ?>" style="width: 100px; height:80px" alt="image is not found"></td>
                                <td>
                                    <a href="edit-category.php?upcategoryid=<?php echo $categoryid; ?>"><button class="btn btn-primary">Edit</button></a>
                                    <a href="delete-category.php?deletecategoryid=<?php echo $categoryid; ?>"><button class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include("includes/footer.php") ?>