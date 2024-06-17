<?php

$conn =new mysqli('localhost','root','','rentgo');
if($conn->connect_error){

  die('Connection failed:'.$conn->connect_error);

}
else{

  
   
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    
        
            $query = "SELECT * FROM userc WHERE username='$username' AND password='$password'";
            $results = mysqli_query($conn, $query);
            if (mysqli_num_rows($results) == 1) {
              echo ' <script>alert(\'Confirm your Login?\');</script>;';
              echo "Log in succsessfully";
              header("Location: newHomePage.html");
              exit();


            }else {
              echo  '<script>alert(\'Incorrect username or password?\');</script>';
			  echo "<a href='clogin.html'>Login</a>";
              exit();
            }
        
       

}

?>
