<?php

include("conexion.php");
$con=conectar();

$identificacion=$_POST['id'];
$primernombre=$_POST['nombre1'];
$segundonombre=$_POST['nombre2'];
$primerapellido=$_POST['apellido1'];
$segundoapellido=$_POST['apellido2'];
$correoelectronico=$_POST['correo'];

$sql="UPDATE usuario SET nombre1='$primernombre',nombre2='$segundonombre',apellido1='$primerapellido',apellido2='$segundoapellido',correo='$correoelectronico' WHERE id='$identificacion'";
$query= mysqli_query($con, $sql);

    if($query){
        Header("Location: usuario.php");
    }else{

    }
?>