

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
        <title>User Account</title>

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="userstyle.css">
		<link rel="stylesheet" href="update.css">

    </head>
        <body>
		<script src="script1.js"></script>

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

if (isset($_POST['Title'], $_POST['Name'], $_POST['email'],$_POST['dob'],$_POST['Address'],$_POST['selectcountry'],$_POST['mobile'],$_POST['companyName'],$_POST['Job'],$_POST['companyAddress'],$_POST['country'],$_POST['mobile1'],$_POST['preffered'])) {
    $stmt = $conn->prepare("INSERT INTO user (Title,Name,email,dob,Address,selectcountry,mobile,companyName,Job,companyAddress,country,mobile1,preffered) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssssssss",$_POST['Title'],$_POST['Name'],$_POST['email'],$_POST['dob'],$_POST['Address'],$_POST['selectcountry'],$_POST['mobile'],$_POST['companyName'],$_POST['Job'],$_POST['companyAddress'],$_POST['country'],$_POST['mobile1'],$_POST['preffered']);

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


$sql = "SELECT * FROM user";
$result = $conn->query($sql);



if (isset($_POST['delete'])) {
    $id = $_POST['delete'];

    $deleteStmt = $conn->prepare("DELETE FROM user WHERE id = ?");
    $deleteStmt->bind_param("i", $id);

    if ($deleteStmt->execute()) {
        echo "Deleted successfully!";
    } else {
        echo "Error deleting record: " . $deleteStmt->error;
    }

    $deleteStmt->close();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['update'])) {

$id = $_POST['update'];

$Title=$_POST['Title_update'];
$Name=$_POST['Name_update'] ;
$email=$_POST['email_update'];
$dob=$_POST['dob_update'];
$Address=$_POST['Address_update'];
$selectcountry=$_POST['selectcountry_update'];
$mobile=$_POST['mobile_update'] ;
$companyName=$_POST['companyName_update'];
$Job=$_POST['Job_update'];
$companyAddress=$_POST['companyAddress_update']; 


$country=$_POST['country_update'];
$mobile1=$_POST['mobile1_update'] ;

$preffered=$_POST['preffered_update'];

    $updateStmt = $conn->prepare("UPDATE user SET Title=?,Name=?,email=?,dob=?,Address=?,selectcountry=?,mobile=?,companyName=?,Job=?,companyAddress=?,country=?,mobile1=?,preffered=? WHERE id = ?");
    $updateStmt->bind_param("sssssssssssssi",$Title,$Name,$email,$dob,$Address,$selectcountry,$mobile,$companyName,$Job,$companyAddress,$country,$mobile1,$preffered,$id);

    if ($updateStmt->execute()) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record: " . $updateStmt->error;
    }

    $updateStmt->close();

    // Redirect to refresh the page
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

echo '<html>';
echo '<head>';
echo '<link rel="stylesheet" type="text/css" href="data.css">';
echo '<link rel="stylesheet" type="text/css" href="H&F.css">';
echo '</head>';
echo '<body>';
// Rest of PHP code...

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
	echo '<h1 class="h1"> User Update Details</h1>';
	
echo '<table style="margin-left: 20px;">'; 
  echo '<table class="user-table">';
  echo '<tr>';
  echo '<th>id</th>';
  echo '<th>Title</th>';
  echo '<th>Name</th>';
  echo '<th>email</th>';
  echo '<th>dob</th>';
  echo '<th>Address</th>';
  echo '<th>selectcountry</th>';
  echo '<th>mobile</th>';
  echo '<th>companyName</th>';
  echo '<th>Job</th>';
  echo '<th>companyAddress</th>';
  echo '<th>country</th>';
  echo '<th>mobile1</th>';
  echo '<th>preferred</th>';
  echo '</tr>';

  while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row["id"] . '</td>';
    echo '<td>' . $row["Title"] . '</td>';
    echo '<td>' . $row["Name"] . '</td>';
    echo '<td>' . $row["email"] . '</td>';
    echo '<td>' . $row["dob"] . '</td>';
    echo '<td>' . $row["Address"] . '</td>';
    echo '<td>' . $row["selectcountry"] . '</td>';
    echo '<td>' . $row["mobile"] . '</td>';
    echo '<td>' . $row["companyName"] . '</td>';
    echo '<td>' . $row["Job"] . '</td>';
    echo '<td>' . $row["companyAddress"] . '</td>';
    echo '<td>' . $row["country"] . '</td>';
    echo '<td>' . $row["mobile1"] . '</td>';
    echo '<td>' . $row["preffered"] . '</td>';
    echo '<td>';
   
    echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
    echo '<input type="hidden" name="update" value="' . $row["id"] . '">';
    echo 'Name: <input type="text" name="Title_update" value="' . $row["Title"] . '">';
    echo 'Phone: <input type="text" name="Name_update" value="' . $row["Name"] . '">';
    echo 'Address: <input type="text" name="email_update" value="' . $row["email"] . '">';
    echo 'Address: <input type="text" name="dob_update" value="' . $row["dob"] . '">';
    echo 'Address: <input type="text" name="Address_update" value="' . $row["Address"] . '">';
    echo 'Address: <input type="text" name="selectcountry_update" value="' . $row["selectcountry"] . '">';
    echo 'Address: <input type="text" name="mobile_update" value="' . $row["mobile"] . '">';
    echo 'Address: <input type="text" name="companyName_update" value="' . $row["companyName"] . '">';
    echo 'Address: <input type="text" name="Job_update" value="' . $row["Job"] . '">';
    echo 'Address: <input type="text" name="companyAddress_update" value="' . $row["companyAddress"] . '">';
    echo 'Address: <input type="text" name="country_update" value="' . $row["country"] . '">';
    echo 'Address: <input type="text" name="mobile1_update" value="' . $row["mobile1"] . '">';
    echo 'Address: <input type="text" name="preffered_update" value="' . $row["preffered"] . '"><br>';
    echo '<button type="submit" class="c">Update</button><br>';
    echo '</form>';
	
	 echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
    echo '<input type="hidden" name="delete" value="' . $row["id"] . '">';
    echo '<button type="submit" class="a">Delete</button>';
    echo '</form>';
	
    echo '</td>';
    echo '</tr>';
  }

  echo '</table>';
}

 else {
    echo "No data found in the user table.";
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