<?php
include("includes/db.php");
session_start();
?>


<?php
if (isset($_GET['deleteproductid'])) {
    $updatepid = $_GET['deleteproductid'];
    echo $updatepid;
    //Select query for product
    $selectp = mysqli_query($conn, "SELECT * FROM product where product_id=$updatepid");
    if ($selectp) {
        if (mysqli_num_rows($selectp) == 1) {
            $row = mysqli_fetch_assoc($selectp);
            $product = $row['product_name'];
        }
    }
}
?>
<?php
if (isset($_GET['deleteproductid'])) {
    $deleteid = $_GET['deleteproductid'];


    $delete = mysqli_query($conn, "DELETE FROM product where product_id=$deleteid");
    if ($delete) {
        echo $_SESSION['done-msg'] = "<div class='alert alert-danger'> $product  Is Deleted From Product Record .</div>";
        header("location:all-product.php");
        exit();
    }
}


?>