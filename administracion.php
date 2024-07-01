<?php
session_start();
include_once './includes/db_connect.php';
include_once './includes/funciones.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['user'])) {
    header("Location: ./login.php");
    exit();
}

// Verificar si el usuario tiene permisos de administrador
if ($_SESSION['user']['rol'] !== 'admin') {
    header("Location: ./index.php");
    exit();
}

// Código de depuración para verificar el contenido de la sesión
//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <header>
        <img src="./img/logoPe.jpg" alt="logotipo" width="100" id="logo">
        <h1>Puntos Estilo</h1>
        <div>
            <?php if (isset($_SESSION['user']) && $_SESSION['user'] !== null): ?>
                <span>Usuario: <?php echo htmlspecialchars($_SESSION['user']['nombre']); ?></span>
                <a href="/logout.php">Cerrar Sesión</a>
            <?php else: ?>
                <span>Usuario no identificado</span>
            <?php endif; ?>
        </div>
    </header>
    
    <section id="administracion">
        <h2>Administración</h2>
        <div class="admin-links">
            <div class="admin-item">
                <a href="pages/cargar_puntos.php">
                    <p>Cargar Puntos</p>
                </a>
            </div>
            <div class="admin-item">
                <a href="pages/descontar_puntos.php">
                    <p>Descontar Puntos</p>
                </a>
            </div>
            <div class="admin-item">
                <a href="pages/gestion.php">
                    <p>Gestionar Catálogo</p>
                </a>
            </div>
            <div class="admin-item">
                <a href="pages/entrega.php">
                    <p>Entrega o distribución</p>
                </a>
            </div>
            <div class="admin-item">
                <a href="pages/impacto.php">
                    <p>Medir Impacto</p>
                </a>
            </div>
            <div class="admin-item">
                <a href="pages/reportes.php">
                    <p>Reportes</p>
                </a>
            </div>
            <div class="admin-item">
                <a href="pages/solicitudes.php">
                    <p>Solicitudes y Autorizaciones</p>
                </a>
            </div>
            <div class="admin-item">
                <a href="perfil.php">
                    <p>Perfil</p>
                </a>
            </div>
        </div>
    </section>
</body>
</html>
