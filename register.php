<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $membership = $_POST["membership"];
    $petNames = $_POST["pet_names"];
    $password = $_POST["password"];

    // Check password complexity
    if (!preg_match('/^(?=.*[A-Z])(?=.*[^a-zA-Z]).{8,}$/', $password)) {
        die("Password must contain at least one uppercase letter, one non-letter character, and be at least 8 characters long.");
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Create a database connection
    $conn = new mysqli("localhost", "root", "", "PetInsure");

    // Insert user data into the "users" table
    $sql = "INSERT INTO users (username, email, membership_level, pet_names, password) VALUES ('$username', '$email', '$membership', '$petNames', '$hashedPassword')";
    $conn->query($sql);

    // Store registration info in session
    $_SESSION["registrationInfo"] = array(
        "username" => $username,
        "email" => $email,
        "membership" => $membership,
        "petNames" => $petNames
    );

    $conn->close();

    // Redirect to dashboard page
    header("Location: dashboard.html");
}
?>
