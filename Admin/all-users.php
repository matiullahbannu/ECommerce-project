<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/top-header.php"); ?>

<div><a href="add-user.php"><button class="btn btn-success" style="float:right">Add User</button></a>
<h2 style="color: deepskyblue;">Users Details...</h2>
<?php 
if(isset($_SESSION['done-msg'])&& !empty($_SESSION['done-msg'])){
    echo "<div>{$_SESSION['done-msg']}</div>";
    unset($_SESSION['done-msg']);
}
?>
 <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container">
               
    <table class="table table-responsive-sm table-responsive-md table-responsive-lg table-hover">
        <thead>
            <tr>
                <th>Id #</th>
                <th>Name</th>
                <th>F Name</th>
                <th>Address</th>
                <th>Date</th>
                <th>Gender</th>
                <th>Email</th>
                
                <th>Picture</th>
                <th>Action</th>
            </tr>
        <tbody>
            <?php
            $select = "SELECT * FROM user";
            $selectq = mysqli_query($conn, $select);
            if ($selectq) {
                if (mysqli_num_rows($selectq) > 0) {
                    while ($row = mysqli_fetch_assoc($selectq)) {
                        $id = $row['user_id'];
                        $name = $row['user_name'];
                        $fname = $row['user_fname'];
                        $address = $row['address'];
                        $date=$row['date'];
                        $gender=$row['stetus'];
                        $email = $row['email'];
                        
                        $image=$row['file'];
            ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $fname; ?></td>
                            <td><?php echo $address; ?></td>
                            <td><?php echo $date; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $email; ?></td>
                            
                            <td><img src="images/<?php echo $image; ?>" style="width: 70px; hieght:100px" alt=""></td>
                            <td>
                                <a href="edituser.php?updateuser=<?php echo $id; ?>"><button class="btn btn-primary">Edit</button> </a>
                                <a href="deleteuser.php?deleteuser=<?php echo $id; ?>"><button class="btn btn-danger">Delete</button> </a>
                                <a href="#.php?updateuser=<?php echo $id; ?>"><button class="btn btn-success">Accept</button> </a>
                            </td>

                        </tr>
            <?php
                    }
                }
            }
            ?>

        </tbody>
        </thead>
    </table>
</div>
<?php include("includes/footer.php") ?>