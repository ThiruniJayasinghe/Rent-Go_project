<?php
$con=new mysqli("localhost","root","","rentgo");
if($con->connect_error)
{
die("Connection failed: ". $con->connect_error);
}
?>
<!DOCTYPE html>
<html>
   
    <head>
        <title>Payment successfully</title>

       
    
        <?php
      echo ' <link rel="stylesheet" href="style.css">';
      echo '<link rel="stylesheet" type="text/css" href="pstyle.css">';
      ?>
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

<!------------------------------------------------------------------------------------------------------------------------------------------------->
<?php
function readData()
{
global $con;
$sql = "SELECT * FROM payment ORDER BY pID DESC LIMIT 1";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // Fetch the last row
    $row = $result->fetch_assoc();

    // Access the values of the last row
    $chName = $row['chName'];
    $cardNumber = $row['cardNumber'];
    $amount = $row['amount'];
   

    // Display the values

    echo '<div class="success">';
    echo '<img src="Images/PAYMENT-SUCCESS.png" width="400px" alt="payment">';
    echo "<h2>Your Payment Details:</h2><br>";
    echo "Cardholder Name:<b> " . $chName . "</b><br>";
    echo "Card Number:<b> " . $cardNumber . "</b><br><br>";
    echo "Paid Amount:<b> " . $amount . "</b><br>";
    echo ' <p>A confirmation email has been sent<br/> to your registered email address.</p>';
    echo '</div>';
} else {
    echo "No payment data found.";
}
$con->close();
}
readData();
echo '<script>alert(\'Confirm your payment?\');</script>';
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