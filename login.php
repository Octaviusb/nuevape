<?php
session_start();
include_once 'includes/db_connect.php';
include_once 'includes/funciones.php';

// Manejar el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['login-email'];
    $password = $_POST['login-password'];
    $otp = isset($_POST['otp']) ? 1 : 0;

    // Consulta a la base de datos
    $sql = "SELECT id, nombre, correo, rol, contraseña, otp FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificar la contraseña usando password_verify
        if (password_verify($password, $user['contraseña'])) {
            // Verificar OTP si está habilitado
            if ($user['otp'] && !$otp) {
                echo 'OTP requerido';
                exit();
            }

            $_SESSION['user'] = $user;
            $_SESSION['role'] = $user['rol']; // Establecer el rol en la sesión

            // Redirigir según el rol del usuario
            if ($_SESSION['role'] == 'admin') {
                header('Location: administracion.php'); // Página de administrador
            } else {
                header('Location: index.php'); // Página de usuario normal
            }
            exit(); // Importante salir del script después de redirigir
        } else {
            $error = 'Correo electrónico o contraseña incorrectos';
        }
    } else {
        $error = 'Correo electrónico o contraseña incorrectos';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <header>
        <img src="img/logoPe.jpg" alt="logotipo" width="100" id="logo">
        <h1>Puntos Estilo</h1>
        <?php if (isset($_SESSION['user'])): ?>
        <div>
            <span>Usuario: <?php echo htmlspecialchars($_SESSION['user']['nombre']); ?></span>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
        <?php endif; ?>
    </header>
    <br><br>
    <section>
        <h2>Iniciar Sesión</h2>
        <br><br>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <label for="login-email">Correo electrónico:</label>
            <input type="email" id="login-email" name="login-email" required><br>
            
            <label for="login-password">Contraseña:</label>
            <input type="password" id="login-password" name="login-password" required><br>
            
            <label for="otp">
                <input type="checkbox" id="otp" name="otp"> OTP
            </label><br>
            
            <button type="submit">Iniciar sesión</button>
            
            <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
        </form>
    </section>
</body>
</html>
