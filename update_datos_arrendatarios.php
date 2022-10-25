<?php

    include("conexion.php");
    $con=conectar();

    $id=$_POST['id'];
    $mes_inicio_arriendo=$_POST['mes_inicio_arrinedo'];
    $mes_fin_arriendo=$_POST['mes_fin_arriendo'];
    $cuota_mensual=$_POST['saldo_a_pagar_mensual'];
    $meses_de_atraso=$_POST['meses_atraso'];

    #echo "este es el id que se recibe de actualizar arriendo.php: ".$id;
    $sql="SELECT *  FROM tabla_arrendamiento JOIN usuario ON tabla_arrendamiento.id=usuario.id_arriendo WHERE tabla_arrendamiento.id='$id'";
    $query=mysqli_query($con, $sql);

    if($query){
        echo "si se pudo hacer la consulta";
    }else{
        echo "no se pudo hacer la consulta";
    }


    #echo "esto es el sql: ".$sql;
    $row=mysqli_fetch_array($query);

    $correxion_mes_inicio=$row['mes_inicio_arrinedo'];
    $correxion_mes_fin=$row['mes_fin_arriendo'];
    $correxion_cuota_mensual=$row['saldo_a_pagar_mensual'];
    $correxion_meses_de_atraso=$row['meses_atraso'];

    if(empty($mes_inicio_arriendo)){
        $mes_inicio_arriendo=$correxion_mes_inicio;
    }

    if(empty($mes_fin_arriendo)){
        $mes_fin_arriendo=$correxion_mes_fin;
    }

    if(empty($cuota_mensual)){
        $cuota_mensual=$correxion_cuota_mensual;
    }

    if(empty($meses_de_atraso)){
        $meses_de_atraso=$correxion_meses_de_atraso;
    }

    $sql="UPDATE tabla_arrendamiento JOIN usuario ON usuario.id_arriendo = tabla_arrendamiento.id SET tabla_arrendamiento.mes_inicio_arrinedo = '$mes_inicio_arriendo', tabla_arrendamiento.mes_fin_arriendo='$mes_fin_arriendo',tabla_arrendamiento.saldo_a_pagar_mensual='$cuota_mensual',tabla_arrendamiento.meses_atraso='$meses_de_atraso' WHERE usuario.id_arriendo = '$id'";
    $query= mysqli_query($con, $sql);

        if($query){
            Header("Location: Datos_arrendatarios.php");
        }else{
            echo "NO SE PUDO ACTUALIZAR";

        }


    
?>