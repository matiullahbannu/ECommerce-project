
<?php include("./Admin/includes/db.php"); 
session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <title> OnlineStore</title>
    <link rel="icon" type="image/x-icon" href="/img/logo.png">
</head>
<body>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">OnlineStore</a>
    </div>
    <ul class="nav navbar-nav">
    <li class="active"><a href="/Admin/index.php" >Dashboard</a></li>
      <li class="active"><a href="index.php" id="home">Home</a></li>
      
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Serves<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php $select=mysqli_query($conn,"SELECT * FROM category");
          if($select){
            while ($row=mysqli_fetch_assoc($select)) {
              $category=$row['category_name'];
              ?>
              <li><a href="show-product.php"><?php echo $category; ?></a></li>
              <?php
            }
          }  ?>
          <li><a href="show-product.php">Laptos</a></li>
          <li><a href="#">Mobile</a></li>
          <li><a href="#">Keyboard</a></li>
        </ul>
      </li>
      <li><a href="#c4">About</a></li>
      <li><a href="#">Contect</a></li>
      <li><a href="#">Logout</a></li>
    </ul>
  </div>
</nav>

