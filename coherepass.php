<?php
declare(strict_types=1);

// Configuración inicial
$num_passwords = 10;
$password_length = 12;
$allowed_chars = 'abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789';

// Función para generar una contraseña segura
function generatePassword(int $length, string $allowed_chars): string {
    $password = '';
    $max = strlen($allowed_chars) - 1;
    for ($i = 0; $i < $length; $i++) {
        $password .= $allowed_chars[random_int(0, $max)];
    }
    return $password;
}

// Generar contraseñas
$passwords = [];
for ($i = 0; $i < $num_passwords; $i++) {
    $passwords[] = generatePassword($password_length, $allowed_chars);
}

?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Contraseñas Seguras</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">	
    <?php
	// el que debe ser es 
	// <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            padding-top: 56px; /* Para la barra de navegación fija */
            padding-bottom: 60px; /* Para el pie de página fijo */
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
        }
        .password-list {
            margin-top: 20px;
        }
        .password-item {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            word-break: break-all;
        }
    </style>
</head>
<body>

<!-- Barra de navegación fija -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">IA - Generador de Contraseñas</a>
    <span class="navbar-text ml-auto">
        Versión: 1.0 | PHP <?php echo phpversion(); ?>
    </span>
</nav>

<!-- Contenido principal -->
<div class="container">
    <h1 class="mt-5">Contraseñas Seguras Generadas</h1>
    <div class="password-list">
        <?php foreach ($passwords as $password): ?>
            <div class="password-item">
                <strong><i class="fas fa-key mr-2"></i><?php echo htmlspecialchars($password); ?></strong>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Nota de seguridad -->
    <div class="alert alert-info mt-4" role="alert">
        <h4 class="alert-heading">Nota de Seguridad</h4>
        <p>Puedes mejorar las contraseñas agregando manualmente caracteres especiales como <code>;</code>, <code>@</code>, <code>.</code> o <code>:</code>. Sin embargo, evita el uso de <code>$</code> y <code>,</code> debido a incompatibilidades con algunos proveedores o lenguajes.</p>
    </div>
</div>

<!-- Pie de página fijo -->
<footer class="footer">
    <div class="container">
        <span class="text-muted">© <?php echo date('Y'); ?> IA - Todos los derechos reservados.</span>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>