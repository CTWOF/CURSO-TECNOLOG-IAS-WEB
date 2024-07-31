<?php
echo 'THIS IS SERVER RESPONSE';
echo '<pre>';
print_r($_POST);
echo '</pre>';

$number1 = $_POST['number1'];
$number2 = $_POST['number2'];

if ($number1 == $number2) {
    echo "\nSon Iguales";
} elseif ($number1 > $number2) {
    echo 'El ' . $number1 . ' es mayor que ' . $number2;
} else {
    echo 'El ' . $number2 . ' es mayor que ' . $number1;
}
?>