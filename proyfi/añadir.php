<?php
include "./conexion.php"; // Conexión a la base de datos
mysqli_set_charset($conexion, 'utf8');

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $nombre_usuario = trim($_POST['nombre_usuario']);
    $no_cuenta = trim($_POST['no_cuenta']);
    $carrera = trim($_POST['carrera']);
    $direccion = trim($_POST['direccion']);
    $telefono = trim($_POST['telefono']);
    $email = trim($_POST['email']);
    $contraseña = trim($_POST['contraseña']);

    // Validar que los datos no estén vacíos
    if (empty($nombre_usuario) || empty($no_cuenta) || empty($carrera) || empty($direccion) || empty($telefono) || empty($email) || empty($contraseña)) {
        die("Error: Todos los campos son obligatorios.");
    }

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conexion->prepare("INSERT INTO persona (nombre_usuario, no_cuenta, carrera, direccion, telefono, email, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nombre_usuario, $no_cuenta, $carrera, $direccion, $telefono, $email, $contraseña);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir al index.php después de un registro exitoso
        header("Location: index.php");
        exit();
    } else {
        echo "Error al registrar el usuario: " . $stmt->error;
    }

    // Cerrar la consulta y la conexión
    $stmt->close();
    $conexion->close();
} else {
    die("Método de solicitud no válido.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <style>
        /* Fondo con diseño moderno */
        body {
            background-color: #F3F4F6;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }

        /* Encabezado de la tabla */
        table thead {
            background-color: #1976D2; /* Azul vibrante */
            color: white;
        }

        /* Filas de la tabla */
        table tbody tr:nth-child(even) {
            background-color: #E3F2FD; /* Azul claro */
        }

        table tbody tr:nth-child(odd) {
            background-color: #BBDEFB; /* Azul más claro */
        }

        table tbody tr:hover {
            background-color: #64B5F6; /* Hover con azul fuerte */
            color: white;
        }

        /* Botones personalizados */
        .btn-custom {
            background-color: #43A047 !important; /* Verde vibrante */
            border-radius: 20px;
            padding: 10px 20px;
        }

        .btn-secondary {
            background-color: #EF5350 !important; /* Rojo brillante */
            border-radius: 20px;
            padding: 10px 20px;
        }

        /* Footer */
        footer {
            background-color: #1E88E5; /* Azul fuerte */
            color: white;
            padding: 15px 0;
            text-align: center;
        }

        /* Encabezado principal */
        h3 {
            margin-top: 30px;
            font-weight: bold;
            text-align: center;
            color: #1976D2; /* Azul vibrante */
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Lista de Usuarios</h3>
        <table class="highlight centered">
            <thead>
                <tr>
                    <th>Nombre de Usuario</th>
                    <th>Carrera</th>
                    <th>Cuenta</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th>Fecha de Registro</th>
                    <th>ID</th>
                    <th>Permisos</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($count > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($resultado)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['nombre_usuario']) ?></td>
                            <td><?= htmlspecialchars($row['carrera']) ?></td>
                            <td><?= htmlspecialchars($row['no_cuenta']) ?></td>
                            <td><?= htmlspecialchars($row['direccion']) ?></td>
                            <td><?= htmlspecialchars($row['telefono']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['contraseña']) ?></td>
                            <td><?= htmlspecialchars($row['fecha_registro']) ?></td>
                            <td><?= htmlspecialchars($row['id_registro']) ?></td>
                            <td><?= htmlspecialchars($row['permisos']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="10" class="center-align red-text">No hay registros disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Botones de Acción -->
        <h5 class="center-align teal-text">Usuario creado con éxito</h5>
        <div class="center button-group">
            <a href="./registro.php" class="btn waves-effect btn-custom">Generar Nuevo Registro</a>
            <a href="./index.php" class="btn waves-effect btn-secondary">Ver Registros</a>
        </div>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> - Gestión de Usuarios
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
