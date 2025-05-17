<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/top-header.php"); ?>
<?php if(isset($_GET['upcategoryid'])){
        $updateid=$_GET['upcategoryid'];
      
        $updatecat=mysqli_query($conn,"SELECT * FROM  category WHERE category_id=$updateid");
    if($updatecat){
        if(mysqli_num_rows($updatecat)==1){
            $row=mysqli_fetch_assoc($updatecat);
            $updatenme=$row['category_name'];
            $updateimage=$row['file'];
          
        }
    }
}
?>
 <?php 
    if(isset($_POST['update_category'])){
        $updatecategory=$_POST['upcategory'];
        $file=$_FILES['image']['name'];
        $tmp=$_FILES['image']['tmp_name'];
        $folder="./images/".$file;
        move_uploaded_file($tmp,$folder);
       $_SESSION['category-data']=$_POST;

       if(!empty($updatecategory)){
        if(!preg_match("/^[a-zA-Z-' ]*$/",$updatecategory)){
            echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Category Name Contain a-z / A-Z </div>";
            header("location:edit-category.php");
            exit();
        }else{
            $updatecatq=mysqli_query($conn,"UPDATE category set category_name='$updatecategory', file='$file' where category_id=$updateid");
            if($updatecatq){
                echo $_SESSION['done-msg'] = "<div class='alert alert-success'>Category updated.</div>";
            header("location:all-category.php");
            exit();
            }else{
                echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Query error.</div>";
            header("location:edit-category.php");
            exit();
            }
        }
        }
       }
 ?>
<div class="container">
    <div class="row">
        <div>
            <?php  if(isset($_SESSION['done-msg']) && !empty(isset($_SESSION['done-msg']))){
                echo"<div >{$_SESSION['done-msg']}</div>";
                unset($_SESSION['done-msg']);
            }
            ?>
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
                        <input type="text" id="category" name="upcategory" class="form-control"  value=" <?php if(isset($updatenme)) { echo $updatenme; } ?>">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image Upload</label>
                        <input type="file" name="image" id="image" class="form-control">
                        
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="update_category" class="btn btn-success">UpdateCategory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>