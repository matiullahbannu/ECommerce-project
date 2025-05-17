        <?php include("includes/header.php"); ?>
        <?php include("includes/sidebar.php"); ?>
        <?php include("includes/top-header.php"); ?>

        <?php
       
        if (isset($_POST['add_user'])) {
            $uname = $_POST['uname'];
            $fname = $_POST['fname'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $password =password_hash($_POST['password'],PASSWORD_DEFAULT) ;
            $gender = $_POST['gender'];
//Multiple checkbox 
            $file=$_FILES['image']['name'];
            $tmp=$_FILES['image']['tmp_name'];
            $folder='./images/'.$file;
            move_uploaded_file($tmp,$folder);

        
            $_SESSION['user-data'] = $_POST;

            if (empty($uname) || empty($fname) || empty($address)|| empty($email)) {
                echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Fill the fields</div>";
                header("location:add-user.php?error-message=1");
                exit();

            } elseif (!preg_match("/^[a-zA-Z-' ]*$/",$uname)) {
                echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Name only a-z / A-Z letter.</div>";
                header("location:add-user.php?error-message=1");
                exit();

            } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
                echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>F Name only a-z / A-Z letter.</div>";
                header("location:add-user.php?error-message=1");
                exit();

            } elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Email is not valid.</div>";
                header("location:add-user.php");
                exit();
            }else
             {
                $insert = "INSERT INTO user (user_name,user_fname,address,date,email,stetus,password,file,usertype_id) values 
                ('$uname','$fname','$address',now(),'$email','$gender','$password','$file',1)";
                $insertq = mysqli_query($conn, $insert);

                if ($insertq) {
                    echo $_SESSION['done-msg'] = "<div class='alert alert-success'>Data is successful saved</div>";
                    header("location:all-users.php");
                    exit();

                } else {
                    echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Query error</div>";
                    header("location:add-user.php?error-message=1");
                    exit();
                }
            }
     
        }
            if(isset($_GET['error-message']) && !empty(isset($_GET['error-message'])) && $_GET['error-message']==1)
            {
            
                $uname=$_SESSION['user-data']['uname'];
                $fname=$_SESSION['user-data']['fname'];
               $address=$_SESSION['user-data']['address'];
                $email=$_SESSION['user-data']['email'];
            }
        
        ?>

        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <!-- call session -->
                        <?php
                        if (isset($_SESSION['done-msg']) && !empty($_SESSION['done-msg'])) {
                            echo "<div>{$_SESSION['done-msg']}</div>";
                            unset($_SESSION['done-msg']);
                        }
                        ?>
                        <form action="" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label for="uname" class="control">User Name</label>
                                <input type="text" id="uname" name="uname" class="form-control" placeholder="Enter user name"  value="<?php if(isset($uname)){ echo $uname; }?>">
                            </div>
                            <div class="form-group">
                                <label for="fname" class="control">Father Name</label>
                                <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter user name" value="<?php if(isset($fname)){ echo $fname; }?>">
                            </div>
                            <div class="form-group">
                                <label for="address" class="control">Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Enter address" value="<?php if(isset($address)){ echo $address; }?>">
                            </div>
                            <div class="form-group">
                                <label for="email" class="control">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="<?php if(isset($email)){ echo $email; }?>">
                            </div>
                            <div class="form-group">
                                <label for="password" class="control">Create Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                Gender::
                                <input type="radio" name="gender" value="male"> Male
                                <input type="radio" name="gender" value="female">Female
                                <input type="radio" name="gender" value="other" id="">Other
                            </div>
                            <div class="form-group">
                                <label for="img" class="control">Upload file</label>
                                <input type="file" name="image" id="" class="form-control">
                            </div>
                            <div class="class-group">
                                <button type="submit" name="add_user" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include("includes/footer.php"); ?>