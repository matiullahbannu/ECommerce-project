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
                     <th>Order Id</th>
                    <th>Product Id</th>
                     <th>User Id</th>
                    <th>Status</th>
                    <th>Total Amount</th>
                     <th>Order Date</th>
                    <th>Shipping Address</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $select = mysqli_query($conn, "SELECT * FROM order_table left join user ON order_table.user_id=user.user_id left join product on order_table.product_id=product.product_id");
                    if ($select) {
                        while ($row = mysqli_fetch_assoc($select)) {
                            $order_id  = $row['order_id'];
                            $user_id = $row['user_name'];
                            $product_id=$row['product_name'];
                            $status=$row['status'];
                            $total=$row['total'];
                            $placed_date=$row['placed_date'];
                            $shipping=$row['shipping'];
                            
                    ?>
                            <tr>
                                <td><?php echo $order_id; ?></td>
                                <td><?php echo $product_id; ?></td>
                                <td><?php echo $user_id; ?></td>
                                <td><?php echo $status; ?></td>
                                <td><?php echo $total; ?></td>
                                <td><?php echo $placed_date; ?></td>
                                <td><?php echo $shipping; ?></td>
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