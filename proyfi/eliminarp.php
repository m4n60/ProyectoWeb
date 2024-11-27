<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Registro</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #FFCCBC, #FFAB91);
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
            padding: 25px;
            border-radius: 15px;
            background-color: #FFFFFF;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        h5 {
            color: #E53935;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn-custom {
            background-color: #E53935 !important;
            border-radius: 25px;
            padding: 10px 20px;
            font-weight: bold;
        }

        .btn-custom:hover {
            background-color: #D32F2F !important;
        }

        footer {
            background-color: #BF360C;
            color: white;
            text-align: center;
            padding: 15px 0;
        }

        .link-back {
            color: #E53935;
            font-weight: bold;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
        }

        .link-back:hover {
            text-decoration: underline;
        }

        input[type="text"] {
            border-bottom: 2px solid #E53935 !important;
        }

        input[type="text"]:focus {
            border-bottom: 2px solid #BF360C !important;
            box-shadow: none;
        }

        label {
            color: #BF360C !important;
        }

        label.active {
            color: #E53935 !important;
        }
    </style>
</head>
<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col s12 m8 l6 offset-m2 offset-l3">
                    <div class="card">
                        <h5>Eliminar Registro</h5>
                        <p class="center-align">Ingresa el número de cuenta para eliminar el registro.</p>

                        <form method="POST" action="eliminarr.php" class="col s12">
                            <div class="input-field">
                                <input id="no_cuenta" type="text" name="no_cuenta" required maxlength="10" aria-label="Número de cuenta">
                                <label for="no_cuenta">Número de Cuenta</label>
                            </div>

                            <div class="center">
                                <button class="btn waves-effect btn-custom" type="submit">Eliminar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="center">
                <a href="index.php" class="link-back">Volver al Inicio</a>
            </div>
        </div>
    </main>

    <footer>
        &copy; <script>document.write(new Date().getFullYear());</script> - Gestión de Registros
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
