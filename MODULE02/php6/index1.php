<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>PHP6</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form method="post" action="">
        <label for="dato1">Dato 1:</label>
        <input type="text" id="dato1" name="datos[]"><br>

        <label for="dato2">Dato 2:</label>
        <input type="text" id="dato2" name="datos[]"><br>

        <label for="dato3">Dato 3:</label>
        <input type="text" id="dato3" name="datos[]"><br>

        <label for="dato4">Dato 4:</label>
        <input type="text" id="dato4" name="datos[]"><br>

        <label for="dato5">Dato 5:</label>
        <input type="text" id="dato5" name="datos[]"><br>

        <label for="dato6">Dato 6:</label>
        <input type="text" id="dato6" name="datos[]"><br>

        <input type="submit" value="Enviar">
    </form>
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

</html>