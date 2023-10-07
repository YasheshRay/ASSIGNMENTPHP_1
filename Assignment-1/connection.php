<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $size = $_POST["size"];
    $crust = $_POST["crust"];
    $sauce = $_POST["sauce"];

   
    // Handle Meat Toppings
    $meat_toppings = isset($_POST["Meat_Toppings"]) ? $_POST["Meat_Toppings"] : [];
    $topping1 = implode(",", $meat_toppings);

    // Handle Vegetarian Toppings
    $veg_toppings = isset($_POST["Toppings_Vegetarian"]) ? $_POST["Toppings_Vegetarian"] : [];
    $topping2 = implode(",", $veg_toppings);

    // Handle Cheese Toppings
    $cheese_toppings = isset($_POST["Cheese_Toppings"]) ? $_POST["Cheese_Toppings"] : [];
    $topping3 = implode(",", $cheese_toppings);

    // Handle Extra Charge Toppings
    $extra_toppings = isset($_POST["Extra_Charge_Toppings"]) ? $_POST["Extra_Charge_Toppings"] : [];
    $topping4 = implode(",", $extra_toppings);

    // Establish a database connection
    $conn = new mysqli("172.31.22.43", "Yasheshkumar200522600", "XIa1d4vA3c", "Yasheshkumar200522600");
    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the SQL table
    $sql = "INSERT INTO pizza (size, crust, sauce, meat_toppings, veg_toppings, cheese_toppings, extra_toppings) VALUES ('$size', '$crust', '$sauce', '$topping1', '$topping2', '$topping3', '$topping4')";


    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
