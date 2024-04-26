

<?php
/**
 * Delete a user
 */
require "../common.php";

$success = "";

if (isset($_GET["UserID"])) {
 try {
 require_once '../src/DBconnect.php'; 
 $id = $_GET["UserID"];
 $sql = "DELETE FROM register WHERE UserID = :UserID";
 $statement = $connection->prepare($sql);
 $statement->bindValue(':UserID', $id);
 $statement->execute();
 $success = "User ". $id. " successfully deleted";

 } catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
 } 
} 
try {
 require_once '../src/DBconnect.php'; 
 $sql = "SELECT * FROM register";
 $statement = $connection->prepare($sql);
 $statement->execute();
 $result = $statement->fetchAll();
} catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
} 
?>
<?php require "templates/header.php"; ?>
<h2>Delete users</h2>
<?php if ($success) echo $success; ?>
<table>
 <thead>
 <tr>
 <th>#</th>
 <th>Username</th>
 <th>Password</th>
 <th>Email Address</th>
 <th>Delete</th>
 </tr>
 </thead>
 <tbody>
 <?php foreach ($result as $row) : ?>
 <tr>
 <td><?php echo escape($row["UserID"]); ?></td>
 <td><?php echo escape($row["Username"]); ?></td>
 <td><?php echo escape($row["Password"]); ?></td>
 <td><?php echo escape($row["Email"]); ?></td>
 <td><a href="delete.php?UserID=<?php echo escape($row["UserID"]); 
?>">Delete</a></td>
 </tr>
 <?php endforeach; ?>
 </tbody>
</table>
<a href="index.php">Back to home</a>
<?php require "templates/footer.php"; ?>