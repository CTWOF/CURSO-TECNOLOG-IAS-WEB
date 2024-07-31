<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $discount_level = $_POST['discount'];

    if ($discount_level == "1") {
        $discount = "0%";
    } elseif ($discount_level == "2") {
        $discount = "10%";
    } elseif ($discount_level == "3") {
        $discount = "15%";
    } elseif ($discount_level == "4") {
        $discount = "20%";
    } elseif ($discount_level == "5") {
        $discount = "25%";
    } elseif ($discount_level == "6") {
        $discount = "30%";
    } elseif ($discount_level == "7") {
        $discount = "35%";
    } elseif ($discount_level == "8") {
        $discount = "40%";
    } elseif ($discount_level == "9") {
        $discount = "45%";
    } elseif ($discount_level == "10") {
        $discount = "50%";
    } else {
        $discount = "Invalid discount level";
    }

    echo "The discount for level $discount_level is $discount.";
} else {
    echo "Invalid request method.";
}
?>