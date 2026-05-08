<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ferretería Central</title>
  

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: #111827;
      color: white;
    }

    /* NAV */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 80px;
      background: rgba(0,0,0,0.6);
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 10;
      backdrop-filter: blur(10px);
    }

    header h1 {
      color: #f59e0b;
      font-size: 22px;
    }

    nav a {
      color: white;
      margin-left: 20px;
      text-decoration: none;
      font-weight: 500;
    }

    nav a:hover {
      color: #f59e0b;
    }

    /* HERO */
    .hero {
      height: 100vh;
      background: url("https://images.unsplash.com/photo-1586864387967-d02ef85d93e8") center/cover no-repeat;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      position: relative;
    }

    .hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.6);
    }

    .hero-content {
      position: relative;
      z-index: 1;
      max-width: 700px;
    }

    .hero h2 {
      font-size: 48px;
      margin-bottom: 10px;
    }

    .hero p {
      opacity: 0.9;
      margin-bottom: 20px;
    }

    .btn {
      padding: 12px 25px;
      background: #f59e0b;
      border: none;
      color: black;
      font-weight: bold;
      border-radius: 8px;
      cursor: pointer;
      text-decoration: none;
    }

    /* SERVICIOS */
    .services {
      padding: 80px;
      text-align: center;
      background: #1f2937;
    }

    .services h2 {
      margin-bottom: 40px;
      font-size: 32px;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .card {
      background: #111827;
      padding: 30px;
      border-radius: 12px;
      border: 1px solid #374151;
    }

    .card h3 {
      color: #f59e0b;
      margin-bottom: 10px;
    }

    /* FOOTER */
    footer {
      text-align: center;
      padding: 30px;
      background: black;
      font-size: 14px;
    }

    @media (max-width: 768px) {
      header {
        padding: 15px 20px;
      }

      .hero h2 {
        font-size: 32px;
      }

      .services {
        padding: 40px;
      }
    }

  </style>
</head>

<body>

<header>
  <h1>🔧 Ferretería Central</h1>
  <nav>
    <a href="#inicio">Inicio</a>
    <a href="cliente.php" class="active">Clientes</a>
    <a href="#servicios">Servicios</a>
    <a href="logout.php">Salir</a>
  </nav>
</header>

<!-- HERO -->
<section class="hero" id="inicio">
  <div class="hero-content">
    <h2>Todo para tu construcción</h2>
    <p>Herramientas, materiales y soluciones profesionales para tu proyecto.</p>
    <a href="#servicios" class="btn">Ver Productos</a>
  </div>
</section>

<!-- SERVICIOS -->
<section class="services" id="servicios">
  <h2>Nuestros Servicios</h2>

  <div class="grid">

    <div class="card">
      <h3>🔩 Herramientas</h3>
      <p>Taladros, llaves, martillos y más.</p>
    </div>

    <div class="card">
      <h3>🏗️ Materiales</h3>
      <p>Cemento, arena, varillas y construcción.</p>
    </div>

    <div class="card">
      <h3>🚚 Envíos</h3>
      <p>Entrega rápida a domicilio o obra.</p>
    </div>

  </div>
</section>

<!-- CONTACTO -->
<section class="services" id="contacto">
  <h2>Contacto</h2>
  <p>📍 Calle Principal 123 - Tel: 555-123-456</p>
</section>

<!-- FOOTER -->
<footer>
  © 2026 Ferretería Central - Todos los derechos reservados
</footer>

</body>
</html>