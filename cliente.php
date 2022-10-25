<?php
    
    include("conexion.php");
    $con=conectar();
    $identificacion = $_GET['id'];
    $sql="SELECT * FROM tabla_arrendamiento JOIN usuario ON usuario.id_arriendo=tabla_arrendamiento.id WHERE usuario.id='$identificacion'";
    $query=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Clientes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <!--esta parte lo que hace es dar mas estilos al aperte donde se hallan los dos elementos el de la izqioerda y derecha ue seria la tabla-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>

            <div class="container mt-5">
                <div class="row">

                     <div class="col-md-5">
                        <h1>Informacion acerca de tu arriendo</h1>
                        <!--esto es para hacer la tabla y presentarla estilizada-->
                        <table class="table">
                            <thead class="table-success table-striped">
                                <tr>
                                    <th>id</th>
                                    <th>Nombre1</th>
                                    <th>Mes_inicio_contrato</th>
                                    <th>Mes_fin_contrato</th>
                                    <th>Cuota_mensual</th>
                                    <th>Cant_meses_atrasados</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <!--lo que hace es mostrar traer la informacion de la bd y en un array con un ciiclo while y colocarlos en la tabla de la derecha-->
                                    <?php
                                        while($row=mysqli_fetch_array($query)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['nombre1'] ?></td>
                                            <th><?php  echo $row['mes_inicio_arrinedo']?></th>
                                            <th><?php  echo $row['mes_fin_arriendo']?></th>
                                            <th><?php  echo $row['saldo_a_pagar_mensual']?></th>
                                            <th><?php  echo $row['meses_atraso']?></th>
                                        
                                        </tr>
                                    <?php
                                        }
                                    ?>
                            </tbody>            
                        </table>
                                    <div> 
                                    <input type="button" value="Volver" onclick="window.location.href='inicioSesion.php'">
                                    </div>
                    </div>
                </div>
            </div>
    </body>
</html>