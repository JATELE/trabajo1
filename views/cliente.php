<?php
require_once __DIR__ . '/../controller/ClienteController.php';

$controller = new ClienteController();
$mensaje = "";
$tipoMensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $accion = $_POST["accion"] ?? "";

    if ($accion === "registrar") {
        $respuesta = $controller->registrar($_POST);
    }

    if ($accion === "actualizar") {
        $respuesta = $controller->actualizar($_POST);
    }

    if ($accion === "eliminar") {
        $respuesta = $controller->eliminar((int) ($_POST["idCliente"] ?? 0));
    }

    $mensaje = $respuesta["mensaje"] ?? "";
    $tipoMensaje = !empty($respuesta["ok"]) ? "success" : "error";
}

$clientes = $controller->listar();

$clienteEditar = null;

if (isset($_GET["editar"])) {
    $clienteEditar = $controller->obtenerPorId((int) $_GET["editar"]);
}

function h($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes | Agenda Pro</title>

    <link rel="stylesheet" href="../assetes/css/cliente.css">
    <link rel="icon" href="../imagenes/icono.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;

        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            align-content: center;
            background-image: url("https://i.pinimg.com/originals/1f/fc/27/1ffc2732fd1f4a03802051f0f38cd7dd.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }

        /* NAV */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 80px;
            background: rgba(0, 0, 0, 0.6);
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
            background: rgba(0, 0, 0, 0.6);
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
            <a href="index.php">Inicio</a>
            <a href="cliente.php" class="active">Clientes</a>
            <a href="index.php#servicios">Servicios</a>
            <a href="logout.php">Salir</a>

        </nav>
    </header>

    <main class="clientes-wrapper">

        <?php if ($mensaje !== ""): ?>
            <div class="alerta <?= h($tipoMensaje) ?>">
                <?= h($mensaje) ?>
            </div>
        <?php endif; ?>

        <section class="clientes-hero">
            <div>
                <span class="badge-modulo">Módulo de clientes</span>
                <h1>Gestión de Clientes</h1>
                <p>Registra, actualiza y administra tus clientes de manera rápida.</p>
            </div>
        </section>

        <section class="clientes-grid">

            <div class="cliente-form-card">

                <div class="card-title">
                    <i class="fas fa-address-card"></i>
                    <div>
                        <h2><?= $clienteEditar ? "Editar Cliente" : "Registrar Cliente" ?></h2>
                        <p><?= $clienteEditar ? "Modifica los datos del cliente seleccionado." : "Completa los datos del nuevo cliente." ?>
                        </p>
                    </div>
                </div>

                <form method="POST" class="form-registro-cliente">

                    <input type="hidden" name="accion" value="<?= $clienteEditar ? "actualizar" : "registrar" ?>">

                    <?php if ($clienteEditar): ?>
                        <input type="hidden" name="idCliente" value="<?= h($clienteEditar["id_cliente"]) ?>">
                    <?php endif; ?>

                    <div class="input-group">
                        <label>Nombre *</label>
                        <input type="text" name="txtNombre" value="<?= h($clienteEditar["nombre"] ?? "") ?>"
                            placeholder="Ej: Juan" required>
                    </div>

                    <div class="input-group">
                        <label>Apellido *</label>
                        <input type="text" name="txtApellido" value="<?= h($clienteEditar["apellido"] ?? "") ?>"
                            placeholder="Ej: Pérez" required>
                    </div>

                    <div class="input-group">
                        <label>Correo *</label>
                        <input type="email" name="txtCorreo" value="<?= h($clienteEditar["correo"] ?? "") ?>"
                            placeholder="Ej: cliente@gmail.com" required>
                    </div>

                    <div class="input-group">
                        <label>DNI</label>
                        <input type="text" name="txtDni" value="<?= h($clienteEditar["dni"] ?? "") ?>"
                            placeholder="Ej: 12345678" maxlength="8">
                    </div>

                    <div class="input-group">
                        <label>Teléfono *</label>
                        <input type="text" name="txtTelefono" value="<?= h($clienteEditar["telefono"] ?? "") ?>"
                            placeholder="Ej: 999999999" required>
                    </div>

                    <div class="input-group">
                        <label>Dirección</label>
                        <input type="text" name="txtDireccion" value="<?= h($clienteEditar["direccion"] ?? "") ?>"
                            placeholder="Ej: Av. Principal 123">
                    </div>

                    <div class="input-group">
                        <label>Edad</label>
                        <input type="number" name="txtEdad" value="<?= h($clienteEditar["edad"] ?? "") ?>"
                            placeholder="Ej: 24" min="0" max="120">
                    </div>

                    <button type="submit" class="btn-guardar">
                        <i class="fas fa-save"></i>
                        <?= $clienteEditar ? "Actualizar Cliente" : "Guardar Cliente" ?>
                    </button>

                    <?php if ($clienteEditar): ?>
                        <a href="cliente.php" class="btn-cancelar">
                            <i class="fas fa-times"></i>
                            Cancelar
                        </a>
                    <?php endif; ?>

                </form>
            </div>

            <div class="clientes-table-card">

                <div class="table-header">
                    <div>
                        <h2>Clientes registrados</h2>
                        <p>Total: <?= count($clientes) ?> cliente(s)</p>
                    </div>

                    <div class="table-search">
                        <i class="fas fa-search"></i>
                        <input type="text" id="buscarCliente" placeholder="Buscar cliente...">
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="tablaClientes">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>DNI</th>
                                <th>Edad</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (count($clientes) > 0): ?>
                                <?php foreach ($clientes as $cliente): ?>
                                    <tr>
                                        <td>#<?= h($cliente["id_cliente"]) ?></td>

                                        <td>
                                            <strong>
                                                <?= h($cliente["nombre"]) . " " . h($cliente["apellido"]) ?>
                                            </strong>
                                        </td>

                                        <td><?= h($cliente["dni"] ?? "Sin DNI") ?></td>
                                        <td><?= h($cliente["edad"] ?? "-") ?></td>
                                        <td><?= h($cliente["telefono"]) ?></td>
                                        <td><?= h($cliente["correo"]) ?></td>
                                        <td><?= h($cliente["direccion"] ?? "Sin dirección") ?></td>

                                        <td class="acciones">
                                            <a href="cliente.php?editar=<?= h($cliente["id_cliente"]) ?>" class="btn-edit">
                                                <i class="fas fa-pen"></i>
                                                Editar
                                            </a>

                                            <form method="POST"
                                                onsubmit="return confirm('¿Seguro que deseas eliminar este cliente?');">
                                                <input type="hidden" name="accion" value="eliminar">
                                                <input type="hidden" name="idCliente" value="<?= h($cliente["id_cliente"]) ?>">

                                                <button type="submit" class="btn-delete">
                                                    <i class="fas fa-trash"></i>
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="sin-datos">
                                        No hay clientes registrados.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </section>

    </main>

    <!-- FOOTER -->
    <footer>
        © 2026 Ferretería Central - Todos los derechos reservados
    </footer>

    <script>
        const menuToggle = document.getElementById("menuToggle");
        const navbarLinks = document.getElementById("navbarLinks");

        menuToggle.addEventListener("click", () => {
            navbarLinks.classList.toggle("active");
        });

        const buscarCliente = document.getElementById("buscarCliente");
        const filasClientes = document.querySelectorAll("#tablaClientes tbody tr");

        buscarCliente.addEventListener("keyup", () => {
            const texto = buscarCliente.value.toLowerCase();

            filasClientes.forEach(fila => {
                const contenido = fila.textContent.toLowerCase();
                fila.style.display = contenido.includes(texto) ? "" : "none";
            });
        });
    </script>

</body>

</html>