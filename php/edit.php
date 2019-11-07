<?php


session_start();
if ($_SESSION['logueado']) {

    include_once '../includes/db.php';
    $con = openCon('../config/db_products.ini');
    $con->set_charset("utf8mb4");
    $idupt = $_GET['q'];
    $sql = "select s.id_sneakers as sneakers , 
    s.model as model, 
    s.price as price,
    s.observation as observation,
    b.description as description,
    b.id_brand as id_brands,
    c.id_colors as id_colors, 
    c.descripcion as color
    from sneakers s inner join brands b on b.id_brand=s.id_brands 
    inner join colors c on s.id_colors=c.id_colors 
    WHERE id_sneakers=" . $idupt;
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Lato|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/form.css">
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Editar productos</h3>
            </div>
            <div class="col-md-12">
                <form class="form-group" accept-charset="UTF-8" action="update-product.php" method="post" enctype="multipart/form-data">
                
<div class="form-group">
<input type="hidden" name="id" value="<?php echo $row['sneakers']?>">
</div>

                    <div class="form-group">
                        <label class="control-label">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $row['model'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Precio</label>
                        <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $row['price'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Observacion</label>
                        <textarea rows=3 id="observacion" name="observacion" class="form-control">
            <?php echo $row['observation'] ?>
            </textarea>
                    </div>
                 
                 
                    <div class="form-group">
                        <label class="control-label">Marca</label>
                        <select id="marca" name="marca" class="form-control">
                            <option value="<?php echo $row['id_brands'] ?>"><?php echo $row['description'] ?>
                            </option>
                            <?php
                            $sqlbrand = "SELECT id_brand as id_brand, description as description from brands order by description";
                            $result = $con->query($sqlbrand);
                            while ($rowBrand = $result->fetch_assoc()) {
                                if ($row['description'] != $rowBrand['description']) {
                                    ?>
                                    <option value="<?php echo $rowBrand['id_brands'] ?>"><?php echo $rowBrand['description'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>




                    <div class="form-group">
                        <label class="control-label">Color</label>
                        <select id="color" name="color" class="form-control">
                            <option value="<?php echo $row['id_colors'] ?>"><?php echo $row['color'] ?>
                            </option>
                            <?php
                            $sqlColors = "SELECT id_colors as id_colors, descripcion as descrition from colors order by descripcion";
                            $result = $con->query($sqlColors);
                            while ($rowColors = $result->fetch_assoc()) {
                                if ($row['color'] != $rowColors['descrition']) {

                                    ?>
                                    <option value="<?php echo $rowColors['id_colors'] ?>"><?php echo $rowColors['descrition'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                <div class="text-center">
                    <br>
                    <input type ="submit"class="btn btn-success"
                    value="Guardar Producto">
                        </div>
                
                </form>
                        </div>
                        </div>
                        </div>
</body>

</html>