<?php
    
    $Pickup_Location=$_POST['pickup'];
     $Drop_Location=$_POST['drop'];
 
 
  $con=new mysqli('localhost','root','','rentgo');

 // Check connection

 if($con->connect_error)   
 {
 die("Connection failed: " . $con->connect_error);
 
 }
 else{
      
      $stmt = $con->prepare("insert into instant(Pickup_Location,Drop_Location)
      values(?,?)");
      $stmt->bind_param("ss", $Pickup_Location,$Drop_Location);
      $stmt->execute();
      echo"Details entered.....";
      header ("Location : payment.html");
      $stmt->close();
      $con->close();

     
 }
 ?> 