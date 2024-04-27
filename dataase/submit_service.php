<?php

session_start();


class TicketHandler {
    private $currentUser;
    private $connection;

    public function __construct($connection) {
        
        $this->currentUser = isset($_SESSION['Username']) ? $_SESSION['Username'] : "Guest";
        $this->connection = $connection;
    }

    public function processForm() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["problem"]) && isset($_POST["device_model"]) && isset($_POST["device_os"])) {
                $problem = $_POST["problem"];
                $deviceModel = $_POST["device_model"];
                $deviceOS = $_POST["device_os"];

                try {
                    // Prepare the SQL statement for insertion
                    $sql = "INSERT INTO service (problem, device_model, device_os, user) VALUES (:problem, :device_model, :device_os, :user)";
                    $statement = $this->connection->prepare($sql);

                    // Bind the parameters and execute the statement
                    $statement->bindParam(':problem', $problem);
                    $statement->bindParam(':device_model', $deviceModel);
                    $statement->bindParam(':device_os', $deviceOS);
                    $statement->bindParam(':user', $this->currentUser);
                    $statement->execute();

                    echo "Ticket details successfully added to the database.<br>";
                } catch(PDOException $error) {
                    echo "Error: " . $error->getMessage();
                }
            } else {
                echo "Error: Problem or device details are missing.";
            }
        } else {
            echo "Error: Form not submitted.";
        }
    }
}

require_once 'src/DBconnect.php';
$connection = new PDO($dsn, $username, $password, $options);

$ticketHandler = new TicketHandler($connection);
$ticketHandler->processForm();

?>

<form method="post" action="ticket.php">
    <input type="submit" name="submit" value="Confirm">
</form>
 