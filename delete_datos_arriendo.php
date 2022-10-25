<?php

    include("conexion.php");
    $con=conectar();

    $identificacion=$_GET['id'];
    # el sql de abajo es el que elimina el registro de el usuario en ambas tablas de una sola vez
    $sql="DELETE tabla_arrendamiento.* from tabla_arrendamiento join usuario on usuario.id_arriendo=tabla_arrendamiento.id WHERE usuario.id='$identificacion'";
    $query=mysqli_query($con,$sql);

        if($query){
            Header("Location: Datos_arrendatarios.php");
        }else{
            echo "no se pudo eliminar";
        }
?>