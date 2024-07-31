<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $discount_level = $_POST['discount'];

    switch ($discount_level) {
        case "1":
            $discount = "0%";
            break;
        case "2":
            $discount = "10%";
            break;
        case "3":
            $discount = "15%";
            break;
        case "4":
            $discount = "20%";
            break;
        case "5":
            $discount = "25%";
            break;
        case "6":
            $discount = "30%";
            break;
        case "7":
            $discount = "35%";
            break;
        case "8":
            $discount = "40%";
            break;
        case "9":
            $discount = "45%";
            break;
        case "10":
            $discount = "50%";
            break;
        default:
            $discount = "Invalid discount level";
            break;
    }

    echo "The discount for level $discount_level is $discount.";
} else {
    echo "Invalid request method.";
}
?>