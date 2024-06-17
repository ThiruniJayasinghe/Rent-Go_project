<?php
 






$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentgo";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
   
    <head>
	
		<meta charset ="utf-8">
        <title>Contact details</title>

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="userstyle.css">
		<link rel="stylesheet" href="update.css">

    </head>
        <body>
		<script src="script.js"></script>

            <header class="header">
              <a href="https://www.facebook.com/" > <img class="logo" src="Images/rentgonew.png" width="160px" alt="logo"> </a> <br/><br/><br/>
            
            
                <nav>
                   <ul class="navigation">
                    <li><a href="https://www.google.com">Home</a></li>
                    <li><a href="https://www.google.com">Vehicle Rent</a></li>
                    <li><a href="https://www.google.com">Instant Ride</a></li>
                    <li><a href="https://www.google.com">Contact Us</a></li>
                    <li><a href="FAQpage.html">FAQ</a></li>

                  
                    <div class="searchNav">
                        <form>
                            <input type="text" id="keyword" onclick="searchResults()" placeholder="Search..." >
                            
                        </form>
                    </div>
                </ul>
            </nav>
           
            <a class="newbutton" href="#"><button>Login</button></a>
            <a class="newbutton" href="#"><button>SignUp</button></a>

            <a href="user.html" > <img class="logo1" src="Images/user.png" width="40px" alt="logo"> </a>
            </header>
                
                
            
             <br>
<?php

if (isset($_POST['Name'], $_POST['Email'], $_POST['Number'],$_POST['Msg'])) {
    $stmt = $conn->prepare("INSERT INTO contact (Name, Email,Number,Msg ) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $_POST['Name'], $_POST['Email'], $_POST['Number'],$_POST['Msg']);

    if ($stmt->execute()) {
        echo "Information submitted successfully!";
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


$sql = "SELECT * FROM contact";
$result = $conn->query($sql);



if (isset($_POST['delete'])) {
    $id = $_POST['delete'];

    $deleteStmt = $conn->prepare("DELETE FROM contact WHERE id = ?");
    $deleteStmt->bind_param("i", $id);

    if ($deleteStmt->execute()) {
        echo "Deleted successfully!";
    } else {
        echo "Error deleting : " . $deleteStmt->error;
    }

    $deleteStmt->close();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['update'])) {
    $id = $_POST['update'];
    $Name = $_POST['Name_update'];
    $Email = $_POST['Email_update'];
    $Number = $_POST['Number_update'];
	$Msg = $_POST['Msg_update'];

    $updateStmt = $conn->prepare("UPDATE contact SET Name = ?, Email = ?, Number = ? , Msg = ? WHERE id = ?");
    $updateStmt->bind_param("ssssi", $Name, $Email, $Number, $Msg,$id);

    if ($updateStmt->execute()) {
        echo "Updated successfully!";
    } else {
        echo "Error updating : " . $updateStmt->error;
    }

    $updateStmt->close();

    // Redirect to refresh the page
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
echo '<html>';
echo '<head>';
echo '<link rel="stylesheet" type="text/css" href="contacttable.css">';
echo '<link rel="stylesheet" type="text/css" href="H&F.css">';
echo '</head>';
echo '<body>';


if ($result->num_rows > 0) {
echo '<h1 class="h1">Contact Queries</h1>';
  echo '<table class="user-table" >';
  echo '<tr>';
  echo '<th>id</th>';
  echo '<th>Name</th>';
  echo '<th>Email</th>';
  echo '<th>Number</th>';
  echo '<th>Msg</th>';
    echo '<th>Actions</th>';
  echo '</tr>';

  while ($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . $row["id"] . '</td>';
      echo '<td>' . $row["Name"] . '</td>';
      echo '<td>' . $row["Email"] . '</td>';
      echo '<td>' . $row["Number"] . '</td>';
      echo '<td>' . $row["Msg"] . '</td>';
	  echo '<td>';
	  
     
      echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
     
      echo '<input type="hidden" name="update" value="' . $row["id"] . '">';
      echo 'Name: <input type="text" name="Name_update" value="' . $row["Name"] . '">';
      echo 'Email: <input type="text" name="Email_update" value="' . $row["Email"] . '">';
      echo 'Number: <input type="text" name="Number_update" value="' . $row["Number"] . '">';
	  echo 'Msg: <input type="text" name="Msg_update" value="' . $row["Msg"] . '"><br>';
	  
	  
	  
      echo '<button type="submit" class="c">Update</button><br><br>';
      echo '</form>';
	  
	  echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
      echo '<input type="hidden" name="delete" value="' . $row["id"] . '">';
      echo '<button type="submit" class="a">Delete</button>';
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

<br><br>
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
                  <li><a href="FAQpage.html">FAQ</a></li>
                </ul>
                <ul class="additional-links">
                    <h3><u>About Us</u></h3>
                  <li><a href="terms & condition.html">Terms and Conditions</a></li>
                  <li><a href="privacy .html">Privacy Policy</a></li>
                  <li><a href="about us.html">About Rent & Go</a></li>
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