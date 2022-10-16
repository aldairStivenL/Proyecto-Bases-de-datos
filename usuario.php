<!-- 
    parte escrita en php que trabaja con conexion que es un archivo php que esta en esta misma carpeta donde esta el proyecto
    ccon tiene la conexion con la base ded datos y se dirige a la tabla denominada usuario, y hace la solicitud, y en row almacena la consulta en array
-->
<?php
    include("conexion.php");
    $con=conectar();

    #$sql="SELECT * FROM usuario";   #`usuario`
    $sql="SELECT * FROM tabla_arrendamiento JOIN usuario ON usuario.id_arriendo=tabla_arrendamiento.id ORDER BY tabla_arrendamiento.id ";
    $query=mysqli_query($con,$sql);

    #$row=mysqli_fetch_array($query);

    ?>
<!--
    html que me coloca los elemntos en pantalla, ademas de usar clases que permite dar mas estilo a tablas y encabezados
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> ADMIN</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <!--esta parte lo que hace es dadr mas estilos al aperte donde se hallan los dos elementos el de la izqioerda y derecha ue seria la tabla-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>

            <div class="container mt-5">
                <div class="row">

                    <div class="col-md-3">
                        <h1>Ingrese Datos</h1>
                        <!--esta parte lo que hace es llevar a la pagina insertar el class, el primer name es tal cual como se halla la columna de la base de datos 
                        usuario.
                        el segundo name coloca como una marca de agua mientras el campo esta vacio para indicar que debe collocarse-->
                        <form action="insertar.php" method="POST">
                            <input type="text" class="form-control mb-3" name="id" placeholder="identificacion usuario">
                            <input type="text" class="form-control mb-3" name="nombre1" placeholder="primer nombre">
                            <input type="text" class="form-control mb-3" name="nombre2" placeholder="segundo nombre">
                            <input type="text" class="form-control mb-3" name="apellido1" placeholder="primer apellido">
                            <input type="text" class="form-control mb-3" name="apellido2" placeholder="segundo apellido">
                            <input type="text" class="form-control mb-3" name="correo" placeholder="correo electronico">


                            <input type="text" class="form-control mb-3" name="mes_inicio_arrinedo" placeholder="mes inicio arriendo en letras">
                            <input type="text" class="form-control mb-3" name="mes_fin_arriendo" placeholder="mes fin de arriendo en letras">
                            <input type="text" class="form-control mb-3" name="saldo_a_pagar_mensual" placeholder="cuota mensual a pagar">
                            <input type="text" class="form-control mb-3" name="meses_atraso" placeholder="cantidad de meses de atraso">

                            <!--<input type="submit" class="btn btn-primary">-->
                            <input type="submit" class="btn btn-primary" name="submit" value="Insertar">
                            <input type="button" name="volver" value="Volver" onclick="window.location.href='inicioSesion.php'">
                        </form>
                     </div>

                     <div class="col-md-8">
                        <h1>Datos basicos</h1>
                        <!--esto es para hacer la tabla y presentarla estilizada-->
                        <table class="table">
                            <thead class="table-success table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre_1</th>
                                    <th>Nombre_2</th>
                                    <th>Apellido_1</th>
                                    <th>Apellido_2</th>
                                    <th>E-mail</th>
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
                                            <th><?php  echo $row['id']?></th>
                                            <th><?php  echo $row['nombre1']?></th>
                                            <th><?php  echo $row['nombre2']?></th>
                                            <th><?php  echo $row['apellido1']?></th>
                                            <th><?php  echo $row['apellido2']?></th>
                                            <th><?php  echo $row['correo']?></th>
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
                                    <input type="button" value="Ver mas informacion" onclick="window.location.href='Datos_arrendatarios.php'">
                                    </div>
                    </div>
                </div>
            </div>
    </body>
</html>