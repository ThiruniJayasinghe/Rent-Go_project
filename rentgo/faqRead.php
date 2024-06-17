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
        <title>Support team</title>
  
       
    
        <?php
      echo ' <link rel="stylesheet" href="style.css">';
     echo '<link rel="stylesheet" href="fQuections.css">';
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



$query = "SELECT faqQuections, faqID FROM quections ORDER BY faqID DESC LIMIT 1";
$result = $con->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastFaqQuestion = $row['faqQuections'];
    $lastFaqQuestionId = $row['faqID'];


echo '<div class = "FQuection-item">';
    echo '<div class = "FQuection">';
    echo '<p>Collected your Question:<b> ' . $lastFaqQuestion . '</b></p>';
    echo '<center><p>A answers has been sent to your<br/> registered email address...</p></center>';
    echo '</div>';

    

    if (isset($_POST['updateQuestion']) && isset($_POST['updatedQuestion'])) {
        $updateId = $_POST['faqQuestionId'];
        $updatedQuestion = $_POST['updatedQuestion'];

        $updateQuery = "UPDATE quections SET faqQuections = '$updatedQuestion' WHERE faqID = $updateId";
        $updateResult = $con->query($updateQuery);



        if ($updateResult) {
            echo '<div class = "massage">';
            echo '<p>Successfully updated the FAQ question.</p>';
            echo '</div>';
            $lastFaqQuestion = $updatedQuestion; // Update the displayed last question
        } else {
            echo '<div class = "massage">';
            echo '<p>Failed to update the FAQ question.</p>';
            echo '</div>';
        }
    } elseif (isset($_POST['faqQuestionId'])) {
        $deleteId = $_POST['faqQuestionId'];
        $deleteQuery = "DELETE FROM quections WHERE faqID = $deleteId";
        $deleteResult = $con->query($deleteQuery);

        if ($deleteResult) {
            echo '<div class = "massage">';
            echo '<p>Successfully deleted the FAQ question.</p>';
            echo '</div>';
        } else {
            echo '<div class = "massage">';
            echo '<p>Failed to delete the FAQ question.</p>';
            echo '</div>';
        }
        
    }
   

    // Update form
    echo '<form method="POST" action="">';
    echo '<input type="hidden" name="faqQuestionId" value="' . $lastFaqQuestionId . '">';
    echo '<input type="text" name="updatedQuestion" placeholder="Enter updated question" required>';
    echo '<input type="submit" name="updateQuestion" value="Update Your Quection">';
    echo '</form>';

    // Delete button
    echo '<form method="POST" action="">';
    echo '<input type="hidden" name="faqQuestionId" value="' . $lastFaqQuestionId . '">';
    echo '<input type="submit" value="Delete Your Quection">';
    echo '</form>';
} else {
    echo 'No data found.';
}
echo '</div>';

$con->close();


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