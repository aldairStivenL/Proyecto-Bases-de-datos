<?php

    include("conexion.php");
    $con=conectar();

    $identificacion=$_POST['id'];
    $primernombre=$_POST['nombre1'];
    $segundonombre=$_POST['nombre2'];
    $primerapellido=$_POST['apellido1'];
    $segundoapellido=$_POST['apellido2'];
    $correoelectronico=$_POST['correo'];

    $sql="SELECT * FROM usuario WHERE id ='$identificacion'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);

    $correxion_nombre=$row['nombre1'];
    $correxion_nombre2=$row['nombre2'];
    $correxion_apellido=$row['apellido1'];
    $correxion_apellido2=$row['apellido2'];
    $correxion_correo=$row['correo'];

    if(empty($primernombre)){
        $primernombre=$correxion_nombre;
    }
    if(empty($segundonombre)){
        $segundonombre=$correxion_nombre2;
    }
    if(empty($primerapellido)){
        $primerapellido=$correxion_apellido;
    }
    if(empty($segundoapellido)){
        $segundoapellido=$correxion_apellido2;
    }
    if(empty($correoelectronico)){
        $correoelectronico=$correxion_correo;
    }

    $sql="UPDATE usuario SET nombre1='$primernombre',nombre2='$segundonombre',apellido1='$primerapellido',apellido2='$segundoapellido',correo='$correoelectronico' WHERE id='$identificacion'";
    $query= mysqli_query($con, $sql);

        if($query){
            Header("Location: usuario.php");
        }else{

        }
?>