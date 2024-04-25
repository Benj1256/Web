<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are provided
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        // For demonstration purposes, let's assume the username and password are correct
        // In a real-world scenario, you would query your database to verify credentials

        // Set session variables to indicate the user is logged in
        $_SESSION['username'] = $_POST['username'];

        // Redirect the user to service.html
        header("Location: Service.html");
        exit; // Ensure script execution stops after redirection
    } else {
        // If username or password is empty, redirect back to the login page with an error message
        header("Location: Login.html?error=empty");
        exit; // Ensure script execution stops after redirection
    }
} else {
    // If the form is not submitted, redirect back to the login page
    header("Location: Login.html");
    exit; // Ensure script execution stops after redirection
}
?>