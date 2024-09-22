<?php
require_once 'ClassPersonNationalityFull.php';

$personas = [
    new PersonaConNacionalidad('Olga', 'Fedyukova', '', '1990-05-10', 'Femenino', 'Ucraniana'),
    new PersonaConNacionalidad('Nikola', 'Molina', '', '1985-03-22', 'Masculino', 'Español'),
    new PersonaConNacionalidad('Micky', 'Mickey', '', '1978-11-15', 'Masculino', 'Ingles')
];

$personasSerializadas = serialize($personas);

file_put_contents('personas.txt', $personasSerializadas);

echo 'Personas guardadas correctamente en "personas.txt".';
?>