<!DOCTYPE html>
<html>
   
    <head>
        <title>Driver Details</title>

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="dstyle.css">

    </head>
        <body>

            <header class="header">
              <a href="homePage.html" > <img class="logo" src="Images/rentgonew.png" width="160px" alt="logo"> </a> <br/><br/><br/>
            
            
                <nav>
                   <ul class="navigation">
                    <li><a href="homePage.html">Home</a></li>
                    <li><a href="driver.php">Schedule Ride</a></li>
                    <li><a href="#">Instant Ride</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">FAQ</a></li>

                  
                    <div class="searchNav">
                        <form>
                            <input style="margin-left: 5px;width:200px;" type="text" id="keyword" onclick="searchResults()" placeholder="Search..." >
                            
                        </form>
                    </div>
                </ul>
            </nav>
           
            <a class="newbutton" href="#"><button>Login</button></a>
            <a class="newbutton" href="Signin.html"><button style="margin-right: 40px;">SignUp</button></a>
            </header>


















<?php
 





//connect to the srever

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentgo";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// data insert

if (isset($_POST['driver_name'], $_POST['driver_phone'], $_POST['driver_address'])) {
    $stmt = $conn->prepare("INSERT INTO driver (dname, dphone, daddress) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $_POST['driver_name'], $_POST['driver_phone'], $_POST['driver_address']);

    if ($stmt->execute()) {
        echo "Driver information submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentgo";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM driver";
$result = $conn->query($sql);


//delete data
if (isset($_POST['delete'])) {
    $driverId = $_POST['delete'];

    $deleteStmt = $conn->prepare("DELETE FROM driver WHERE id = ?");
    $deleteStmt->bind_param("i", $driverId);

    if ($deleteStmt->execute()) {
        echo "Driver deleted successfully!";
    } else {
        echo "Error deleting driver: " . $deleteStmt->error;
    }

    $deleteStmt->close();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

//update data

if (isset($_POST['update'], $_POST['driver_id'], $_POST['drivername_update'], $_POST['driverphone_update'], $_POST['driveraddress_update'])) {
    $driverId = $_POST['driver_id'];
    $driverName = $_POST['drivername_update'];
    $driverPhone = $_POST['driverphone_update'];
    $driverAddress = $_POST['driveraddress_update'];

    $updateStmt = $conn->prepare("UPDATE driver SET dname = ?, dphone = ?, daddress = ? WHERE id = ?");
    $updateStmt->bind_param("sssi", $driverName, $driverPhone, $driverAddress, $driverId);

    if ($updateStmt->execute()) {
        echo "Driver updated successfully!";
    } else {
        echo "Error updating driver: " . $updateStmt->error;
    }

    $updateStmt->close();

    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

//data show table
if ($result->num_rows > 0) {
  echo '<table class="dshowtbl" >';
  echo '<tr>';
  echo '<th >Driver ID</th>';
  echo '<th >Driver Name</th>';
  echo '<th >Driver Phone Number</th>';
  echo '<th >Driver Address</th>';
  echo '<th >Actions</th>';
  echo '</tr>';

  while ($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo '<td >' . $row["id"] . '</td>';
      echo '<td >' . $row["dname"] . '</td>';
      echo '<td >' . $row["dphone"] . '</td>';
      echo '<td >' . $row["daddress"] . '</td>';
      echo '<td >';

      
      echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
      echo '<input type="hidden" name="update" value="true">';
      echo '<input type="hidden" name="driver_id" value="' . $row["id"] . '">';
      echo 'Name: <input type="text" name="drivername_update" value="' . $row["dname"] . '">';
      echo 'Phone: <input type="text" name="driverphone_update" value="' . $row["dphone"] . '">';
      echo 'Address: <input type="text" name="driveraddress_update" value="' . $row["daddress"] . '">';
      echo '<button class="dupbtn" type="submit">Update</button>';
      echo '</form>';

      echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
      echo '<input type="hidden" name="delete" value="' . $row["id"] . '">';
      echo '<button  class ="ddbtn" type="submit">Delete</button>';
      echo '</form>';


      echo '</form>';
      echo '</td>';
      echo '</tr>';
  }

  echo "</table>";
} else {
    echo "No data found in the drivers table.";
}


$conn->close();







?>

<!--create the footer-->

<footer class="footer">
            <div class="footer-container">
              <div class="footer-logo">
                <img src="Images/rentgonew.png" alt="Company Logo">
              </div>
              <nav class="footer-menu " >
                <ul>
                    <h3><u>Quick Links</u></h3>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Instant Ride</a></li>
                  <li><a href="#">Shedule</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">FAQ</a></li>
                </ul>
                <ul class="additional-links">
                    <h3><u>About Us</u></h3>
                  <li><a href="#">Terms and Conditions</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">About Rent & Go</a></li>
                </ul>
              </nav>
              <div class="footer-info">
                <p>Address: 123 Main Street, City, Country</p>
                <p>Phone: 077-456-7890</p>
                <p>Email: info@rent&go.com</p>

                <div class="social-media">
                <center><b><h4>Follow Us On</h4></b> </center>
                    <a href="https://www.facebook.com/" target="_blank"><img class="facebook" src="Images/facebook.png" width="30px" length="30px"></a>
                    <a href="https://www.instagram.com/" target="_blank"><img class="instagram" src="Images/instagram.png" width="30px" length="30px"></a>
                    <a href="https://twitter.com/" target="_blank"><img class="twitter" src="Images/twitter.png" width="30px" length="30px"></a>
                    <a href="https://myaccount.google.com/profile" target="_blank"><img class="google-plus" src="Images/Google_Plus_logo_(2015-2019).svg.png" width="30px" length="30px"></a>

                
                </div>
              </div>
            </div>
           
            <div class="footer-bottom">
              <p>Copyright 2023-2025 &copy; Rent & Go. All rights reserved.</p>
            </div>
          </footer>
          
          
          
          
          
        </body>
    </head>
</html>