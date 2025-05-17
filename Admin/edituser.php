<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/top-header.php"); ?>
<?php 
//select data for update
if(isset($_GET['updateuser']))
{
    $id=$_GET['updateuser'];
    $selectup=mysqli_query($conn,"SELECT * FROM user where user_id='$id'");
    if(mysqli_num_rows($selectup)==1){
        $row=mysqli_fetch_assoc($selectup);

        $unameu=$row['user_name'];
        $fnameu=$row['user_fname'];
        $address=$row['address'];
        $email=$row['email'];
        $password=$row['password'];
        $image=$row['file'];    
    }
}
?>
<!-- !Her php coding for update  -->
 <?php  
  if(isset($_POST['update']))
  {
        $uname=$_POST['uname'];
        $fname=$_POST['fname'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
        $gender=$_POST['gender'];

        $file=$_FILES['image']['name'];
        $tmp=$_FILES['image']['tmp_name'];
        $folder='./images/'.$file;
        move_uploaded_file($tmp,$folder);
        $_SESSION['user-data']=$_POST;
    if(!preg_match("/^[a-zA-Z-']*/",$uname)){
        echo $_SESSION['done-msg']="<div class='alert alert-danger'>Name contain  only a-z / A-Z</div>";
        header("location:edituser.php");
        exit();
    }elseif(!preg_match("/^[a-zA-Z-']*/",$fname)){
        echo $_SESSION['done-msg']="<div class='alert alert-danger'>Name contain  only a-z / A-Z</div>";
        header("location:edituser.php");
        exit();
    }else{
        $updateu="UPDATE user set user_name='$uname',user_fname='$fname',address='$address',date=now(),email='$email',
        	stetus='$gender',password='$password',file='$file' where user_id=$id";
        $updateq=mysqli_query($conn,$updateu);
        if($updateq){
            echo $_SESSION['done-msg']="<div class='alert alert-success'>Record is ssuccessful update</div>";
            header("location:all-users.php");
            exit();
        }
        else{
            echo $_SESSION['done-msg']="<div class='alert alert-danger'>Query Error</div>";
            header("location:edituser.php");
            exit();
        }
    }
  }
  ?>

<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container">
        <div class="row">
            <?php 
            if(isset($_SESSION['done-msg']) && !empty(isset($_SESSION['done-msg']))){
                echo "<div>{$_SESSION['done-msg']}</div>";
                unset($_SESSION['done-msg']);
            }
            ?>
            <div class="col-lg-6 col-md-6">
                <div style="text-align: center; background:powderblue"><strong>Update </strong><small>User::</small></div>
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="class-group">
                        <label for="uname"  class="control">Update Name:</label>
                        <input type="text" id="uname" name="uname" class="form-control" value="<?php if(isset($unameu)){ echo $unameu;  }?>">
                    </div>
                    <div class="form-group">
                        <label for="fname" class="control">Father Name:</label>
                        <input type="text" id="fname" name="fname" class="form-control" value="<?php if(isset($fnameu)){ echo $fnameu;  }?>">
                    </div>
                    <div class="form-group">
                        <label for="address" class="control">Address:</label>
                        <input type="text" id="address" name="address" class="form-control" value="<?php if(isset($address)){ echo $address;  }?>">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control">Email:</label>
                        <input type="text" id="email" name="email" class="form-control" value="<?php if(isset($email)){ echo $email;  }?>">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control">change password:</label>
                        <input type="password" name="password" id="password" class="form-control" value="<?php if(isset($password)){ echo $password;  }?>">
                    </div>
                    <div class="form-group">
                        <strong>Gender::</strong>
                        <input type="radio" name="gender" id="gender" value="Male"> Male:: 
                        <input type="radio" name="gender" id="gender" value="Female"> Female::
                        <input type="radio" name="gender" id="gender" value="Other"> Other::
                    </div>
                    <div class="form-group">
                        <label for="image" class="control">Update file</label>
                    <input type="file" name="image" id="" class="form-control" value="<?php if(isset($image)){ echo $image;  }?>">
                    <img src="images/<?php echo $image; ?>" alt="" style="width:50px; hieght:50px;">
                    </div>
                    
                    <button type="submit" name="update" value="update" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>