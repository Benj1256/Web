<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form fields
    $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : '';
    $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $age = isset($_POST["age"]) ? $_POST["age"] : '';
    $location = isset($_POST["location"]) ? $_POST["location"] : '';

    if (empty($firstname)) {
        $errors["firstname"] = "First Name is required.";
    }
    if (empty($lastname)) {
        $errors["lastname"] = "Last Name is required.";
    }
    if (empty($email)) {
        $errors["email"] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format.";
    }
    if (empty($age)) {
        $errors["age"] = "Age is required.";
    }
    if (empty($location)) {
        $errors["location"] = "Location is required.";
    }

    // If no errors, registration successful
    if (empty($errors)) {
        $success_message = "Registration successful!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <h2>Registration Form</h2>
    <?php if (isset($success_message)) : ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="firstname">First Name</label><br>
        <input type="text" name="firstname" id="firstname" value="<?php echo $firstname ?? ''; ?>"><br>
        <?php if (isset($errors["firstname"])) : ?>
            <p style="color: red;"><?php echo $errors["firstname"]; ?></p>
        <?php endif; ?>
        
        <label for="lastname">Last Name</label><br>
        <input type="text" name="lastname" id="lastname" value="<?php echo $lastname ?? ''; ?>"><br>
        <?php if (isset($errors["lastname"])) : ?>
            <p style="color: red;"><?php echo $errors["lastname"]; ?></p>
        <?php endif; ?>

        <label for="email">Email Address</label><br>
        <input type="email" name="email" id="email" value="<?php echo $email ?? ''; ?>"><br>
        <?php if (isset($errors["email"])) : ?>
            <p style="color: red;"><?php echo $errors["email"]; ?></p>
        <?php endif; ?>

        <label for="age">Age</label><br>
        <input type="text" name="age" id="age" value="<?php echo $age ?? ''; ?>"><br>
        <?php if (isset($errors["age"])) : ?>
            <p style="color: red;"><?php echo $errors["age"]; ?></p>
        <?php endif; ?>

        <label for="location">Location</label><br>
        <input type="text" name="location" id="location" value="<?php echo $location ?? ''; ?>"><br>
        <?php if (isset($errors["location"])) : ?>
            <p style="color: red;"><?php echo $errors["location"]; ?></p>
        <?php endif; ?>

        <input type="submit" value="Register">
    </form>
</body>
</html>
