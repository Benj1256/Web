<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Details</title>
  <link rel="stylesheet" href="css/Register.css">
  <link rel="stylesheet" href="css/servicedetails.css">
</head>
<body>
  <header>
    <div class="container">
      <div class="top-right">
      </div>
      <h1>Phone Repair Services</h1>
    </div>
  </header>
  
  <div class="container">
    <h2>Select a Service</h2>
    <form action="login_process.php" method="GET" onsubmit="submitForm(); return false;">
      <label for="service">Choose a service:</label><br>
      <select id="service" name="service">
          <option value=""></option> <!-- Option for no service -->
        <?php
          $services = array(
            "Cracked Screen"=>"images/cract.jpg",
            "Battery Replace"=>"",
            "Water Damage"=>"",
            "USB Fixing"=>"images/fixing.jpg",
            "Boot loop"=>"",
            "Missing Drivers/Api's"=>""
          );

          // Populate dropdown options
          foreach ($services as $service => $image) {
            echo "<option value='$service'>$service</option>";
          }
        ?>
      </select><br><br>
      <input type="submit" value="Submit">
    </form>
  </div>
  
  <div class="container2">
    <h2>Service Images</h2>
    <div class="service-images">
        <?php
          // Display images for "Cracked Screen" and "USB Fixing" services
          foreach ($services as $service => $image) {
              if ($service == "Cracked Screen" || $service == "USB Fixing") {
                 echo "<img src='$image' alt='$service' class='service-image' height='222' width='222'>"; // Adjust the width value as needed
              }
          }
        ?>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="logo">
        <img src="images/logo.png" width="80" height="80" alt="Logo">
      </div>
      <p>&copy; 2024 Your Company. All rights reserved.</p>
    </div>
  </footer>
    
  <script>
    /**
     * Function to submit the form based on the selected service.
     */
    function submitForm() {
        var selectedService = document.getElementById("service").value;

        if (selectedService === "") {
            alert("Please select a service.");
        } else {
            var url = "http://localhost/Web_Development_Server-Slide/Web%20Development%20Server-Slide/login_process.php?service=" + encodeURIComponent(selectedService);
            window.location.href = url;
        }
    }
  </script>
</body>
</html>
