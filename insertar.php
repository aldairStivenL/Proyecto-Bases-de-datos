<?php
/*include("conexion.php");
$con=conectar();*/
//esto es lo añadido---------------------------------------
$errores["identificacion"] = "";
$errores["primer_nombre"] = "";
$errores["segundo_nombre"] = "";
$errores["primer_apellido"] = "";
$errores["segundo_apellido"] = "";
$errores["correo_electronico"] = "";

$errores["mes_de_inicio_arriendo"]="";
$errores["mes_de_fin_arriendo"]="";
$errores["saldo_a_pagar_mensual"]="";
$errores["meses_atrasados"]="";

$error = false;

//restricciones para que no se inserten valores vacios 

if (isset($_POST['submit'])) 
{
    $identificacion=$_POST['id'];
    $primernombre=$_POST['nombre1'];
    $segundonombre=$_POST['nombre2'];
    $primerapellido=$_POST['apellido1'];
    $segundoapellido=$_POST['apellido2'];
    $correoelectronico=$_POST['correo'];

    $mes_inicio_arriendo=$_POST['mes_inicio_arrinedo'];
    $mes_fin_arriendo=$_POST['mes_fin_arriendo'];
    $saldo_mensual=$_POST['saldo_a_pagar_mensual'];
    $meses_de_atraso=$_POST['meses_atraso'];

    $cargo=1;

    if(empty($identificacion))
    {
        $errores["identificacion"]= " ID No Valido. ";
        $error=True;
    }else
        $errores["identificacion"]="";

    if(empty($primernombre))
    {
        $errores["primer_nombre"]= " Primer nombre No Valido. ";
        $error=True;
    }else
        $errores["primer_nombre"]="";
    
   /* if(empty($segundonombre))
    {
        $errores["segundo_nombre"]= " Segundo nombre No Valido. ";
        $error=True;
    }else
        $errores["segundo_nombre"]="";*/

    if(empty($primerapellido))
    {
        $errores["primer_apellido"]= " Primer apellido No Valido. ";
        $error=True;
    }else
        $errores["primer_apellido"]="";

    /*if(empty($segundoapellido))
    {
        $errores["segundo_apellido"]= " Segundo apellido No Valido. ";
        $error=True;
    }else
        $errores["segundo_apellido"]="";*/

    if(empty($correoelectronico))
    {
        $errores["correo_electronico"]= " Correo electronico No Valido. ";
        $error=True;
    }else
        $errores["correo_electronico"]="";


    if(empty($mes_inicio_arriendo))
    {
        $errores["mes_de_inicio_arriendo"]= " Mes de inicio de arriendo No Valido. ";
        $error=True;
    }else
        $errores["mes_de_inicio_arriendo"]="";

    if(empty($mes_fin_arriendo))
    {
        $errores["mes_de_fin_arriendo"]= " Mes de fin de arriendo No Valido. ";
        $error=True;
    }else
        $errores["mes_de_fin_arriendo"]="";

    if(empty($saldo_mensual))
    {
        $errores["saldo_a_pagar_mensual"]= " Saldo a pagar mensual No Valido. ";
        $error=True;
    }else
        $errores["saldo_a_pagar_mensual"]="";

   /* if(empty($meses_de_atraso))
    {
        $errores["meses_atrasados"]= " Meses atrasados No Valido. ";
        $error=True;
    }else
        $errores["meses_atrasados"]="";*/
        

       // echo "ya hice todas las revisiones de que no hayan espacios en blabco";
}else{

    echo "no hay ningun submit de nada";
}

//hasta aqui-----------------------------------------------


if( $error == false)
{
    include("conexion.php");
    $con=conectar(); 
    #$id_arriendo=$row['id'];
    #echo $identificacion_arriendo['id'];
    #$sql="INSERT INTO usuario (id,nombre1,nombre2,apellido1,apellido2,correo,id_cargo) VALUES ('$identificacion','$primernombre','$segundonombre','$primerapellido','$segundoapellido','$correoelectronico',2)";
    $sql="INSERT INTO tabla_arrendamiento (mes_inicio_arrinedo,mes_fin_arriendo,saldo_a_pagar_mensual,meses_atraso) VALUES ('$mes_inicio_arriendo','$mes_fin_arriendo','$saldo_mensual','$meses_de_atraso')";
    $query=mysqli_query($con,$sql);
    #$row=mysqli_fetch_array($query)
    #$id_arriendo=$row['id_arriendo'];
 
    $id_arriendo="SELECT * FROM tabla_arrendamiento WHERE id=(SELECT max(id) FROM tabla_arrendamiento)"; 
    
    $identificacion_arriendo=mysqli_query($con,$id_arriendo);
    while($row=mysqli_fetch_array($identificacion_arriendo)){
        #echo $row['id'];
        $jumID=$row['id'];
    }
    
                                    


    if($query){
        echo "se inserto correctamente la primera tabla";
       # $sql="INSERT INTO tabla_arrendamiento (mes_inicio_arrinedo,mes_fin_arriendo,saldo_a_pagar_mensual,meses_atraso) VALUES ('$mes_inicio_arriendo','$mes_fin_arriendo','$saldo_mensual','$meses_de_atraso')";
       
       $sql="INSERT INTO usuario (id,nombre1,nombre2,apellido1,apellido2,correo,id_cargo,id_arriendo) VALUES ('$identificacion','$primernombre','$segundonombre','$primerapellido','$segundoapellido','$correoelectronico',2,'$jumID')";
       $query= mysqli_query($con, $sql);

        if($query){
            echo "se inserto correctamente la segunda tabla";
        }else{
            echo "no se inserto correctamente la segunda tabla";
        }
        Header("Location: usuario.php");
    }else{
            echo "no se inserto en ni en la primera tabla";
    }
}else{
    echo ("<P><center><b>No se pudo insertar informacion 
                        porfavor recuerde ingresar valores.</P></center><b> 
                        <P><center><b>(Recuerde que solo podra omitir el segundo nombre y segundo apellido)</b><br><A HREF=usuario.php>Volver</A></center></P>");
}
?>