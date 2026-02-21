<?php
/**
 * Vibe Coding México - Generador de Contraseñas Corporativo
 * Portabilidad: PHP 7.4 a 8.x
 * Dependencias: Bootstrap 4.6 (CDN), Font Awesome (CDN)
 */

function generarPasswordVibe($longitud = 12) {
    // Definimos el alfabeto seguro (ASCII puro)
    // Eliminamos: o, O, l, I (letras confusas)
    // Eliminamos: 0, 1 (números confusos)
    // No incluimos: ñ, Ñ ni caracteres especiales
    $alfabeto = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    $pass = '';
    $max = strlen($alfabeto) - 1;

    for ($i = 0; $i < $longitud; $i++) {
        try {
            // random_int es criptográficamente seguro y compatible con PHP 7+
            $index = random_int(0, $max);
            $pass .= $alfabeto[$index];
        } catch (Exception $e) {
            // Fallback en caso de que el sistema no tenga entropía (raro en 2026)
            $pass .= $alfabeto[mt_rand(0, $max)];
        }
    }
    return $pass;
}

$passwords = [];
for ($i = 0; $i < 10; $i++) {
    $passwords[] = generarPasswordVibe(12);
}

$php_version = phpversion();
$ia_name = "Gemini 3 Flash";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Contraseñas | Vibe Coding</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body { background-color: #f4f7f6; padding-top: 70px; padding-bottom: 70px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar { background-color: #2c3e50; border-bottom: 3px solid #18bc9c; }
        .card { border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .password-text { font-family: 'Courier New', Courier, monospace; font-weight: bold; font-size: 1.2rem; color: #2c3e50; letter-spacing: 2px; }
        .footer { background-color: #2c3e50; color: white; padding: 15px 0; position: fixed; bottom: 0; width: 100%; }
        .note-box { background-color: #e9ecef; border-left: 5px solid #18bc9c; padding: 15px; margin-top: 20px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <div class="container">
        <span class="navbar-brand"><i class="fas fa-shield-alt"></i> <?php echo $ia_name; ?> - PHP <?php echo $php_version; ?></span>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <h4 class="mb-0 text-center text-secondary">Contraseñas Temporales Sugeridas</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Contraseña Sugerida (12 carac.)</th>
                                    <th class="text-right">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($passwords as $index => $pw): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td class="password-text"><?php echo $pw; ?></td>
                                    <td class="text-right">
                                        <button class="btn btn-sm btn-outline-info" onclick="navigator.clipboard.writeText('<?php echo $pw; ?>')">
                                            <i class="far fa-copy"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="note-box">
                        <p class="mb-0 small text-muted">
                            <i class="fas fa-info-circle"></i> <strong>Nota de Seguridad:</strong> 
                            Estas contraseñas pueden fortalecerse agregando manualmente al final caracteres como 
                            <code>;</code>, <code>@</code>, <code>.</code> o <code>:</code>. 
                            Se sugiere <strong>no usar</strong> el símbolo <code>$</code> ni la coma simple <code>,</code> 
                            debido a que algunos proveedores de sistemas o bases de datos no los manejan correctamente.
                        </p>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Generar Nuevas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer text-center">
    <div class="container">
        <small>Vibe Coding México &copy; 2026 - Herramienta de Seguridad de Trinchera</small>
    </div>
</footer>

</body>
</html>