<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Puntos Estilo</title>
    <link href="css/tienda.css" rel="stylesheet" type="text/css">
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

<div class="slider">
    <ul>
        <li><img src="img/slide1.avif" alt="imagen supermercado"></li>
        <li><img src="img/slide2.jpeg" alt="imagen supermercado"></li>
        <li><img src="img/slide3.jpg" alt="imagen supermercado"></li>
    </ul>
</div>

<div class="container-index">
    <div class="container-circulos">
        <div class="container-imagen">
            <img src="assets/img/Abarrotes-comestibles.jpg" class="circulo">
            <h2>Mercado</h2>
        </div>
        <div class="container-imagen">
            <img src="assets/img/ropa.webp" class="circulo">
            <h2>Ropa y Enseres</h2>
        </div>
        <div class="container-imagen">
            <img src="assets/img/boletas.jpg" class="circulo">
            <h2>Boletas</h2>
        </div>
        <div class="container-imagen">
            <img src="assets/img/safaris.jpg" class="circulo">
            <h2>Recreación</h2>
        </div>
        <div class="container-imagen">
            <img src="assets/img/viajes.jpg" class="circulo">
            <h2>Viajes</h2>
        </div>
        <div class="container-imagen">
            <img src="assets/img/compu.jpg" class="circulo">
            <h2>Electrodomésticos</h2>
        </div>
    </div>

    <div class="ver-todo"><a class="button" href="productos.html">Ver todos</a></div>

    <div class="contenedor-columna">
        <div class="columna1">
            <h2>SOBRE TIENDA PUNTOS ESTILO</h2>
            <p>En TIENDA PUNTOS ESTILO nuestro equipo trabaja constantemente con energía y entusiasmo para nuestros clientes y sus familias. Nos encanta lo que hacemos y eso se refleja no solo en nuestros servicios, sino también en la forma en que construimos relaciones con nuestros clientes.</p>
        </div>
        <div class="columna2">
            <img src="assets/img/index.png">
        </div>
    </div>
</div>

<footer class="footer-section">
    <div class="copyright-area">
        <div class="container-footer">
            <div class="row-footer">
                <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2020, todos los derechos reservados <a href="index.html">TIENDA PUNTOS ESTILO</a></p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="../index.html">Inicio</a></li>
                            <li><a href="productos.html">Productos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>
