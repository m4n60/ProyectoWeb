<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F3E5F5; /* Fondo lavanda claro */
        }

        .table-header {
            background-color: #6A1B9A; /* Púrpura oscuro */
            color: white;
        }

        .highlighted-row:hover {
            background-color: #FFD740; /* Amarillo brillante para hover */
        }

        .btn-custom {
            background-color: #AB47BC !important; /* Púrpura suave */
        }

        .btn-custom:hover {
            background-color: #7B1FA2 !important; /* Púrpura más oscuro */
        }

        footer {
            text-align: center;
            padding: 15px 0;
            background-color: #4A148C; /* Púrpura oscuro */
            color: white;
        }

        h3 {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    include "conexion.php";

    $consulta_sql = "SELECT * FROM persona";
    $resultado = $conexion->query($consulta_sql);

    $count = mysqli_num_rows($resultado);

    echo "<h3 class='center-align purple-text text-darken-4'>Gestión de Usuarios</h3>";
    echo "<table class='striped centered responsive-table'>
        <thead class='table-header'>
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
        <tbody>";
    
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr class='highlighted-row'>";
                echo "<td>" . htmlspecialchars($row['nombre_usuario']) . "</td>";
                echo "<td>" . htmlspecialchars($row['carrera']) . "</td>";
                echo "<td>" . htmlspecialchars($row['no_cuenta']) . "</td>";
                echo "<td>" . htmlspecialchars($row['direccion']) . "</td>";
                echo "<td>" . htmlspecialchars($row['telefono']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['contraseña']) . "</td>";
                echo "<td>" . htmlspecialchars($row['fecha_registro']) . "</td>";
                echo "<td>" . htmlspecialchars($row['id_registro']) . "</td>";
                echo "<td>" . htmlspecialchars($row['permisos']) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10' class='center-align red-text'>No hay registros disponibles</td></tr>";
    }
    echo "</tbody></table>";
    ?>

    <div class="center">
        <a href="registro.php" class="btn waves-effect btn-custom">Nuevo Registro</a>
        <a href="eliminarp.php" class="btn waves-effect yellow darken-2">Eliminar Registro</a>
    </div>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> - Sistema de Gestión de Usuarios
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
