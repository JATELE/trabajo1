<?php

session_start();

$error = $_SESSION['error_login'] ?? '';

unset($_SESSION['error_login']);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow">
    <meta name="author" content="Ferretería Central">
    <meta name="description" content="Sistema de acceso ferretería">
    <meta name="keywords" content="ferretería, herramientas, inventario, login">

    <link rel="icon" href="imagenes/icono.ico">
    <link rel="stylesheet" href="../assetes/css/cliente.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Ferretería Central - Login</title>
</head>

<body>

    <div class="login-container">

        <div class="login-card">
            <h1>
                User Login
            </h1>
            <?php if (!empty($error)): ?>

                <div class="error">
                    <?= $error ?>
                </div>

            <?php endif; ?>

            <form method="POST" action="../controller/UsuarioController.php?accion=login">

                <div class="input-group">


                    <label>
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        Correo
                    </label>

                    <input type="email" name="correo" placeholder="Ingrese correo" required>

                </div>

                <div class="input-group">

                    <label>
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                        Contraseña
                    </label>

                    <input type="password" name="clave" placeholder="Ingrese contraseña" required>

                </div>
                <div class="options">
                    <label>
                        <input type="checkbox" name = "remember">
                        <samp>Remenber</samp>
                    </label>
                    <a href="#">Forgot password</a>

                </div>
                
                <button type="submit">
                    Ingresar
                </button>
                <div class="create-account">
                    <a href="#">Create Account</a>

                </div>

            </form>

        </div>

    </div>

</body>

</html>