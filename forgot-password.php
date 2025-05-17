<?php include("./includes/navbar.php");
?>


<div class="container">
    <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="card">
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
                    <a href="forgot-password.php"><Strong>Forget Password</Strong></a>
                </div>
            </div>
        </div>
    </div>
</div>