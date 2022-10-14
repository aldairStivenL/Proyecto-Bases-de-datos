<?php

include("conexion.php");
$con=conectar();

$id=$_POST['id'];
$mes_inicio_arriendo=$_POST['mes_inicio_arrinedo'];
$mes_fin_arriendo=$_POST['mes_fin_arriendo'];
$cuota_mensual=$_POST['saldo_a_pagar_mensual'];
$meses_de_atraso=$_POST['meses_atraso'];

#echo $id;


#$sql="DELETE tabla_arrendamiento.* from tabla_arrendamiento join usuario on usuario.id_arriendo=tabla_arrendamiento.id WHERE usuario.id='$identificacion'";


#$sql="SELECT  tabla_arrendamiento.* FROM tabla_arrendamiento join usuario on usuario.id_arriendo=tabla_arrendamiento.id WHERE usuario.id='$id'";

#$sql="UPDATE tabla_arrendamiento SET mes_inicio_arrinedo='$mes_inicio_arriendo',mes_fin_arriendo='$mes_fin_arriendo',saldo_a_pagar_mensual='$cuota_mensual',meses_atraso='$meses_de_atraso' join usuario on usuario.id_arriendo=tabla_arrendamiento.id WHERE usuario.id='$id'";
#$sql="SELECT * FROM tabla_arrendamiento";
#$sql="UPDATE tabla_arrendamiento SET  mes_inicio_arrinedo='$mes_inicio_arriendo',mes_fin_arriendo='$mes_fin_arriendo',saldo_a_pagar_mensual='$cuota_mensual',meses_atraso='$meses_de_atraso' from tabla_arrendamiento inner join usuario on usuario.id_arriendo = tabla_arrendamiento.id where usuario.id='$id'";

#$sql="UPDATE clientes cl JOIN contratos co ON co.id_contratos = cl.id_cliente JOIN planes_mb pl ON co.plan_id = pl.id_plan_mb SET cl.nombre = 'AquiAlgunNombre' WHERE co.id_contratos = XXX";
$sql="UPDATE tabla_arrendamiento JOIN usuario ON usuario.id_arriendo = tabla_arrendamiento.id SET tabla_arrendamiento.mes_inicio_arrinedo = '$mes_inicio_arriendo', tabla_arrendamiento.mes_fin_arriendo='$mes_fin_arriendo',tabla_arrendamiento.saldo_a_pagar_mensual='$cuota_mensual',tabla_arrendamiento.meses_atraso='$meses_de_atraso' WHERE usuario.id_arriendo = '$id'";
$query= mysqli_query($con, $sql);

    if($query){
        Header("Location: Datos_arrendatarios.php");
    }else{
        echo "NO SE PUDO ACTUALIZAR";

    }


    
?>