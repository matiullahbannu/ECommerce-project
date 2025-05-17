<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/top-header.php"); ?>
<?php 
    if(isset($_POST['add_order'])){
        $adduser=$_POST['adduser'];
        $amount=$_POST['amount'];
        $address=$_POST['address'];
        $productname=$_POST['productname'];
        $_SESSION['order-data']=$_POST;
//Query start
        if(!empty($adduser) && !empty($address) && !empty($productname) && !empty($amount)){
            if(!preg_match("/^[a-zA-Z0-9-' ]*$/",$address)){
                        echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Address name Containonly a-z / A-Z 0-9 </div>";
                        header("location:add-order.php?error-message=1");
                        exit();
            }else{
                $insert=mysqli_query($conn,"INSERT INTO order_table (user_id,status,total,placed_date,shipping,product_id)VALUES('$adduser','pendding','$amount',now(),'$address','$productname')");
                if($insert){
                       echo $_SESSION['done-msg'] ="<div class='alert alert-success'>Order successful saved.</div>";
                       header("location:all-order.php");
                       exit();
                }else{
                    echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Query error.</div>";
                    header("location:add-order.php?error-message=1");
                    exit();
                }
            }
        }else{
                echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Please fill the feild.</div>";
                header("location:add-order.php?error-message=1");
                exit();
        }
    }
    // for show error exption 
    if(isset($_GET['error-message'])&& !empty(isset($_GET['error-message']) && $_GET['error-message']==1)){
        $adduser=$_SESSION['order-data']['adduser'];
        $amount=$_SESSION['order-data']['amount'];
        $address=$_SESSION['order-data']['address'];
        $productname=$_SESSION['order-data']['productname'];
}
?>
<div class="container">
    <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-12">
        <?php if (isset($_SESSION['done-msg']) && !empty(isset($_SESSION['done-msg']))) {
                echo "<div>{$_SESSION['done-msg']}</div>";
                unset($_SESSION['done-msg']);
            }
            ?>
            <div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                            <label for="adduser" class="control">Add User</label>
                            <select name="adduser" id="adduser" class="form-control">
                                <?php $select = mysqli_query($conn, "SELECT * FROM user");
                                if ($select) {
                                    while ($row = mysqli_fetch_assoc($select)) {
                                        $username = $row['user_name'];
                                        $userid = $row['user_id'];
                                ?>
                                        <option class="form-control" id="adduser" value="<?php if(isset($userid)){echo $userid;} ?>"> <?php if (isset($username)) {echo $username;} ?></option>
                                <?php 
                                    }
                                    } 
                                ?>
                                </select>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="control">Amount</label>
                        <input type="text" name="amount" class="form-control" value="<?php if(isset($desc)) { echo $desc;}?>">
                    </div>
                    <div class="form-group">
                        <label for="address" class="control">Adderss</label>
                        <input type="text" name="address" class="form-control" value="<?php if(isset($stock)) { echo $stock;}?>">
                    </div>
                    
                    <div class="form-group">
                    <label for="productname" class="control">Product</label>
                    <select name="productname" id="productname" class="form-control">
                        <?php $selectproduct=mysqli_query($conn,"SELECT * FROM product");
                        if($selectproduct){
                            while($row=mysqli_fetch_assoc($selectproduct)){
                                $productid=$row['product_id'];
                                $productnme=$row['product_name'];
                        ?>
                        <option value="<?php if(isset($productid)){echo $productid;}?>"><?php if(isset($productnme)){echo $productnme;}?></option>
                        <?php     }
                        }?>
                    </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="add_order" class="btn btn-success">Add Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>