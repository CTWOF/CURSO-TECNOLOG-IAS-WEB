<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Área</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <h1>Resultado del Área</h1>
        <div class="result">
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $base = $_POST["base"];
                $altura = $_POST["altura"];

                if (is_numeric($base) && is_numeric($altura) && $base > 0 && $altura > 0) {

                    $area = $base * $altura;

                    echo "El área del rectángulo es: " . $area . " unidades cuadradas.";
                } else {
                    echo "Por favor, ingrese valores válidos para la base y la altura.";
                }
            } else {
                echo "Por favor, use el formulario para ingresar los datos.";
            }
            ?>
        </div>
        <a class="back-link" href="calc.html">
            <b>Volver al formulario</b>
        </a>
    </main>
</body>

</html>