<?php include("includes/db.php");
session_start(); ?>

<?php
if (isset($_GET['deletesubcatyid'])) {
    $deleteid = $_GET['deletesubcatyid'];


    $delete = mysqli_query($conn, "DELETE FROM sub_category where sub_cat_id=$deleteid");
    if ($delete) {
        echo $_SESSION['done-msg'] = "<div class='alert alert-danger'>Sub-Category Record is deleted.</div>";
        header("location:all-sub-cat.php");
        exit();
    }
}
?>