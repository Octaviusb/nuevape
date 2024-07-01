<?php
session_start();
include_once 'includes/db_connect.php';
include_once 'includes/funciones.php';

// Verificar si el usuario ya está logueado
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Obtener datos del usuario
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <img src="img/logoPe.jpg" alt="logotipo" width="100" id="logo">
        <h1>Puntos Estilo</h1>
        <div>
            <span>Usuario: <?php echo htmlspecialchars($user['nombre']); ?></span>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    </header>
    
    <section id="dashboard">
        <h2>Dashboard</h2>
        <div class="summary">
            <div class="summary-item">
                <a href="administracion.php">
                    <p>Panel de Administración</p>
                </a>
            </div>
        <div class="summary-item">
                <a href="perfil.php">
                    <p>Perfil Usuarios</p>
                    
                </a>
            </div>            
        <div class="summary-item">
                <a href="tienda.php">
                    <p>Tienda</p>
                    
                </a>
            </div>
        <div class="summary-item">
                <a href="contacto.php">
                    <p>Contactenos</p>
                    
                </a>
            </div>
        </div>
    </section>

    <footer>
        <h2>Información de Contacto</h2>
        <ul>
            <li>Dirección: Calle Falsa 123</li>
            <li>Teléfono: 555-555-555</li>
            <li>Email: contacto@example.com</li>
        </ul>
    </footer>
</body>
</html>

