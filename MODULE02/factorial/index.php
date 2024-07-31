<!DOCTYPE html>
<html>

<head>
    <title>Factorial</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Factorial</h2>
    <form method="POST" action="">
        <label for="number">Some Number:</label>
        <input type="number" id="number" name="number">
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST['number'];
        
        if (is_numeric($number) && $number >= 0) {
            $factorial = factorial($number); 
            echo "<h2>El factorial de $number es $factorial </h2>";
        } else {
            echo "<h2>Por favor, introduce un número entero no negativo.</h2>";
        }
    }

    function factorial($n) {
        $resultado = 1;
        for ($i = 1; $i <= $n; $i++) {
            $resultado *= $i;
        }
        return $resultado;
    }
    ?>
</body>

</html>