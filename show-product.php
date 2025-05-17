<?php include("includes/navbar.php"); ?>
<?php if (isset($_SESSION['done-msg']) && !empty(isset($_SESSION['done-msg']))) {
    echo "<div>{$_SESSION['done-msg']}</div>";
    unset($_SESSION['done-msg']);
}
?>
 <?php if(isset($_GET['subid']))
 $subcatid=$_GET['subid'];

 ?>
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <?php
            $select = mysqli_query($conn, "SELECT * FROM product left join sub_category ON product.sub_cat_id=sub_category.sub_cat_id where sub_category.sub_cat_id=$subcatid");
            if ($select) {
                while ($row = mysqli_fetch_assoc($select)) {
                    $productid = $row['product_id'];
                    $productname = $row['product_name'];
                    $desc = $row['product_desc'];
                    $price = $row['price'];
                    $stock = $row['stock'];
                    $image = $row['file'];
                    $date = $row['date'];
                    $category = $row['sub_cat_name'];
                    $category_id = $row['sub_cat_id'];
            ?>
                    <div class="col-sm-4">
                        <div class="card" style="padding: 2px;" >
                            <img src="./Admin/images/<?php echo $image; ?>" alt="Mountains"  width="128" height="128"  class="card-img-to">
                            <div class="card-body">
                                <h3 class="card-title" style="color:black;"><?php echo $productname; ?></h3>
                                <p class="card-text">
                                    <?php echo $desc; ?>
                                </p>
                                <h4>Stock ::<?php echo $stock; ?></h4>
                                <a href="">Read more</a>
                            </div>
                        </div>
                    </div>
      
<?php
                }
            }

?>

  </div>
    </div>
</div>
<h2 id="c4">this is my onlilne store and my contact here</h2>
<a href="#home">Go To Home</a>