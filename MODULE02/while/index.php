<!DOCTYPE html>
<html>

<head>
    <title>Factorial</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>While</h2>
    <form method="POST" action="">
        <label for="number">Some Number:</label>
        <input type="number" id="number" name="number">
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
        $number = $_POST['number'];
        
  
    ?>
</body>

</html>