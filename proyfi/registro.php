<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Nuevo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #E3F2FD, #BBDEFB);
            font-family: 'Roboto', sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1 0 auto;
            padding: 30px 10px;
        }
        .card {
            background-color: #FFFFFF;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
        }
        h5 {
            color: #1E88E5;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }
        .btn-custom {
            background-color: #1E88E5 !important;
            border-radius: 25px;
        }
        footer {
            background-color: #1E88E5;
            color: white;
            text-align: center;
            padding: 15px 0;
        }
    </style>
</head>
<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col s12 m8 l6 offset-m2 offset-l3">
                    <div class="card">
                        <h5>Registro Nuevo</h5>
                        <form action="./añadir.php" method="post">
                            <div class="input-field">
                                <input id="nombre_usuario" type="text" name="nombre_usuario" required maxlength="50">
                                <label for="nombre_usuario">Nombre</label>
                            </div>
                            <div class="input-field">
                                <input id="no_cuenta" type="text" name="no_cuenta" required maxlength="10">
                                <label for="no_cuenta">Número de Cuenta</label>
                            </div>
                            <div class="input-field">
                                <input id="carrera" type="text" name="carrera" required maxlength="50">
                                <label for="carrera">Carrera</label>
                            </div>
                            <div class="input-field">
                                <input id="direccion" type="text" name="direccion" required maxlength="100">
                                <label for="direccion">Dirección</label>
                            </div>
                            <div class="input-field">
                                <input id="telefono" type="text" name="telefono" required maxlength="10">
                                <label for="telefono">Teléfono</label>
                            </div>
                            <div class="input-field">
                                <input id="email" type="email" name="email" required maxlength="100">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input id="contraseña" type="password" name="contraseña" required maxlength="50">
                                <label for="contraseña">Contraseña</label>
                            </div>
                            <div class="center">
                                <button type="submit" name="submit" class="btn waves-effect btn-custom">Registrar</button>
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
</body>
</html>
