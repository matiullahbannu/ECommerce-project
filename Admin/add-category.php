<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/top-header.php"); ?>
<?php 
if(isset($_POST['add_category'])){
        $categoryname=$_POST['category'];

        $file=$_FILES['image']['name'];
        $tmp=$_FILES['image']['tmp_name'];
        $folder="./images/".$file;
        
        move_uploaded_file($tmp,$folder);
        $_SESSION['category-data']=$_POST;

        if(!empty($categoryname) && !empty($file)){
        
        if(!preg_match("/^[a-zA-z-' ]*$/",$categoryname)){
                echo $_SESSION['done-msg']="<div class='alert alert-danger'>Category name only a-z / A-Z</div>";
                header("location:add-category.php");
                exit();
    }else{
                $category=mysqli_query($conn,"INSERT INTO category (category_name,file) values ('$categoryname','$file')");
        if($category){
             echo $_SESSION['done-msg']="<div class='alert alert-success'>Category Saved successful</div>";
             header("location:all-category.php");
             exit();
        }else{
            echo $_SESSION['done-msg']="<div class='alert alert-danger'>Query error</div>";
            header("location:add-category.php");
            exit();
        }
    }
    }else{
        echo $_SESSION['done-msg']="<div class='alert alert-danger'>Please check image and file the feild.</div>";
        header("location:add-category.php?error-message=1");
        exit();
    }
   
}
        if(isset($_GET['error-message'])&& !empty(isset($_GET['error-message']) && $_GET['error-message']==1)){
                $categorynme=$_SESSION['category-data']['category'];
                
}
?>
<div class="container">
    <div class="row">
        <div>
            <div class="col col-lg-6 col-md-6 col-sm-12">
                <?php if(isset($_SESSION['done-msg'])&& !empty(isset($_SESSION['done-msg']))){
                    echo"<div>{$_SESSION['done-msg']}</div>";
                    unset($_SESSION['done-msg']);
                }
                ?>
                <div style="text-align: center;"><strong>Category ::</strong><small>Form</small></div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="category" class="control">Category Name</label>
                        <input type="text" id="category" name="category" class="form-control"  value=" <?php if(isset($categorynme)) { echo $categorynme; } ?>">
                    </div>
                    .<div class="mb-3">
                        <label for="image" class="form-label">Image Upload</label>
                        <input type="file" name="image" id="image" class="form-control">
                        
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="add_category" class="btn btn-success">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>