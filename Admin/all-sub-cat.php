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
                    <th>Sub-Category Id</th>
                    <th>Sub-Category Name</th>
                    <th>Category Pic</th>
                    <th>Category Id</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $selectcat = mysqli_query($conn, "SELECT * FROM sub_category left join category ON sub_category.category_id=category.category_id");
                    if ($selectcat) {
                        while ($row = mysqli_fetch_assoc($selectcat)) {
                            $subcategoryid = $row['sub_cat_id'];
                            $subcategoryname = $row['sub_cat_name'];
                            $categoryid = $row['category_id'];
                            $image=$row['file'];
                    ?>
                            <tr>
                                <td><?php echo $subcategoryid ; ?></td>
                                <td><?php echo $subcategoryname; ?></td>
                                <td><img src="images/<?php echo $image; ?>" style="width: 100px; height:80px" alt="image is not found"></td>
                                <td><?php echo $categoryid; ?></td>
                                <td>
                                    <a href="edit-sub-cat.php?upsubcatid=<?php echo $subcategoryid ; ?>"><button class="btn btn-primary">Edit</button></a>
                                    <a href="delete-sub-cat.php?deletesubcatyid=<?php echo $subcategoryid ; ?>"><button class="btn btn-danger">Delete</button></a>
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