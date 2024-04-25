<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/Register.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="js/form.js"></script>

</head>
<body>
  <header>
    <div class="container">
      <div class="top-right">
        <a href="Login.html">Login</a>
        <a href="">Register</a>
      </div>
    </div>
  </header>
  
  <div class="container">
    <h2>Register</h2>
    <form action="register_process.php" method="POST">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username" required><br>
      
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" required><br><br>
      
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required><br><br>
      
      <input type="submit" value="Register">
    </form>
  </div>
</body>
</html>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const tabs = document.querySelectorAll('.tab-content');
      tabs.forEach(tab => {
        tab.style.display = 'none';
      });
      const hash = window.location.hash.substring(1);
      const activeTab = document.getElementById(hash) || document.getElementById('login');
      activeTab.style.display = 'block';
    });
  </script>
</body>
</html>