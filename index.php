<?php include("includes/navbar.php"); ?>
 <?php if (isset($_SESSION['done-msg']) && !empty(isset($_SESSION['done-msg']))) {
                echo "<div>{$_SESSION['done-msg']}</div>";
                unset($_SESSION['done-msg']);
            } ?>
<h2>Online Store</h2>
<p>This is our online store to parchse Mobile and Laptops.</p>
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 ">
                <div class="card" style="border: 1px solid gray;">
                    <img src="./img/product.png" alt="Mountains" style="width:70%" class="card-img-to">
                    <div class="card-body">
                        <h5 class="card-title">BOOTSTRAP 5</h5>
                        <p class="card-text">
                            Bootstrap is a widely-used open-source
                            front-end framework for web development,
                            providing a collection of HTML, CSS, and
                            JavaScript components and tools that
                            enable developers to build responsive,
                            mobile-first websites with ease1.....
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="card" style="border: 1px solid black;">
                    <img src="./img/category.png" alt="Mountains" style="width:70%" class="card-img-to">
                    <div class="card-body">
                        <h5 class="card-title">BOOTSTRAP 5</h5>
                        <p class="card-text">
                            Bootstrap is a widely-used open-source
                            front-end framework for web development,
                            providing a collection of HTML, CSS, and
                            JavaScript components and tools that
                            enable developers to build responsive,
                            mobile-first websites with ease1.....
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="card" style="border: 1px solid black;">
                    <img src="./img/logo.png" alt="Mountains" style="width:70%" class="card-img-to">
                    <div class="card-body">
                        <h5 class="card-title">BOOTSTRAP 5</h5>
                        <p class="card-text">
                            Bootstrap is a widely-used open-source
                            front-end framework for web development,
                            providing a collection of HTML, CSS, and
                            JavaScript components and tools that
                            enable developers to build responsive,
                            mobile-first websites with ease1.....
                        </p>
                    </div>
                </div>
            </div>
                <div class="row">
                            <?php $select=mysqli_query($conn,"SELECT * FROM product ");
                            if(mysqli_num_rows($select)>0){
                                while($row=mysqli_fetch_assoc($select)){
                                    $productname=$row['product_name'];
                                    $image=$row['file'];
                                    $desc=$row['product_desc'];
                            ?>
                    <div class="col-sm-4 ">
                        <div class="card" style="border: 1px solid black;">
                            <img src="./Admin/images/<?php echo $image;?>" alt="Mountains" style="width:70%" class="card-img-to">
                                 <div class="card-body">
                                 <h5 class="card-title"><?php echo $productname; ?> </h5>
                                    <p class="card-text">
                                         <?php echo $desc; ?>
                                    </p>
                            <a href="#"></a>
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
</div>