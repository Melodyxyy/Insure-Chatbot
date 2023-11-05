<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petType = $_POST["pet-type"];
    $petName = $_POST["pet-name"];
    $age = $_POST["age"];
    $email = $_POST["email"];

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "PetInsure"; // Change this to your database name

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the Quotes table
    $sql = "INSERT INTO Quotes (pet_type, pet_name, age, email) VALUES ('$petType', '$petName', '$age', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Quote request submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Form submission error.";
}
?>
