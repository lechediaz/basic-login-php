<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <form method="POST" action="validar_usuario.php">
        <h2>Ingreso al sistema</h2>
        <input name="usuario" placeholder="Usuario" required type="tex" />
        <input name="contrasena" placeholder="Contraseña" required type="password" />
        <input type="submit" value="Ingresar">
    </form>
</body>

</html>