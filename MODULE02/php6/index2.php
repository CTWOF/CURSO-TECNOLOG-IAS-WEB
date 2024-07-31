<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>PHP6</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $datos = $_POST['datos'];

        $datos_invertidos = array_reverse($datos);

        echo "<h1>Datos en orden inverso:</h1>";
        echo "<ul>";
        foreach ($datos_invertidos as $dato) {
            echo "<li>" . htmlspecialchars($dato) . "</li>";
        }
        echo "</ul>";
    }
    ?>
</body>