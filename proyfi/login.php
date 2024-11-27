<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #81D4FA, #0288D1);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }

        main {
            flex: 1 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            padding: 30px;
            border-radius: 15px;
            background-color: #ffffff;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        h5 {
            color: #0277BD;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn-custom {
            background-color: #0288D1 !important;
            border-radius: 25px;
            padding: 10px 20px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0277BD !important;
        }

        footer {
            background-color: #01579B;
            color: white;
            text-align: center;
            padding: 15px 0;
        }

        .error-message {
            background-color: #FFCDD2;
            color: #D32F2F;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            border-bottom: 2px solid #0288D1 !important;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-bottom: 2px solid #0277BD !important;
            box-shadow: none;
        }

        label {
            color: #01579B !important;
        }

        label.active {
            color: #0288D1 !important;
        }
    </style>
</head>
<body>
    <main>
        <?php
        require 'conexion.php';
        session_start();

        // Verificar si se han enviado los datos del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $no_cuenta = isset($_POST['no_cuenta']) ? trim($_POST['no_cuenta']) : null;
            $password = isset($_POST['password']) ? trim($_POST['password']) : null;

            if ($no_cuenta && $password) {
                // Preparar y ejecutar consulta para verificar credenciales
                $stmt = $conexion->prepare("SELECT COUNT(*) as contar FROM persona WHERE no_cuenta = ? AND contraseña = ?");
                $stmt->bind_param("ss", $no_cuenta, $password);
                $stmt->execute();
                $result = $stmt->get_result();
                $array = $result->fetch_assoc();

                if ($array['contar'] > 0) {
                    // Iniciar sesión y redirigir al index
                    $_SESSION['no_cuenta'] = $no_cuenta;
                    header("Location: index.php");
                    exit();
                } else {
                    $error_message = "Número de cuenta o contraseña incorrectos. Intenta de nuevo.";
                }

                $stmt->close();
            } else {
                $error_message = "Por favor, completa todos los campos.";
            }
        }

        $conexion->close();
        ?>

        <div class="container">
            <div class="row">
                <div class="col s12 m8 l6 offset-m2 offset-l3">
                    <div class="card z-depth-3">
                        <h5>Inicio de Sesión</h5>

                        <?php if (isset($error_message)): ?>
                            <div class="error-message">
                                <?= htmlspecialchars($error_message); ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="" class="col s12">
                            <div class="input-field">
                                <input id="no_cuenta" type="text" name="no_cuenta" required maxlength="10" aria-label="Número de cuenta">
                                <label for="no_cuenta">Número de Cuenta</label>
                            </div>
                            
                            <div class="input-field">
                                <input id="password" type="password" name="password" required maxlength="50" aria-label="Contraseña">
                                <label for="password">Contraseña</label>
                            </div>

                            <div class="center">
                                <button class="btn waves-effect btn-custom" type="submit">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        &copy; <script>document.write(new Date().getFullYear());</script> - Gestión de Registros
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
