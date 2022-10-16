<?php

include("conexion.php");
$con=conectar();

$id=$_GET['id'];  #obtiene el id que es lo que recibe el boton de donde doy clic osea la info de el lugar donde doy click

$sql="SELECT * FROM usuario WHERE id ='$id'";
$query=mysqli_query($con, $sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
                 <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                            <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                                
                                <input type="text" class="form-control mb-3" name="nombre1" placeholder="Nombre1" value="<?php echo $row['nombre1']  ?>">
                                <input type="text" class="form-control mb-3" name="nombre2" placeholder="Nombre2" value="<?php echo $row['nombre2']  ?>">
                                <input type="text" class="form-control mb-3" name="apellido1" placeholder="Apellido1" value="<?php echo $row['apellido1']  ?>">
                                <input type="text" class="form-control mb-3" name="apellido2" placeholder="Apellido2" value="<?php echo $row['apellido2']  ?>">
                                <input type="text" class="form-control mb-3" name="correo" placeholder="Correo" value="<?php echo $row['correo']  ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
                


    </body> 

</html>
        