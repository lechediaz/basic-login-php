<?php

$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : '';
$contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : '';

// En caso que no envien usuario y contraseña

if (strlen($usuario) == 0 || strlen($contrasena) == 0) {
    echo "No ingresó usuario o contraseña";
    return;
}

// Validar en la base de datos.

$host_bd = "localhost";
$usuario_bd = "root";
$contrasena_bd = "";

$mysqli = new mysqli($host_bd, $usuario_bd, $contrasena_bd, "adsi");
$consulta  = "select count(1) cantidad from usuarios where usuario = '" . $usuario . "' and clave = '" . $contrasena . "'";
$loginCorrecto = false;

if ($resultado = $mysqli->query($consulta)) {
    if ($fila = $resultado->fetch_assoc()) {
        $loginCorrecto = $fila["cantidad"] > 0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title><?php echo $loginCorrecto ? 'Bienvenida' : 'Error' ?></title>
</head>

<body>
    <div class="bloque-basico">
        <?php if ($loginCorrecto) : ?>
            <h1>¡Hola <span class="nombre-usuario"><?php echo $usuario ?></span>!</h1>
            <p>Gracias por confiar en nosotros</p>
        <?php else : ?>
            <p class="mensaje">
                <em>La autenticación NO fue exitosa.</em>
                <a href="index.php">Click aquí para volver</a>
            </p>
        <?php endif; ?>
    </div>
</body>

</html>