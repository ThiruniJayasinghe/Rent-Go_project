<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="dstyle.css">
<style>


</style>
</head>
<body class="driverbody">
   
<header class="header">
              <a href="homepage.html" > <img class="logo" src="Images/rentgonew.png" width="160px" alt="logo"> </a> <br/><br/><br/>
            
            
                <nav>
                   <ul class="navigation">
                    <li><a href="newHomepage.html">Home</a></li>
                    <li><a href="#">Vehicle Rent</a></li>
                    <li><a href="instant.html">Instant Ride</a></li>
                    <li><a href="https://www.google.com">Contact Us</a></li>
                    <li><a href="https://www.google.com">FAQ</a></li>

                  
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
                
                
            
             <br>





    
    <form method="POST" action="driverdatashow.php">

       
       <div class="driverenter">

                <lable class="dtableheader">ENTER DRIVER DETAILS</lable><br><br>
                <label for="driver_name">Driver Name:</label>
                <input type="text" id="driver_name" name="driver_name" placeholder="Enter driver name.." required><br><br>

                <label for="driver_phone">Driver Phone Number:</label>
                <input type="tel" id="driver_phone" name="driver_phone" placeholder="Enter driver phone number.."required><br><br>

                <label for="driver_address">Driver Address:</label>
                <input type="text" id="driver_address" name="driver_address" placeholder="Enter driver address.."required><br><br>

                <input type="submit" value="Submit">
        </div>
    </form>








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
</html>
























