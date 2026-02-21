<?php
// =============================================
// Generador de Contraseñas Seguras - Versión 1.0
// Single file - PHP 7.4 / 8.x
// =============================================

$version = '1.0';

function generarPassword(): string
{
    // Caracteres permitidos (sin o, O, l, L, 0, 1, ñ, Ñ)
    $letras = 'abcdefghijkmnpqrstuvwxyz';
    $password = '';

    for ($i = 0; $i < 12; $i++) {
        $char = $letras[random_int(0, 23)];
        // 50% probabilidad de mayúscula
        if (random_int(0, 1) === 1) {
            $char = strtoupper($char);
        }
        $password .= $char;
    }
    return $password;
}

// Generamos las 10 contraseñas
$passwords = [];
for ($i = 0; $i < 10; $i++) {
    $passwords[] = generarPassword();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Generador de Contraseñas Seguras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        body { padding-top: 90px; padding-bottom: 80px; background-color: #f8f9fa; }
        .password-text {
            font-family: 'SF Mono', Menlo, Monaco, Consolas, 'Courier New', monospace;
            font-size: 1.25rem;
            letter-spacing: 2px;
        }
        .copy-btn { min-width: 100px; }
    </style>
</head>
<body>

    <!-- Navbar fija -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-shield-alt"></i> Generador de Contraseñas Seguras
            </a>
            <span class="navbar-text">
                IA v<?= $version ?> | PHP <?= phpversion() ?>
            </span>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">

                <div class="text-center mb-5">
                    <h1 class="display-5 text-dark">Generador Corporativo</h1>
                    <p class="lead text-muted">10 contraseñas de 12 caracteres • Sin caracteres visualmente confusos</p>
                    <form method="post">
                        <button type="submit" class="btn btn-primary btn-lg px-5">
                            <i class="fas fa-sync-alt"></i> Generar Nuevas Contraseñas
                        </button>
                    </form>
                </div>

                <div class="card shadow">
                    <div class="card-header bg-light">
                        <i class="fas fa-key"></i> Contraseñas Generadas
                    </div>
                    <div class="list-group list-group-flush">
                        <?php foreach ($passwords as $pass): ?>
                        <div class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span class="password-text text-primary font-weight-bold"><?= htmlspecialchars($pass) ?></span>
                            <button class="btn btn-outline-success btn-sm copy-btn" data-pass="<?= htmlspecialchars($pass) ?>">
                                <i class="fas fa-copy"></i> Copiar
                            </button>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Nota de seguridad -->
                <div class="alert alert-info mt-4">
                    <h5><i class="fas fa-info-circle"></i> Recomendación de Seguridad</h5>
                    <p class="mb-2">Puedes reforzar aún más estas contraseñas agregando manualmente cualquiera de los siguientes caracteres:</p>
                    <code>;</code> <code>@</code> <code>.</code> <code>:</code>
                    <p class="mt-3 mb-0">
                        <strong>Evitar:</strong> 
                        <code>$</code> (dólar) y <code>,</code> (coma) por incompatibilidades frecuentes con algunos proveedores de hosting, CMS y lenguajes.
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer fijo -->
    <footer class="fixed-bottom bg-dark text-light py-3 text-center">
        <small>Generador profesional • Todo en un solo archivo • Compatible PHP 7.4 y 8.x</small>
    </footer>

    <script>
        document.querySelectorAll('.copy-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                navigator.clipboard.writeText(this.dataset.pass);

                const icon = this.querySelector('i');
                const originalClass = icon.className;
                icon.className = 'fas fa-check';

                this.classList.remove('btn-outline-success');
                this.classList.add('btn-success');

                setTimeout(() => {
                    icon.className = originalClass;
                    this.classList.remove('btn-success');
                    this.classList.add('btn-outline-success');
                }, 1700);
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>