<?php include("includes/db.php");
session_start();
?>

<?php  
if(isset($_GET['deleteuser'])){
    $userid=$_GET['deleteuser'];
   
    $delete="DELETE  FROM user where user_id=$userid";
    $deleteq=mysqli_query($conn,$delete);
    if($deleteq){
        echo $_SESSION['done-msg']="<div class='alert alert-danger'>Data is Deleted From User Table</div>";
        header("location:all-users.php");
        exit();

    }
}
?>