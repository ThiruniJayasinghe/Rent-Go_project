
<!DOCTYPE html>
<html>
   
    <head>
    <title>Schedule Ride</title>
    
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="readcss.css">
        
        
     

    </head>
        <body>

            <header class="header">
              <a href="https://www.facebook.com/" > <img class="logo" src="Images/rentgonew.png" width="160px" alt="logo"> </a> <br/><br/><br/>
            
            
                <nav>
                   <ul class="navigation">
                    <li><a href="https://www.google.com">Home</a></li>
                    <li><a href="https://www.google.com">Vehicle Rent</a></li>
                    <li><a href="https://www.google.com">Instant Ride</a></li>
                    <li><a href="https://www.google.com">Contact Us</a></li>
                    <li><a href="https://www.google.com">FAQ</a></li>

                  
                    <div class="searchNav">
                        <form>
                            <input type="text" id="keyword" onclick="searchResults()" placeholder="Search..." >
                            
                        </form>
                    </div>
                </ul>
            </nav>
           
            <a class="newbutton" href="#"><button>Login</button></a>
            <a class="newbutton" href="#"><button>SignUp</button></a>
            </header>
                
                
            
             <br>

<?php

echo '<p style = "font-size:54px ; text-align: center; color: black;"><b><u>Your Trip Details</u></b></p> ';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentgo";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}



if (isset($_POST['Pickup_location'], $_POST['Drop_location'], $_POST['Date'], $_POST['Time']))

 {
    $stmt = $conn->prepare("INSERT INTO trip (Pickup_location, Drop_location, `Date`, `Time`) VALUES (?,?,?,?)");

    $stmt->bind_param("ssss", $_POST['Pickup_location'], $_POST['Drop_location'], $_POST['Date'], $_POST['Time']);

    if ($stmt->execute())
     {
        echo "Information submitted successfully!";
     } 

     else
     {
        echo "Error: " . $stmt->error;
     }

    $stmt->close();
}






if (isset($_POST['delete']))
 {
    $Oder_number = $_POST['delete'];

    $deleteStmt = $conn->prepare("DELETE FROM trip WHERE Oder_number = ?");
    $deleteStmt->bind_param("i", $Oder_number);

    if ($deleteStmt->execute())
    {
      echo ' <script>alert(\'Confirm your Login?\');</script>;';

      header("Location: index22.php");
       
    } 

    else
    
    {
        echo "Error deleting record: " . $deleteStmt->error;
    }

    $deleteStmt->close();

}





if (isset($_POST['update']))

 {
    $Oder_number = $_POST['update'];
    $Pickup_location = $_POST['Pickup_location'];
    $Drop_location = $_POST['Drop_location'];
    $Date = $_POST['Date'];
    $Time = $_POST['Time'];

    $updateStmt = $conn->prepare("UPDATE trip SET Pickup_location = ?, Drop_location = ?, `Date` = ?, `Time` = ? WHERE Oder_number = ?");
    $updateStmt->bind_param("ssssi", $Pickup_location, $Drop_location, $Date, $Time, $Oder_number);

    if ($updateStmt->execute())
    
    {
      echo '<p style = "font-size:28px ; text-align: center; color: black;"><b>Update successfully!</b></p> ';
    } 
    
    else 
    
    {
        echo "Error updating record: " . $updateStmt->error;
    }

    $updateStmt->close();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}





$sql = "SELECT * FROM trip ORDER BY Oder_number DESC LIMIT 1"; // Fetching the last entered data
$result = $conn->query($sql);

if ($result->num_rows > 0)


    
{
    echo '<table class = "display">';
    echo '<tr>';
    echo '<th style="border: 1px solid black; padding: 20px;">Pickup_location</th>';
    echo '<th style="border: 1px solid black; padding: 20px;">Drop_location</th>';
    echo '<th style="border: 1px solid black; padding: 30px;">Date</th>';
    echo '<th style="border: 1px solid black; padding: 30px;">Time</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc())
    
    {
        

        echo '<tr>';
        echo '<td style="border: 1px solid black; padding: 20px;">' . $row["Pickup_location"] . '</td>';
        echo '<td style="border: 1px solid black; padding: 20px;">' . $row["Drop_location"] . '</td>';
        echo '<td style="border: 1px solid black; padding: 30px; ">' . $row["Date"] . '</td>';
        echo '<td style="border: 1px solid black; padding: 30px; ">' . $row["Time"] . '</td>';

        echo '<td style="border: 1px solid black; padding: 20px;">';

        echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';

        echo '<input type="hidden" name="delete" value="' . $row["Oder_number"] . '">';
        echo '<button class = "pop" type="submit">Cansel Hire</button>';

        echo '</form>';
        
        echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';

        echo '<input type="hidden" name="update" value="' . $row["Oder_number"] . '">';

        echo 'Pickup Location:<input type="text" name="Pickup_location" value="' . $row["Pickup_location"] . '">';
        echo 'Drop Location:<input type="text" name="Drop_location" value="' . $row["Drop_location"] . '">';
        echo 'Date:<input type="date" name="Date" value="' . $row["Date"] . '">';
        echo 'Time:<input type="time" name="Time" value="' . $row["Time"] . '">';


        echo '<button class = "pop" type="submit">Edit Details</button>';
        echo '</form>';

        echo '</td>';
        echo '</tr>';

        
        
    }

    echo "</table>";
   
    

}

else

{
    echo "No details found in the Trip table.";
}

$conn->close();


echo '<a class = "pay"  href = "paymentPage.html" type="submit"><button>Make Payment</button>';

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