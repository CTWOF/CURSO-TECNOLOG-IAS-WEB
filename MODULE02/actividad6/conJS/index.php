<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actividad6</title>
    <link rel="stylesheet" href="style.css">
    <script>
    function mostrarInputs() {
        let numInputs = document.getElementById('numDatos').value;
        let campos = '';
        for (let i = 1; i <= numInputs; i++) {
            campos += 'Indica el valor ' + i + ': <input type="number" name="numeros[]"><br>';
        }
        document.getElementById('camposFormulario').innerHTML = campos + '<input type="submit" value="Enviar">';
    }
    </script>
</head>

<body>
    <h3>¿Cuántos números deseas?</h3>
    <input type="number" id="numDatos" min="1" max="10"><br>
    <input type="button" value="Mostrar inputs" onclick="mostrarInputs()">

    <form action="" method="post">
        <div id="camposFormulario"></div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numeros = $_POST['numeros'];

        if (!empty($numeros)) {
            $mayor = (int)$numeros[0];
            foreach ($numeros as $num) {
                $num = (int)$num;
                if ($num > $mayor) {
                    $mayor = $num;
                }
            }

            echo '<h2>El número mayor es ' . htmlspecialchars($mayor) . '</h2>';
        } else {
            echo '<h2>No se ingresaron números válidos.</h2>';
        }
    }
    ?>
</body>

</html>