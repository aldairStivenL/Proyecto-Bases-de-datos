<!-- 
    parte escrita en php que trabaja con conexion que es un archivo php que esta en esta misma carpeta donde esta el proyecto
    ccon tiene la conexion con la base ded datos y se dirige a la tabla denominada usuario, y hace la solicitud, y en row almacena la consulta en array
-->
<?php
    include("conexion.php");
    $con=conectar();

    $sql="SELECT * FROM clinete";  
    $query=mysqli_query($con,$sql);
?>
<!--
    html que me coloca los elemntos en pantalla, ademas de usar clases que permite dar mas estilo a tablas y encabezados
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> CLIENTE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <!--esta parte lo que hace es dar mas estilos al aperte donde se hallan los dos elementos el de la izqioerda y derecha ue seria la tabla-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>

            <div class="container mt-5">
                <div class="row">

                     <div class="col-md-8">
                     <h1>Datos de arriendo</h1>
                    <!--esto es para hacer la tabla y presentarla estilizada-->
                        <table class="table">
                            <thead class="table-success table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre_1</th>
                                    <th>Apellido_1</th>
                                    <th>Mes inicio</th>
                                    <th>Mes fin</th>
                                    <th>Valor arriendo</th>
                                    <th>Meses de atraso</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <!--lo que hace es mostrar traer la informacion de la bd y en un array con un ciiclo while y colocarlos en la tabla de la derecha-->
                                    <?php
                                        while($row=mysqli_fetch_array($query)){
                                            echo("esto quiere decir que si hallo la consulta")
                                    ?>
                                        <tr>
                                            <th><?php  echo $row['id']?></th>
                                            <th><?php  echo $row['primer_nombre']?></th>
                                            <th><?php  echo $row['primer_apellido']?></th>
                                            <th><?php  echo $row['mes_inicio_arrinedo']?></th>
                                            <th><?php  echo $row['mes_fin_arriendo']?></th>
                                            <th><?php  echo $row['saldo_a_pagar_mensual	']?></th>
                                            <th><?php  echo $row['meses_atraso']?></th>
                                            <!--botones para editar o eliinar lo que es datos-->
                                            <th><a href="actualizar.php?id=<?php echo $row['id']?>"class="btn btn-info">Editar</a></th>
                                            <th><a href="delete.php?id=<?php echo $row['id']?>"class="btn btn-danger">Eliminar</a></th>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                            </tbody>            
                        </table>
                                   <div>
                                    <p></p>
                                        <a href="usuario.php" class="btn btn-primary">Volver</a>
                                    </div>     
                    </div>
                </div>
            </div>
    </body>
</html>