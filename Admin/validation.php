<?php
include("includes/db.php");
// if(isset($_FILES)){
//     $file=$_FILES['image']['name'];
//     $temp=$_FILES['image']['tmp_name'];
//     $folder='../images/'.$file;

//     $query=mysqli_query($conn,"INSERT INTO image (file)values('$file')");
//     if($query){
//         echo "Image is uploaded successful";
//     }
//     else{
//         echo "Image is not uploaded successful";
//     }
// }

if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
    $file = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $folder = './images/' . $file;

    move_uploaded_file($temp, $folder); // Don't forget to actually move the file

    $query = mysqli_query($conn, "INSERT INTO image (file) VALUES ('$file')");
    if($query){
        echo "Image is uploaded successfully.";
    } else {
        echo "Failed to insert image info into database.";
    }
} else {
    echo "No image uploaded or upload error.";
}
?>
<!-- <form action="" enctype="multipart/form-data" method="post">
    <input type="file" name="image" id="images">
    <button type="submit" class="btn btn-primary">Submit</button>
</form> -->
<form action="validation.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" />
    <input type="submit" value="Upload" />
</form>
 <?php  
$select=mysqli_query($conn,"SELECT * FROM image");
while ($row=mysqli_fetch_assoc($select)) {
  

?>
<img src="images/<?php echo $row['file'] ?>" alt="">
<?php 
}
?>