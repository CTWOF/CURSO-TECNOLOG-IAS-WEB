<?php
      echo '<h1>This is result of Form action POST method</h1>';
      

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $age = htmlspecialchars($_POST['age']);

        echo "<p>YOUR Name: $name</p>";
        echo "<p>YOUR Age: $age</p>";
    };
   echo '
    <pre>';
        print_r($_POST);
        echo  '</pre>'
    ?>