<?php 
$server='localhost';
$user='root';
$database='e-commerce';
$pass='';
$conn=mysqli_connect($server,$user,$pass,$database);
if(!$conn){
    echo "database connection error";
}
?>