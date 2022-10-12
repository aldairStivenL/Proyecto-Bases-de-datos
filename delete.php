<?php

include("conexion.php");
$con=conectar();

$identificacion=$_GET['id'];  # y este id es el que tiene la pagina por defecto osea donde se de click la pagina lo llama id
# WHERE id este ide es ql que yo puse en la tabla usuarios osea el que yo llame id
$sql="DELETE FROM usuario WHERE id='$identificacion'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: usuario.php");
    }
?>
