<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
</head>
<body>
    <div>
        <table align="center">
            <form action="validar.php" method="POST">
                <h1 align="center">Inicio de sesion</h1>
                
                <p align="center">Nombre Usuario <input type="text" placeholder="Ingrese su Primer nombre" name="Usuarios"></p>
                <p align="center">Identificacion <input type="password" placeholder="Ingrese su identificacion" name="Identificacion"></p>
                <tr><td> <input type ="submit" value="Ingresar"> <input type="button" name="volver" value="Volver" onclick="window.location.href='index.php'"></tr></td>
            </form>
        </table>
    </div>
    <body>
    <div class="footer">
        <p >Recuerda que para poder ingresar debes tener una cuenta existente, ya sea como cliente o como administrador.</p>
        <p >Si quieres ser un administrador comunícate a nuestro WhatsApp para brindarte mayor información..</p>
        <p >Para entrar como cliente deberás primero estar registrado en algún hotel el administrador te brindarán clave y usuario.</p>
    
    </div>
    </body>
    <div>
    <a href="https://api.whatsapp.com/send?phone=3147536250" class="btn-wsp" target="_blank">
	    <i class="fa fa-whatsapp icono"></i>
	</a>
    </div>


</body>
</html>