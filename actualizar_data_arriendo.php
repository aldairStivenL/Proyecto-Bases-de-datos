<?php

    include("conexion.php");
    $con=conectar();

    $id=$_GET['id'];  #obtiene el id que es lo que recibe el boton de donde doy clic osea la info de el lugar donde doy click
    #echo "este es el id que recibo de la pagina de usuario.php: ".$id;

    $sql="SELECT  tabla_arrendamiento.* FROM tabla_arrendamiento join usuario on usuario.id_arriendo=tabla_arrendamiento.id WHERE usuario.id='$id'";
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
                    <form action="update_datos_arrendatarios.php" method="POST">
                    
                                <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                                
                                <input type="text" class="form-control mb-3" name="mes_inicio_arrinedo" placeholder="mes inicio" value="<?php echo $row['mes_inicio_arrinedo']  ?>">
                                <input type="text" class="form-control mb-3" name="mes_fin_arriendo" placeholder="mes fin" value="<?php echo $row['mes_fin_arriendo']  ?>">
                                <input type="text" class="form-control mb-3" name="saldo_a_pagar_mensual" placeholder="cuota mensual" value="<?php echo $row['saldo_a_pagar_mensual']  ?>">
                                <input type="text" class="form-control mb-3" name="meses_atraso" placeholder="cantidad meses atrasado" value="<?php echo $row['meses_atraso']  ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
                


    </body> 

</html>
        