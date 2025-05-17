<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/top-header.php"); ?>



    <?php if (isset($_SESSION['done-msg']) && !empty(isset($_SESSION['done-msg']))) {
        echo"<div>{$_SESSION['done-msg']}</div>";
             unset($_SESSION['done-msg']);
    }
    ?>
    <div class="container">
        <div class="row">
            <table class="table" style="width: 100%;">
                <thead>
                    <th>product Id</th>
                    <th>product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Images</th>
                    <th>Date</th>
                    <th>Category</th>
                    <th>CategoryId</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $select = mysqli_query($conn, "SELECT * FROM product left join sub_category ON product.sub_cat_id=sub_category.sub_cat_id");
                    if ($select) {
                        while ($row = mysqli_fetch_assoc($select)) {
                            $productid = $row['product_id'];
                            $productname = $row['product_name'];
                            $desc=$row['product_desc'];
                            $price=$row['price'];
                            $stock=$row['stock'];
                            $image=$row['file'];
                            $date=$row['date'];
                            $category=$row['sub_cat_name'];
                            $category_id=$row['sub_cat_id'];
                    ?>
                            <tr>
                                <td><?php echo $productid; ?></td>
                                <td><?php echo $productname; ?></td>
                                <td><?php echo $desc; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $stock; ?></td>

                                <td><img src="images/<?php echo $image; ?>" style="width: 100px; height:80px" alt="image is not found"></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $category; ?></td>
                                <td><?php echo $category_id; ?></td>
                                <td>
                                    <a href="edit-product.php?upproductid=<?php echo $productid; ?>"><button class="btn btn-primary">Edit</button></a>
                                    <a href="delete-product.php?deleteproductid=<?php echo $productid; ?>"><button class="btn btn-danger">Delete</button></a>
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