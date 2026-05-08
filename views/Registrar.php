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

            <h1>Registrar</h1>
            <p class="descripcion">
                Regístrate para acceder a nuestras soluciones innovadoras.
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
            </div>

            <div class="input-group">
                <label for="username">Nombre de usuario</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    placeholder="Ej: jatele"
                    autocomplete="username"
                    required
                >
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="••••••••"
                    autocomplete="current-password"
                    required
                >
            </div>
            <div class="extra-options">
                <label>
                    <input type="checkbox" id="togglePassword">
                    Mostrar contraseña
                </label>

                <label>
                    <input type="checkbox">
                    Recordarme
                </label>
            </div>
            <button type="submit">Registrar</button>
            <p class="register">
                ¿Ya tienes cuenta? <a href="login.html">Inicia sesión</a>
            </p>
        </form>
    </div>
</main>
</body>
</html>