<?php
// Configuración
$numPasswords = 10;
$passwordLength = 12;

// Conjunto de caracteres permitidos (sin o/O, l/L, 0, 1, ñ, Ñ)
$characters = 'abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789';

// Función para generar una contraseña segura
function generatePassword($length, $characters) {
    $password = '';
    $maxIndex = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[random_int(0, $maxIndex)];
    }
    return $password;
}

// Generar listado de contraseñas
$passwords = [];
for ($i = 0; $i < $numPasswords; $i++) {
    $passwords[] = generatePassword($passwordLength, $characters);
}

// Información del sistema
$phpVersion = phpversion();
$aiName = "Microsoft Copilot";
$aiVersion = "v1.0";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de Contraseñas Seguras</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/css/bootstrap.min.css">
	<?php
	// el que debe ser es 
	// <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            padding-top: 70px;
            padding-bottom: 70px;
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación fija -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
            <i class="fas fa-shield-alt"></i> <?php echo $aiName; ?>
        </a>
        <div class="ml-auto text-white">
            Versión IA: <?php echo $aiVersion; ?> | PHP: <?php echo $phpVersion; ?>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="mb-4"><i class="fas fa-key"></i> Listado de Contraseñas Seguras</h1>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($passwords as $index => $pwd): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><code><?php echo htmlspecialchars($pwd); ?></code></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="alert alert-info mt-4">
            <i class="fas fa-info-circle"></i>
            <strong>Nota de seguridad:</strong> Estas contraseñas pueden mejorarse agregando manualmente caracteres como <code>;</code>, <code>@</code>, <code>.</code> o <code>:</code>. 
            Se recomienda evitar el símbolo <code>$</code> y la coma <code>,</code> por incompatibilidad con algunos proveedores o lenguajes.
        </div>
    </div>

    <!-- Pie de página fijo -->
    <footer class="bg-dark text-white text-center py-3">
        <small>&copy; <?php echo date("Y"); ?> <?php echo $aiName; ?> - Generador de Contraseñas Seguras</small>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
