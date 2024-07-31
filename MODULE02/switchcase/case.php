<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];

    switch (true) {
        case ($number >= 19 && $number <= 20):
            $grade = "A";
            break;
        case ($number >= 16 && $number <= 18):
            $grade = "B";
            break;
        case ($number >= 12 && $number <= 15):
            $grade = "C";
            break;
        case ($number >= 9 && $number <= 11):
            $grade = "D";
            break;
        case ($number >= 0 && $number <= 8):
            $grade = "E";
            break;
        default:
            $grade = "Invalid number";
            break;
    }

    echo "The grade for number $number is $grade.";
} else {
    echo "Invalid request method.";
}
?>