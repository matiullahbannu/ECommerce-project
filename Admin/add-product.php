<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/top-header.php"); ?>
<?php 
    if(isset($_POST['add_product'])){
        $product=$_POST['product'];
        $desc=$_POST['desc'];
        $price=$_POST['price'];
        $stock=$_POST['stock'];
        $category=$_POST['category'];
        //file
        $file=$_FILES['image']['name'];
        $tmp=$_FILES['image']['tmp_name'];
        $folder="./images/".$file;
        move_uploaded_file($tmp,$folder);
        $_SESSION['product-data']=$_POST;
//Query start
        if(!empty($product) && !empty($desc) && !empty($price) && !empty($stock)){
            if(!preg_match("/^[a-zA-Z0-9-' ]*$/",$product)){
                echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Product name Containonly a-z / A-Z 0-9 </div>";
                header("location:add-product.php?error-message=1");
                exit();
            }else{
                $insert=mysqli_query($conn,"INSERT INTO product (product_name,product_desc,price,stock,file,date,sub_cat_id)VALUES
                ('$product','$desc','$price','$stock','$file',NOW(),'$category')");
                if($insert){
                    echo $_SESSION['done-msg'] ="<div class='alert alert-success'>Product successful saved.</div>";
                header("location:all-product.php");
                exit();
                }else{
                    echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Query error.</div>";
                header("location:add-product.php?error-message=1");
                exit();
                }
            }
        }else{
            echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Please fill the feild.</div>";
                header("location:add-product.php?error-message=1");
                exit();
        }
    }
    // for show error exption 
    if(isset($_GET['error-message'])&& !empty(isset($_GET['error-message']) && $_GET['error-message']==1)){
        $productnme=$_SESSION['product-data']['product'];
        $desc=$_SESSION['product-data']['desc'];
        $price=$_SESSION['product-data']['price'];
        $stock=$_SESSION['product-data']['stock'];
        
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
                        <label for="product" class="control">Product Name</label>
                        <input type="text" name="product" class="form-control" value="<?php if(isset($productnme)) { echo $productnme;}?>">
                    </div>
                    <div class="form-group">
                        <label for="desc" class="control">Product Description</label>
                        <input type="text" name="desc" class="form-control" value="<?php if(isset($desc)) { echo $desc;}?>">
                    </div>
                    <div class="form-group">
                        <label for="price" class="control">Price</label>
                        <input type="text" name="price" class="form-control" value="<?php if(isset($price)) { echo $price;}?>">
                    </div>
                    <div class="form-group">
                        <label for="stock" class="control">Stock</label>
                        <input type="number" name="stock" class="form-control" value="<?php if(isset($stock)) { echo $stock;}?>">
                    </div>
                    <div class="form-group">
                    <select name="category" id="category" class="form-control">
                        <?php $select = mysqli_query($conn, "SELECT * FROM sub_category");
                        if ($select) {
                            while ($row = mysqli_fetch_assoc($select)) {
                                $categoryname = $row['sub_cat_name'];
                                $categoryid = $row['sub_cat_id'];
                        ?>
                                <option class="form-control" id="category" value="<?php if (isset($categoryid)) {echo $categoryid;} ?>"><?php if (isset($categoryname)) {echo $categoryname;} ?></option>
                        <?php 
                            }
                            } 
                        ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="image" class="control">Upload Picture</label>
                    <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="add_product" class="btn btn-success">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>