<?php
include_once 'includes/db_connect.php';
include_once 'includes/funciones.php';

// Asegurarse de que el usuario esté autenticado y tenga una sesión válida
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$employee_id = $_SESSION['user']['id'] ?? null;
if ($employee_id === null) {
    header('Location: index.php');
    exit;
}

try {
    $total_puntos = getEmployeePoints($employee_id);
    $expiring_points = getExpiringPoints($employee_id);
    $benefits = getBenefits();
    $help_message = getHelp();
    $redemption_methods = getRedemptionMethods();
} catch (Exception $e) {
    error_log($e->getMessage());
    echo "Error al obtener los datos. Por favor, inténtalo de nuevo más tarde.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/perfil.css">
</head>
<body>
    <header>
        <img src="img/logoPe.jpg" alt="logotipo" width="100" id="logo">
        <h1>Puntos Estilo</h1>
        <div>
            <?php if (isset($_SESSION['user']) && $_SESSION['user'] !== null): ?>
                <span>Usuario: <?php echo htmlspecialchars($_SESSION['user']['nombre']); ?></span>
                <a href="logout.php">Cerrar Sesión</a>
            <?php else: ?>
                <span>Usuario no identificado</span>
            <?php endif; ?>
        </div>
        <div>
            <button onclick="window.location.href='index.php'">Inicio</button>
            <button onclick="window.location.href='tienda.php'">Tienda</button>
            <button onclick="window.location.href='contacto.php'">Contáctenos</button>
        </div>
    </header>

    <div class="container">
        <h1>Acumulación de Puntos</h1>
        <p>Total de puntos acumulados: <?php echo htmlspecialchars($total_puntos); ?></p>

        <h1>Puntos por Vencer</h1>
        <?php if (empty($expiring_points)): ?>
            <p>No tienes puntos próximos a vencer.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($expiring_points as $expiring): ?>
                    <li><?php echo htmlspecialchars($expiring['puntos']); ?> puntos - Vence el <?php echo htmlspecialchars($expiring['fecha_vencimiento']); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <h1>Obtener Ayuda</h1>
        <p><?php echo htmlspecialchars($help_message); ?></p>

        <h1>Formas de Canjear Puntos</h1>
        <ul>
            <?php foreach ($redemption_methods as $method): ?>
                <li><?php echo htmlspecialchars($method); ?></li>
            <?php endforeach; ?>
        </ul>

        <h1>Catálogo de Beneficios</h1>
        <ul>
            <?php foreach ($benefits as $benefit): ?>
                <li><?php echo htmlspecialchars($benefit['nombre']); ?> - <?php echo htmlspecialchars($benefit['descripcion']); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <script src="js/main.js"></script>
</body>
</html>
