<?php include("./Admin/includes/db.php"); 
session_start();
?>
<?php 
 if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
       $user_name= $_SESSION['user_name'];
        $usertype_id=$_SESSION['usertype_id'];
        
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Bundle JS (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="product.css">
  <title>Online Store</title>
</head>

<body>
  <div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Online Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php 
            if($usertype_id=="1"){
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link" href="./Admin/index.php">Dashboard</a></li>
              <?php 
               }
              ?>
            <li class="nav-item dropdown">
              <a class="nav-link" href="index.php">Home</a></li>

            <li class="nav-item dropdown position-relative">
              <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Our Servse
              </a>
              <ul class="dropdown-menu">
                <?php
                $select = mysqli_query($conn, "SELECT * FROM category");
                if ($select) {
                  while ($row = mysqli_fetch_assoc($select)) {
                    $category = $row['category_name'];
                    $cat_id = $row['category_id']; // Use the correct category ID
                ?>
                    <li class="dropdown-submenu position-relative">
                      <a class="dropdown-item " href="#"><?php echo $category; ?></a>
                      <ul class="dropdown-menu">
                        <?php
                        $sub_select = mysqli_query($conn, "SELECT * FROM sub_category WHERE category_id = $cat_id");
                        if ($sub_select) {
                          while ($sub = mysqli_fetch_assoc($sub_select)) {
                            $subcategory = $sub['sub_cat_name'];
                            $subcatid = $sub['sub_cat_id'];
                        ?>
                            <li><a class="dropdown-item " href="/show-product.php?subid=<?php echo $subcatid; ?>"><?php echo $subcategory; ?></a></li>
                        <?php
                          }
                        }
                        ?>
                      </ul>
                    </li>
                <?php
                  }
                }
                ?>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link" href="about.php">About</a></li>
            <li class="nav-item dropdown"><a class="nav-link" href="signup.php"> Sign Up</a></li>
            <?php 
           
            if(isset($user_id)){
              echo"<li class='nav-item dropdown'><a class='nav-link' href='logout.php'>Logout</a></li>";
            }else{
                   echo "<li class='nav-item dropdown'><a class='nav-link' href='login.php'>Login</a></li>";
            }
           
           
            
          
            ?>
      
          </ul>
        </div>


      </div>
    </nav>
  </div>
</body>

</html>