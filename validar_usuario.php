<?php

$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : '';
$contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : '';

// En caso que no envien usuario y contraseña

if (strlen($usuario) == 0 || strlen($contrasena) == 0) {
    echo "No ingresó usuario o contraseña";
    return;
}

// Validar en la base de datos.

$mysqli = new mysqli("localhost", "root", "", "adsi");
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
    <title><?php echo $loginCorrecto ? 'Bienvenida' : 'Error' ?></title>
</head>

<body>
    <?php if ($loginCorrecto) : ?>
        <h1>Bienvenido: <?php echo $usuario ?></h1>
        <p>Gracias por confiar en nosotros</p>
    <?php else : ?>
        <strong>La autenticación NO fue exitosa</strong>
    <?php endif; ?>
</body>

</html>