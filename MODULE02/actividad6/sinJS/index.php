<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actividad6</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <form action="" method="post">
        Indica el número 1 <input type="text" name="dato1"><br>
        Indica el número 2 <input type="text" name="dato2"><br>
        Indica el número 3 <input type="text" name="dato3"><br>
        Indica el número 4 <input type="text" name="dato4"><br>
        <input type="submit" value="Determinar el mayor">
    </form>
    <?php
$tabla = array();
for ($i=1;$i<=count($_POST);$i++) {
	$tabla[]= $_POST['dato'.$i];
}
$mayor=0;
for ($i=0; $i < count($tabla); $i++) {
    if ($mayor<$tabla[$i]) {
		$mayor=$tabla[$i];
	}
}
echo 'El número mayor es '.$mayor;

?>
</body>

</html>