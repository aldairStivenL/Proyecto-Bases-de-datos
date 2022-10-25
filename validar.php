<?php

    $usuario=$_POST['Usuarios'];
    $contraseña=$_POST['Identificacion'];
    session_start();
    $_SESSION['Usuarios']=$usuario;

    include("conexion.php");
    $conexion=conectar();
    $consulta="SELECT * FROM usuario WHERE nombre1='$usuario' and id='$contraseña'";
    $resultado=mysqli_query($conexion,$consulta);
    $filas=mysqli_fetch_array($resultado);

    if($filas){
        if($filas['id_cargo']==1){
            header("location:usuario.php");
        }
        if($filas['id_cargo']==2){
            header("location:cliente.php?id=$contraseña");
        } 
    }
    
    
    else{
        ?>
        <?php
        include("inicioSesion.php");
        ?>
        <p align="center" class="bad">ERROR EN LA AUTENTICACION</p>
        <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>