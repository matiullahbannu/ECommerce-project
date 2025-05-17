<?php include("includes/db.php");
session_start(); ?>

<?php
if (isset($_GET['deletecategoryid'])) {
    $deleteid = $_GET['deletecategoryid'];


    $delete = mysqli_query($conn, "DELETE FROM category where category_id=$deleteid");
    if ($delete) {
        echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Category Record is deleted.</div>";
        header("location:all-category.php");
        exit();
    }
}
?>