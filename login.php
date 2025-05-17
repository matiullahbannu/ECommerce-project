<?php include("includes/navbar.php"); ?>
<?php if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = mysqli_query($conn, "SELECT * FROM user where email='$email'");
    $num = mysqli_num_rows($select);

    if ($num > 0) {
        $row = mysqli_fetch_assoc($select);

        if(password_verify($password,$row['password'])){
        $usertype_id = $row['usertype_id'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['usertype_id'] = $row['usertype_id'];

        if ($_SESSION['usertype_id'] == "1") {
            header("location:Admin/index.php");
            exit();
        } else {
            $_SESSION['done-msg'] = "Wellcome to Our Online Store";
            header("location:index.php");
            exit();
        }
        }else{
             $_SESSION['done-msg'] = "Password & Email not metch";
            header("location:login.php");
            exit();
        }      
    } 
    else {
        $_SESSION['done-msg'] = "Not Found Anything";
        header("location:login.php");
        exit();
    }
    }

?>

<div class="container">
    <div class="col col-lg-6 col-md-6 col-sm-12">
        <?php
        if (isset($_SESSION['done-msg']) && !empty($_SESSION['done-msg'])) {
            echo "<div class='alert alert-danger'>{$_SESSION['done-msg']}</div>";
            unset($_SESSION['done-msg']);
        }
        ?>
        <div class="card">
            <div class="card-header">
                <h3> Login Form</h3>
            </div>
            <div class="card-body" style="background-color: antiquewhite;">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email" class="control">Enter Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control">Enter Password</label>
                        <input type="text" name="password" id="password" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-success">Login</button>
                    </div> 
                </form>
                <a href="forgot-password.php"><Strong>Forgot Password</Strong></a>
            </div>
        </div>
    </div>
</div>