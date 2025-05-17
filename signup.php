<?php include("includes/navbar.php");  ?>
<!-- For email matching code -->
<?php
if (isset($_POST['signup'])) {
    $uname = $_POST['uname'];
    $fname = $_POST['fname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $_SESSION['user-data'] = $_POST;

     $selectemail=mysqli_query($conn,"SELECT * FROM user where email='$email'");
     $num=mysqli_num_rows($selectemail);
     if($num > 0){
        echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>This Email is already exist Go Forget Password</div>";
                header("location:signup.php");
                exit();
     }

    elseif (!empty($uname) && !empty($fname) && !empty($address) && !empty($email) && !empty($password)) { 
            if (!preg_match("/^[a-zA-Z-' ]*$/", $uname)) {
                echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Name only contain a-z / A-Z </div>";
                header("location:signup.php");
                exit();
            }elseif(!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
                echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Father Name only contain a-z / A-Z </div>";
                header("location:signup.php");
                exit();
        }else{
            $insert=mysqli_query($conn,"INSERT INTO user (user_name,user_fname,address,date,email,stetus,password,usertype_id)values('$uname',
            '$fname','$address',now(),'$email','$gender','$password',2)");
            if($insert){
                echo $_SESSION['done-msg'] = "<div class='alert alert-success'>Your suuccessfull signup</div>";
                header("location:index.php");
                exit();
            }else{
                echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Quer Error </div>";
                header("location:signup.php");
                exit();
            }
        }
    }else{
        echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Please fill all the feilds </div>";
                header("location:signup.php");
                exit();
    }
}
?>
<div class="container">
    <div class="col col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <?php if (isset($_SESSION['done-msg']) && !empty(isset($_SESSION['done-msg']))) {
                echo "<div>{$_SESSION['done-msg']}</div>";
                unset($_SESSION['done-msg']);
            } ?>
            <div class="card-header">
                <strong>Sign Up </strong>
            </div>
            <div class="card-body" style="background-color: antiquewhite;">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="uname" class="control">Name</label>
                        <input type="text" id="uname" name="uname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fname" class="control">Father Name</label>
                        <input type="text" id="fname" name="fname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address" class="control">Address</label>
                        <input type="text" id="address" name="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <strong>Gender::</strong>
                        Male
                        <input type="radio" name="gender" id="" value="Male">
                        Female
                        <input type="radio" name="gender" id="" value="Female">
                        Other
                        <input type="radio" name="gender" id="" value="other">
                    </div>

                    <br>
                    <div class="form-group">
                        <button type="submit" name="signup" value="signup" class="btn btn-success">Sign Up</button>
                    </div>
                </form>
                <p>You have already account :: <a href="login.php">Click here to login</a></p>
                <a href="forgot-password.php"><Strong>Forgot Password</Strong></a>
            </div>
        </div>
    </div>
</div>