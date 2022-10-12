<?php

    $usuario=$_POST['Usuarios'];
    $contraseña=$_POST['Identificacion'];
    session_start();
    $_SESSION['Usuarios']=$usuario;

    include("conexion.php");
    $conexion=conectar();
    #$conexion=mysqli_connect("localhost", "root", "", "arriendo");
    $consulta="SELECT * FROM usuario WHERE nombre1='$usuario' and id='$contraseña'";
    $resultado=mysqli_query($conexion,$consulta);

    #s$filas=mysqli_num_rows($resultado);
   # $row=mysqli_fetch_array($query);
    
    $filas=mysqli_fetch_array($resultado);

    if($filas){
       # echo"la consulta se hizo corectamente";
        #header("location:home.php");
        if($filas['id_cargo']==1){
            header("location:usuario.php");
        }
        if($filas['id_cargo']==2){
            header("location:cliente.php");
        } 
    }
    
    
    else{
        ?>
        <?php
        include("inicioSesion.php");
        ?>
       <!-- <h1 class="bad">ERROR EN LA AUTENTICACION</h1>-->
        <p align="center" class="bad">ERROR EN LA AUTENTICACION</p>
        <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>