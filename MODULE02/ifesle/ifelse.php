<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    if ($name == "Oksana") {
        $family_member = "Oksana - soy yo";
    } elseif ($name == "Nadia") {
        $family_member = "Nadia - mamá de Oksana";
    } elseif ($name == "Olga") {
        $family_member = "Olga - hermana de Oksana";
    } elseif ($name == "Nikola") {
        $family_member = "Nikola - hijo de Oksana";
    } else {
        $family_member = "Nombre inválido";
    }

    echo "El miembro de la familia seleccionado es: $family_member.";
} else {
    echo "Método de solicitud inválido.";
}
?>