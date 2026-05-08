<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow">
    <meta name="author" content="RV TECH">
    <meta name="description" content="software versionador básico">
    <meta name="keywords" content="básico,basico,git,versionador">
    
    <link rel="icon" href="imagenes/icono.ico">
    <link rel="stylesheet" href="assetes/css/style.css">
    <title>Proyecto Básico</title>
</head>
<body>
<div class="background-overlay"></div>

<main class="container">
    <div class="caja">
        <form action="" method="POST" autocomplete="on">
            
            <img src="imagenes/logo.png" alt="Logo de la empresa" class="logo">

            <h1>Recuperar contraseña</h1>
            <p class="descripcion">
                Ingresa tu correo electrónico para recuperar tu contraseña.
            </p>

            <div class="input-group">
                <label for="email">Correo electrónico</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Ej: jatele@example.com"
                    autocomplete="username"
                    required
                >
                <button type="submit">Recuperar contraseña</button>
            </div>
             <div class="extra-options">
                <a href="login.html" class="forgot-pw">loguearse</a>
            </div>
        </form>
    </div>
</main>



</body>
</html>