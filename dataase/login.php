
<link rel="stylesheet"  href="css/Valid.css">
<link rel="stylesheet" href="css/Register.css">
<header class="header">

<center><ul>
   
    <li><a href="register.php">Registration</a></li>

</ul></center>

</header>





<div class = "container">

<div class="top-right">

<h2>Login</h2>

</div>

<form method="post">
    <label for="name">Name</label><br>
    <input type="text" name="name" id="name" required><br>
    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" required><br><br>
    <input type="submit" name="submit" value="Login"><br><br>

<a href="admin.php">Admin Login</a>

</form></center>

</div>


<?php
session_start(); // Start the session


require "common.php";
require_once 'src/DBconnect.php';

class UserAuthenticator {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function authenticateUser($name, $email) {
        try {
            $sql = "SELECT * FROM users WHERE firstname = :name AND email = :email";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':name', $name);
            $statement->bindParam(':email', $email);
            $statement->execute();
            $user = $statement->fetch();

            return $user !== false; // Return true if user found, false otherwise
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
            return false;
        }
    }
}

$userAuthenticator = new UserAuthenticator($connection);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($userAuthenticator->authenticateUser($name, $email)) {
        // Login successful, redirect to index page
	$_SESSION['Username'] = $name; //$user['username'];
        header("Location: home.php");
        exit();
    } else {
        echo "Login failed. Please check your credentials.";
    }
}

?>
