<?php
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Form submission logic here
} else {
    // If not a POST request, redirect to service.php
    header("Location: service.php");
    exit();
}

session_start();

// Check if the function is not already defined
if (!function_exists('generateTicketNumber')) {
    // Function to generate a random alphanumeric string for the ticket number
    function generateTicketNumber($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}

$ticketNumber = generateTicketNumber();

date_default_timezone_set('Europe/Dublin');

$today = date('Y-m-d'); // Format: Year-Month-Day

// Access the currentUser variable from the session
$currentUser = isset($_SESSION['Username']) ? $_SESSION['Username'] : "Guest";

// Output HTML content...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Details</title>
</head>
<body>
    <h2>Ticket Details</h2>
    
    <p><strong>Start Date:</strong> <?php echo $today; ?></p>
    
    <p><strong>Current User:</strong> <?php echo $currentUser; ?></p>
    
    <p><strong>Ticket Number:</strong> <?php echo $ticketNumber; ?></p>
    
    <a href="home.php">Home</a><br><br>

    <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
        <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
    </form>
</body>
</html>
