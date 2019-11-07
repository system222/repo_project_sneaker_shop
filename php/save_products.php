<?php
session_start();
include_once 'upload_image.php';
if($_SESSION['logueado']);
{
$modelo=$_POST['modelo'];
$marca=$_POST['marca'];
$color=$_POST['colors'];
$precio=$_POST['precio'];
$observation=$_POST['observation'];
include_once '../includes/db.php';
$con=openCon('../config/db_products.ini');
$con->set_charset("utf8mb4");

$sql="insert into sneakers (model, price, id_colors, id_brands, image, observation) values (?,?,?,?,?,?)";

$path_img=$directorio.$nombre_img;

$stmt=$con->prepare($sql);
$stmt->bind_param("sdiiss",$modelo,$precio,$color,$marca,$path_img,$observation);

if($stmt->execute())
    {
    
    ?>
    <script>
alert ("producto ingresado");
window.location="insert_products.php";

    </script>
    <?php
     }
}
     ?>