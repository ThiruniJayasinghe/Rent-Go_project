<!DOCTYPE html>
<html>
   
    <head>
        <title>Kanjana : Rent & Go : Header And Footer</title>

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="ride.css">
        <script src="validate.js"></script>
        
     

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

<!-- scheduled ride-->

<h1><u><b>Scheduled Ride</b></u></h1></br></br>

<form id = "data" method = "POST" action = "read3.php" onsubmit="validateForm(event)">


  
  <div class="border1">

    <div class="pickup">

      <p style="font-size: 32px;"><b>PICKUP LOCATION</b></p>

      <div class="search">
        <input type="text" id="pickupLocation" name="Pickup_location" onclick="searchResults()" placeholder="Enter pickup location" required>
      </div>

    </div>

    <div class="drop">

      <p style="font-size:32px;"><b>DROP LOCATION</b></p>

      <div class="search">

        <input type="text" id="dropLocation" name="Drop_location" onclick="searchResults()" placeholder="Enter drop location" required>
      </div>

    </div>

  </div>

  <div class="border2">

    <div class="date">

      <p style="font-size: 32px;"><b>SET DATE</b></p>
      <input type="date" id="rideDate" name="Date" required>

    </div>

    <div class="time">

      <p style="font-size: 32px;"><b>SET TIME</b></p>
      <input type="time" id="rideTime" name="Time" required>

    </div> 

    </br>

  </div>


  <button class = "button" type="submit">Submit</button>

  
  
</form>


 



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