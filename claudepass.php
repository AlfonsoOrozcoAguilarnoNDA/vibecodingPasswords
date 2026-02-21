<?php
/**
 * Sistema de Generación de Contraseñas Seguras
 * Compatible con PHP 7.x y 8.x
 * Versión: 1.0
 */

// Configuración
$cantidadPasswords = 10;
$longitudPassword = 12;

// Función para generar contraseñas seguras
function generarPassword($longitud) {
    // Definir conjuntos de caracteres (sin o, O, l, L, 0, 1, ñ, Ñ)
    $mayusculas = 'ABCDEFGHIJKMNPQRSTUVWXYZ'; // Sin O, L, Ñ
    $minusculas = 'abcdefghijkmnpqrstuvwxyz'; // Sin o, l, ñ
    $numeros = '23456789'; // Sin 0, 1
    
    // Combinar todos los caracteres disponibles
    $todosCaracteres = $mayusculas . $minusculas . $numeros;
    $longitudConjunto = strlen($todosCaracteres);
    
    $password = '';
    
    // Generar contraseña aleatoria
    for ($i = 0; $i < $longitud; $i++) {
        $indiceAleatorio = random_int(0, $longitudConjunto - 1);
        $password .= $todosCaracteres[$indiceAleatorio];
    }
    
    return $password;
}

// Generar las contraseñas
$passwords = array();
for ($i = 0; $i < $cantidadPasswords; $i++) {
    $passwords[] = generarPassword($longitudPassword);
}

// Obtener versión de PHP
$versionPHP = phpversion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Contraseñas Seguras</title>
    
    <!-- Bootstrap 4.6.2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <!-- Font Awesome 5.15.4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        body {
            padding-top: 70px;
            padding-bottom: 70px;
            background-color: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
        
        .navbar {
            background-color: #2c3e50;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            color: #ffffff !important;
            font-weight: 600;
        }
        
        .navbar-text {
            color: #ecf0f1 !important;
            font-size: 0.9rem;
        }
        
        .main-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.08);
            padding: 30px;
            margin-bottom: 20px;
        }
        
        .page-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 1.75rem;
        }
        
        .page-subtitle {
            color: #7f8c8d;
            margin-bottom: 30px;
            font-size: 0.95rem;
        }
        
        .password-item {
            background-color: #f8f9fa;
            border-left: 4px solid #3498db;
            padding: 15px 20px;
            margin-bottom: 12px;
            border-radius: 4px;
            transition: all 0.2s;
            font-family: 'Courier New', Courier, monospace;
            font-size: 1.1rem;
            color: #2c3e50;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .password-item:hover {
            background-color: #e9ecef;
            border-left-color: #2980b9;
        }
        
        .password-text {
            font-weight: 600;
            letter-spacing: 1px;
        }
        
        .copy-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.2s;
        }
        
        .copy-btn:hover {
            background-color: #2980b9;
        }
        
        .copy-btn:active {
            transform: scale(0.95);
        }
        
        .security-note {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 20px;
            border-radius: 4px;
            margin-top: 30px;
        }
        
        .security-note h5 {
            color: #856404;
            font-weight: 600;
            margin-bottom: 12px;
            font-size: 1.1rem;
        }
        
        .security-note p {
            color: #856404;
            margin-bottom: 8px;
            line-height: 1.6;
        }
        
        .security-note .recommendation {
            background-color: #ffffff;
            padding: 12px;
            border-radius: 4px;
            margin-top: 10px;
        }
        
        .badge-custom {
            background-color: #3498db;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 15px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 4px rgba(0,0,0,0.1);
        }
        
        footer p {
            margin: 0;
            font-size: 0.9rem;
        }
        
        .stats-box {
            background-color: #ecf0f1;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .stats-box .stat-label {
            color: #7f8c8d;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .stats-box .stat-value {
            color: #2c3e50;
            font-size: 1.5rem;
            font-weight: 700;
            margin-top: 5px;
        }
        
        .copy-notification {
            position: fixed;
            top: 80px;
            right: 20px;
            background-color: #27ae60;
            color: white;
            padding: 12px 20px;
            border-radius: 4px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
            display: none;
            z-index: 9999;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación fija -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-lock"></i> Generador de Contraseñas
            </a>
            <span class="navbar-text ml-auto">
                <i class="fas fa-robot"></i> Claude Sonnet 4.5 | 
                <i class="fab fa-php"></i> PHP <?php echo $versionPHP; ?>
            </span>
        </div>
    </nav>

    <!-- Notificación de copiado -->
    <div class="copy-notification" id="copyNotification">
        <i class="fas fa-check-circle"></i> Contraseña copiada al portapapeles
    </div>

    <!-- Contenido principal -->
    <div class="container">
        <div class="main-container">
            <h1 class="page-title">
                <i class="fas fa-shield-alt"></i> Contraseñas Generadas
            </h1>
            <p class="page-subtitle">
                Sistema profesional de generación de contraseñas seguras con caracteres no ambiguos
            </p>
            
            <!-- Estadísticas -->
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-box">
                        <div class="stat-label">Contraseñas Generadas</div>
                        <div class="stat-value"><?php echo $cantidadPasswords; ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-box">
                        <div class="stat-label">Longitud</div>
                        <div class="stat-value"><?php echo $longitudPassword; ?> caracteres</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-box">
                        <div class="stat-label">Tipo de Caracteres</div>
                        <div class="stat-value">A-Z, a-z, 2-9</div>
                    </div>
                </div>
            </div>
            
            <!-- Listado de contraseñas -->
            <div class="passwords-list">
                <?php foreach ($passwords as $index => $password): ?>
                <div class="password-item">
                    <span class="password-text"><?php echo htmlspecialchars($password); ?></span>
                    <button class="copy-btn" onclick="copiarPassword('<?php echo htmlspecialchars($password); ?>')">
                        <i class="fas fa-copy"></i> Copiar
                    </button>
                </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Nota de seguridad -->
            <div class="security-note">
                <h5><i class="fas fa-info-circle"></i> Nota de Seguridad</h5>
                <p>
                    Las contraseñas generadas utilizan únicamente caracteres alfanuméricos no ambiguos 
                    (se excluyen: <code>o</code>, <code>O</code>, <code>l</code>, <code>L</code>, 
                    <code>0</code>, <code>1</code>, <code>ñ</code> y <code>Ñ</code>).
                </p>
                <div class="recommendation">
                    <strong><i class="fas fa-lightbulb"></i> Recomendación:</strong>
                    <p class="mb-2">
                        Para aumentar la complejidad, puede agregar manualmente caracteres especiales como:
                        <span class="badge-custom">;</span>
                        <span class="badge-custom">@</span>
                        <span class="badge-custom">.</span>
                        <span class="badge-custom">:</span>
                    </p>
                    <p class="mb-0">
                        <strong>Evite usar:</strong> El símbolo <code>$</code> y la coma <code>,</code> 
                        ya que pueden causar incompatibilidades con algunos proveedores de servicios o 
                        lenguajes de programación (especialmente en sistemas de gestión de bases de datos 
                        y shells de comandos).
                    </p>
                </div>
            </div>
            
            <!-- Botón para regenerar -->
            <div class="text-center mt-4">
                <button class="btn btn-primary btn-lg" onclick="location.reload();">
                    <i class="fas fa-sync-alt"></i> Generar Nuevas Contraseñas
                </button>
            </div>
        </div>
    </div>

    <!-- Pie de página fijo -->
    <footer>
        <div class="container">
            <p class="text-center">
                <i class="fas fa-code"></i> Generador de Contraseñas Seguras v1.0 | 
                Desarrollado con <i class="fas fa-heart" style="color: #e74c3c;"></i> por Claude | 
                &copy; <?php echo date('Y'); ?>
            </p>
        </div>
    </footer>

    <!-- jQuery y Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    
    <!-- Script para copiar contraseñas -->
    <script>
        function copiarPassword(password) {
            // Crear elemento temporal
            const elementoTemp = document.createElement('textarea');
            elementoTemp.value = password;
            elementoTemp.setAttribute('readonly', '');
            elementoTemp.style.position = 'absolute';
            elementoTemp.style.left = '-9999px';
            document.body.appendChild(elementoTemp);
            
            // Seleccionar y copiar
            elementoTemp.select();
            elementoTemp.setSelectionRange(0, 99999); // Para móviles
            
            try {
                document.execCommand('copy');
                mostrarNotificacion();
            } catch (err) {
                alert('Error al copiar la contraseña');
            }
            
            // Eliminar elemento temporal
            document.body.removeChild(elementoTemp);
        }
        
        function mostrarNotificacion() {
            const notificacion = document.getElementById('copyNotification');
            notificacion.style.display = 'block';
            
            setTimeout(function() {
                notificacion.style.display = 'none';
            }, 2000);
        }
    </script>
</body>
</html>