<?php
// LÓGICA DE NEGOCIO: Conversor de unidades
$resultado = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST["tipo"];
    $valor = floatval($_POST["valor"]);
    
    if ($valor <= 0) {
        $error = "Por favor, ingrese un valor mayor a 0";
    } else {
        switch ($tipo) {
            case "metros_a_pies":
                $resultado = $valor . " metros = " . ($valor * 3.28084) . " pies";
                break;
            case "pies_a_metros":
                $resultado = $valor . " pies = " . ($valor / 3.28084) . " metros";
                break;
            case "celsius_fahrenheit":
                $resultado = $valor . "°C = " . (($valor * 9/5) + 32) . "°F";
                break;
            case "fahrenheit_celsius":
                $resultado = $valor . "°F = " . (($valor - 32) * 5/9) . "°C";
                break;
            default:
                $error = "Seleccione una conversión válida";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Unidades | Mi App PHP</title>
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
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
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
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }
        select, input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
        }
        button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background: #45a049;
        }
        .resultado {
            margin-top: 20px;
            padding: 20px;
            background: #e0e7ff;
            border-radius: 10px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
        .error {
            background: #fee2e2;
            color: #dc2626;
        }
        .fecha {
            margin-top: 20px;
            color: #666;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔄 Conversor de Unidades</h1>
        
        <div class="nav">
            <a href="index.php">🏠 Inicio</a>
            <a href="conversor.php">🔄 Conversor</a>
        </div>
        
        <form method="POST">
            <div class="form-group">
                <label>Tipo de conversión:</label>
                <select name="tipo" required>
                    <option value="">-- Seleccione --</option>
                    <option value="metros_a_pies">Metros a Pies</option>
                    <option value="pies_a_metros">Pies a Metros</option>
                    <option value="celsius_fahrenheit">Celsius a Fahrenheit</option>
                    <option value="fahrenheit_celsius">Fahrenheit a Celsius</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Valor a convertir:</label>
                <input type="number" step="any" name="valor" placeholder="Ej: 100" required>
            </div>
            
            <button type="submit">🔄 Convertir</button>
        </form>
        
        <?php if ($resultado): ?>
            <div class="resultado">
                <?php echo $resultado; ?>
            </div>
        <?php elseif ($error): ?>
            <div class="resultado error">
                ❌ <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <div class="fecha">
            <?php
            date_default_timezone_set('America/Bogota');
            echo "Conversión realizada el: " . date('d/m/Y H:i:s');
            ?>
        </div>
    </div>
</body>
</html>