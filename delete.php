<?php

    include("conexion.php");
    $con=conectar();

    $identificacion=$_GET['id']; 
    $sql="DELETE tabla_arrendamiento.* from tabla_arrendamiento join usuario on usuario.id_arriendo=tabla_arrendamiento.id WHERE usuario.id='$identificacion'";
    $query=mysqli_query($con,$sql);

        if($query){
            Header("Location: usuario.php");
        }else{
            echo "no se pudo eliminar";
        }
?>
