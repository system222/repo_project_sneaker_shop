<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootbox.min.js"></script>
    <script>
    function deleteProduct(cod_zapatilla){
        bootbox.confirm("Desea eliminar?"+cod_zapatilla, function(result){
            if(result)
            {
                window.location="delete.php?q="+cod_zapatilla;
               
            }
        });
    }
    
    function updateProduct(cod_zapatilla){
        window.location="edit.php?q="+cod_zapatilla;
    }

    </script>
</head>
<body>
    <h1 class="text-center" style="margin:20px 0px"> Listado de productos </h1>
    <table class="table table-bordered table-striped table table-hover" style="cursor: help">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Model</th>
                <th>Precio</th>
                <th>Color</th>
                <th>Marca</th>
                <th>Eliminar</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody>
        <?php


session_start();
if($_SESSION['logueado'])
{

    include_once '../includes/db.php';
    $con=openCon('../config/db_products.ini');
    $con->set_charset("utf8mb4");
    $sql="select s.id_sneakers as sneakers, s.model as model,s.price as price,s.observation,c.descripcion as color,b.description as brand from sneakers s inner join brands b on b.id_brand=s.id_brands inner join colors c on s.id_colors=c.id_colors";
    $result=$con->query($sql);
    while($row=$result->fetch_assoc()){
    ?>
        <tr>
       <td>
       <?php echo $row["sneakers"];?>
        </td>

       
        <td>
        <?php echo $row["model"];?>
       </td>

        <td>
        <?php echo $row["price"];?>
        </td>

        <td>
        <?php echo $row["color"];?>
        </td>

        <td>
        <?php echo $row["brand"];?>
         </td>

         <td>
         <a class='btn btn-outline-dark' href='#' onclick="deleteProduct(<?php echo $row['sneakers'];?>)">Eliminar producto</a>
         
        </td>

        <td>
        <a class='btn btn-outline-primary' href='#' onclick="updateProduct(<?php echo $row['sneakers'];?>)">editar producto</a>
        </td>

        </tr>
 <?php   
 }
}
?>


        </tbody>
    </table>     
</body>
</html>


