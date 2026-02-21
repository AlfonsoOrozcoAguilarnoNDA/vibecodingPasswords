<?php
// Generador de contraseñas seguras para entornos corporativos
// Versión: 1.0
// Compatible con PHP 7.x y 8.x
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Contraseñas Seguras</title>
    <!-- Bootstrap 4.6.x -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            padding-top: 56px;
            padding-bottom: 56px;
        }
        .password-box {
            font-family: monospace;
            font-size: 1.1em;
            padding: 10px;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            cursor: pointer;
        }
        footer {
            background-color: #343a40;
            color: #adb5bd;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación fija -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-robot"></i> Le Chat IA
            </a>
            <ul class="navbar-nav ml-auto">
                <li class="navbar-text">
                    Versión: 1.0
                </li>
                <li class="navbar-text ml-2">
                    PHP: <?= phpversion() ?>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="my-4 text-center">Generador de Contraseñas Seguras</h1>
                <p class="text-muted text-center mb-4">
                    Genera contraseñas seguras para uso corporativo, evitando caracteres confusos.
                </p>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Contraseñas generadas (10 de 12 caracteres)</h5>
                        <div class="list-group">
                            <?php
                            // Función para generar contraseñas seguras
                            function generarContrasena($longitud = 12) {
                                $caracteresPermitidos = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789';
                                $contrasena = '';
                                $longitudCaracteres = strlen($caracteresPermitidos);
                                for ($i = 0; $i < $longitud; $i++) {
                                    $contrasena .= $caracteresPermitidos[random_int(0, $longitudCaracteres - 1)];
                                }
                                return $contrasena;
                            }

                            // Generar 10 contraseñas
                            for ($i = 0; $i < 10; $i++) {
                                $contrasena = generarContrasena();
                                echo '<div class="list-group-item password-box" onclick="copiarAlPortapapeles(this)">' . $contrasena . '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="alert alert-info mt-4">
                    <h5><i class="fas fa-info-circle"></i> Nota de seguridad</h5>
                    <p>
                        Puedes mejorar la seguridad de tus contraseñas agregando manualmente caracteres como <code>;</code>, <code>@</code>, <code>.</code> o <code>:</code>.
                        Se recomienda evitar el símbolo <code>$</code> y la coma <code>,</code> por posibles incompatibilidades con algunos proveedores o lenguajes.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de página fijo -->
    <footer class="footer fixed-bottom py-3">
        <div class="container text-center">
            <span class="text-muted">Generador de contraseñas seguras &copy; <?= date('Y') ?></span>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function copiarAlPortapapeles(elemento) {
            navigator.clipboard.writeText(elemento.textContent).then(function() {
                elemento.classList.add('bg-success', 'text-white');
                setTimeout(function() {
                    elemento.classList.remove('bg-success', 'text-white');
                }, 1000);
            });
        }
    </script>
</body>
</html>
