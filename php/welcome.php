<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    
</body>
</html>



<?php
session_start();
if($_SESSION['logueado'])
{
echo "BIENVENIDO  ". $_SESSION['uname']."<br />";
echo "hora de conección ".$_SESSION['time']."<br/>";
echo "<a href='logout.php'> Logout</a>";
echo "<h1 class='text-center'> opciones de menu </h1>";
echo "<a href='insert_products.php'style='display:flex;justify-content:center;'>INSERTAR PRODUCTOS</a>";
echo "<a href='list_products.php'style='display:flex;justify-content:center;'>Eliminar Producto</a>";
echo "<a href='list_products.php'style='display:flex;justify-content:center;'>Actualizar Producto</a>";


}
else
header("location:../form-login.html");


 

?>