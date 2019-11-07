<?php
session_start();
if ($_SESSION['logueado']){
    include_once '../includes/db.php';
    $con = openCon('../config/db_products.ini');
    $con->set_charset("utf8mb4");
   print_r($_POST);

   $id=$_POST['id'];
   $model=$_POST['modelo'];
   $price=$_POST['precio'];
   $observation=$_POST['observacion'];
   $brand=$_POST['marca'];
   $color=$_POST['color'];
   $sql="update sneakers set model='$model',price='$price',observation='$observation',id_colors='$color',id_brands='$brand' where id_sneakers=".$id;
$con->query($sql);
header('location:list_products.php');
}
?>