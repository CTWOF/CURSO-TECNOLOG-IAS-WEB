<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $checked_post = filter_input_array(INPUT_POST, [
        'childName' => FILTER_SANITIZE_STRING,
        'dob' => FILTER_SANITIZE_STRING,
        'parentName' => FILTER_SANITIZE_STRING,
        'email' => FILTER_SANITIZE_EMAIL,
        'grade' => FILTER_SANITIZE_STRING,
        'siblings' => FILTER_SANITIZE_NUMBER_INT,
        'newsletter' => FILTER_SANITIZE_STRING
    ]);

    $childName = htmlspecialchars($checked_post['childName']);
    $dob = htmlspecialchars($checked_post['dob']);
    $parentName = htmlspecialchars($checked_post['parentName']);
    $email = htmlspecialchars($checked_post['email']);
    $grade = htmlspecialchars($checked_post['grade']);
    $siblings = (int)$checked_post['siblings'];
    $newsletter = isset($checked_post['newsletter']) ? true : false;

    if ($childName != strip_tags($childName) 
    || $parentName != strip_tags($parentName) 
    || $email != strip_tags($email) 
    || $grade != strip_tags($grade)) {
        echo "<p style='color:red;'>Error: No se permiten etiquetas HTML. Por favor, introduce los datos de nuevo.</p>";
    } else {
        echo "<h2>Resultados del formulario de preinscripción:</h2>";
        echo "<p><strong>Nombre del Niño:</strong> $childName</p>";
        echo "<p><strong>Fecha de Nacimiento:</strong> $dob</p>";
        echo "<p><strong>Nombre del Padre/Madre/Tutor:</strong> $parentName</p>";
        echo "<p><strong>Correo Electrónico:</strong> $email</p>";
        echo "<p><strong>Grado Escolar:</strong> $grade</p>";
        echo "<p><strong>Número de Hermanos:</strong> $siblings</p>";
        echo "<p><strong>¿Desea recibir el boletín informativo?:</strong> " . ($newsletter ? 'Sí' : 'No') . "</p>";
    }
}