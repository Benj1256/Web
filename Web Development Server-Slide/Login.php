<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/Register.css">
</head>
<body>
  <header>
    <div class="container">
      <div class="top-right">
        <a href="Login.php">Login</a>
        <a href="Register.php">Register</a>
      </div>
    </div>
  </header>
  
  <div class="container">
    <h2>Login</h2>
    <form action="login_process.php" method="POST">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username" required><br>
      
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" required><br><br>
      
      <input type="submit" value="Login">
    </form>
  </div>
</body>
</html>