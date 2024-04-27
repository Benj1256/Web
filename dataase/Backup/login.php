<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/Valid.css">
    <link rel="stylesheet" href="css/Register.css">
</head>
<body>
    <header class="header">
        <center>
            <ul>
                <li><a href="register.php">Registration</a></li>
            </ul>
        </center>
    </header>

    <center>
        <h2>Login</h2>

        <form method="post">
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name" required><br><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" required><br><br>
            <input type="submit" name="submit" value="Login"><br><br>

            <a href="admin.php">Admin Login</a>
        </form>
    </center>

    <?php
    session_start(); // Start the session

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Simplified user authentication logic
        if ($name === 'admin' && $email === 'admin@example.com') {
            $_SESSION['Username'] = $name;
            header("Location: Service.php");
            exit();
        } else {
            echo "Login failed. Please check your credentials.";
        }
    }
    ?>
</body>
</html>
