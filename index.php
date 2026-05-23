<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación PHP en Render</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .nav {
            margin: 30px 0;
            display: flex;
            gap: 20px;
            justify-content: center;
        }
        .nav a {
            background: #667eea;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .nav a:hover {
            transform: scale(1.05);
            background: #5a67d8;
        }
        .content {
            margin-top: 20px;
            padding: 20px;
            background: #f5f5f5;
            border-radius: 15px;
        }
        .info {
            background: #e0e7ff;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
        }
        .fecha {
            margin-top: 20px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 Mi Aplicación PHP en Render</h1>
        
        <div class="nav">
            <a href="index.php">🏠 Inicio</a>
            <a href="conversor.php">🔄 Conversor</a>
        </div>
        
        <div class="content">
            <h2>¡Despliegue exitoso!</h2>
            <p>Esta aplicación PHP está corriendo dentro de un contenedor Docker en Render.</p>
            
            <div class="info">
                <strong>📊 Información del servidor:</strong><br>
                <?php
                echo "PHP Version: " . phpversion() . "<br>";
                echo "Servidor: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
                echo "Tu IP: " . $_SERVER['REMOTE_ADDR'];
                ?>
            </div>
            
            <div class="fecha">
                <?php
                date_default_timezone_set('America/Bogota');
                echo "Fecha y hora actual: " . date('d/m/Y H:i:s');
                ?>
            </div>
        </div>
    </div>
</body>
</html>