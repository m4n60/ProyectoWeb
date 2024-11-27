<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1 style="text-align: center;">Login</h1>
    <!-- Formulario que envía los datos al archivo login.php -->
    <form style="text-align: center;" method="POST" action="login.php">
        <!-- Campo para el nombre del usuario -->
        <input type="text" name="numero_de_cuenta" placeholder="Número de cuenta" required />
        <br />
        <!-- Campo para la contraseña -->
        <input type="password" name="password" placeholder="Password" required />
        <br />
        <!-- Botón para enviar el formulario -->
        <button type="submit">Login</button>
    </form>
</body>
</html>