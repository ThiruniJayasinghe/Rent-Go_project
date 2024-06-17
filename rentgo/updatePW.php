<?php

$conn =new mysqli('localhost','root','','rentgo');
if($conn->connect_error){

  die('Connection failed:'.$conn->connect_error);

}
else{

  
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $currentpassword = mysqli_real_escape_string($conn, $_POST['currentpassword']);
    $npassword = $_POST['npassword']; 
    $cpassword = $_POST['cpassword']; 
  
          $sql = "SELECT password
                  FROM userc WHERE 
                  username='$username'AND password='$currentpassword'";
          
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) === 1){

        
            
            $sql_2 = "UPDATE userc
                      SET password='$npassword'
                      WHERE username='$username'";
           
           mysqli_query($conn, $sql_2);
           echo '<script>alert(\'Confirm your Update?\');</script>;';
           
            header("Location: clogin.html");
            exit();
  
          
        }
          else {
            echo  '<script>alert(\'Incorrect username or password?\');</script>';
            echo "<a href='updatePW.html'>Update Password</a>";
            exit();
          }
  
      }
  
  

?>