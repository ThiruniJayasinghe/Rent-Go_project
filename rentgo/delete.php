<?php

$conn =new mysqli('localhost','root','','rentgo');
if($conn->connect_error){

  die('Connection failed:'.$conn->connect_error);

}
else{

  
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  
          $sql = "SELECT password
                  FROM userc WHERE 
                  username='$username'AND password='$password'";
          
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) === 1){

        
            
            $sql_2 = "DELETE FROM userc
                      WHERE  username='$username'AND password='$password'";
           
             mysqli_query($conn, $sql_2);
             echo 'echo "<script>alert(\'Confirm your Login?\');</script>";';
            //echo "Delete successfully";
            header("Location: homePage.html");
            exit();
  
          
        }
          else {
            echo '<script>alert(\'Incorrect username or password?\');</script>';
            echo "<a href='delete.html'>Delete Account</a>";
            exit();
          }
  
      }