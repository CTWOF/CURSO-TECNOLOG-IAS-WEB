<!DOCTYPE html>
<html>

<head>
    <title>Cálculo de la letra del DNI</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="POST" action="">
        <label for="dni">Número de DNI:</label>
        <input type="text" id="dni" name="dni">
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dni = $_POST['dni'];
        if (is_numeric($dni) && strlen($dni) == 8) {
            $letra = getLetra($dni);
            echo "<h2>La letra del DNI $dni es   $letra </h2>";
        } else {
            echo "Introduce minimum 8 digitals!";
        }
    }

    function getLetra($numeroDNI) {
        $letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        $resto = $numeroDNI % 23;
        return $letras[$resto];
    }
    ?>
</body>

</html>