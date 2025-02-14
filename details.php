<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "hos_pital";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $medical = $_POST["medical"];

    $query = "INSERT INTO `details`(`name`, `age`, `gender`, `medical`) VALUES ('$name','$age','$gender','$medical')";
   $result = mysqli_query($conn, $query);
    if($result){
        echo"Data inserted into the database";
    }
    else{
        echo"task failed" . $conn->error;
    }
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medicare Hospital - Patient Details</title>
  <link rel="stylesheet" href="details.css">
  <script defer src="details.js"></script>
</head>
<body>

  <nav class="navbar">
    <div class="logo"><img src="logo.jpg" alt="Logo" width="50px"></div>
    <a href="home.html">Home</a>
    <a href="bed-booking.html">Bed Booking</a>
    <a href="Services.html">Services</a>
    <a href="Contact us.html">Contact</a>
    <a href="aboutus.html">About Us</a>
    <button id="logoutButton" style="background: red; color: white; padding: 8px; border: none; cursor: pointer;">Logout</button>
  </nav>

  <header>
    <h1>Patient Details</h1>
    <p>Manage patient information in real-time.</p>
  </header>

  <section id="patient-details">
    <h2>Patient Details</h2>
    <form id="patientForm" action="dataadd.php" method="post">
      <label for="name">Patient Name:</label>
      <input type="text" id="name" placeholder="Enter patient name" name="name" required>

      <label for="age">Age:</label>
      <input type="number" id="age" placeholder="Enter age" name="age" required>

      <label for="gender">Gender:</label>
      <select id="gender" required>
        <option value="">Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
      </select>

      <label for="condition">Medical Condition:</label>
      <input type="text" id="condition" placeholder="Enter medical condition"  name="medical" required>

      <button type="button" onclick="addOrUpdatePatient()">Add/Update Patient</button>
    </form>

    <table id="patientList">
      <thead>
        <tr>
          <th>Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Condition</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </section>

  <footer>
    <p>&copy; 2025 Medicare Hospital. All rights reserved.</p>
  </footer>
</body>
</html>


