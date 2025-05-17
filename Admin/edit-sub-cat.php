<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/top-header.php"); ?>
<?php if(isset($_GET['upsubcatid'])){
        
        $updateid=$_GET['upsubcatid'];

        $updatecat=mysqli_query($conn,"SELECT * FROM  sub_category WHERE sub_cat_id=$updateid");
    if($updatecat){
        if(mysqli_num_rows($updatecat)==1){
            $row=mysqli_fetch_assoc($updatecat);
            $subcatenme=$row['sub_cat_name'];
        }
    }
}
?>

    <!-- coding for update -->
<?php if (isset($_POST['sub_category'])) {
        $subcategory = $_POST['subcategory'];
        $categoryname = $_POST['category'];
       
        $_SESSION['sub-category-data'] = $_POST;

     if (!empty($subcategory) && !empty($subcategory)) {

           if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $subcategory)) {

                echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Sub Category Containonly a-z / A-Z </div>";
                header("location:add-sub-cat.php");
                exit();
        }else{
                $insertsubcat=mysqli_query($conn,"UPDATE sub_category set sub_cat_name='$subcategory' where sub_cat_id=$updateid");
                if($insertsubcat){
                     echo $_SESSION['done-msg'] = "<div class='alert alert-success'>Sub Category is successful Saved</div>";
                     header("location:all-sub-cat.php");
                     exit();
                }
        }
     }else{
        echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Pleas fill the field</div>";
        header("location:add-sub-cat.php");
        exit();
     }
    } 
?>
<div class="container">
    <div class="row">

        <div class="col col-lg-6 col-md-6 col-sm12">
            <?php if (isset($_SESSION['done-msg']) && !empty(isset($_SESSION['done-msg']))) {
                echo "<div>{$_SESSION['done-msg']}</div>";
                unset($_SESSION['done-msg']);
            }
            ?>
            <div style="text-align: center;"><strong>Category ::</strong><small>Form</small></div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="category" class="control">Sub Category Name</label>
                    <input type="text" id="category" name="subcategory" class="form-control" value="<?php if(isset($subcatenme)){ echo $subcatenme;} ?>">
                </div>

                <div class="form-group">
                    <select name="category" id="category" class="form-control">
                        <?php $select = mysqli_query($conn, "SELECT * FROM category");
                        if ($select) {
                            while ($row = mysqli_fetch_assoc($select)) {
                                $categoryname = $row['category_name'];
                                $categoryid = $row['category_id'];
                        ?>
                                <option class="form-control" id="category" value="<?php if (isset($categoryid)) {
                                                                                        echo $categoryid;
                                                                                    } ?>"><?php if (isset($categoryname)) {
                                                                                                                                            echo $categoryname;
                                                                                                                                        } ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="sub_category" class="btn btn-success">Add Sub Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>