<?php 

 

   
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $phoneNumber=$_POST['pno'];
    $address= $_POST['address'];
    $email = $_POST['email'];
    $userName = $_POST['username'];
    $password = $_POST['pwd']; 

    //database connection
    $conn =new mysqli('localhost','root','','rentgo');
     if($conn->connect_error){
	
	   die('Connection failed:'.$conn->connect_error);
	
    }
    else{
	
            $stmt=$conn->prepare("insert into userc(firstName,lastName,phoneNumber,address,email,userName,password)
            values(?,?,?,?,?,?,?)");
            $stmt->bind_param("ssissss",$firstName,$lastName,$phoneNumber,$address,$email,$userName,$password);
            $stmt->execute();
            echo"Details entered.....";
            header("Location: clogin.html");
            $stmt->close();
            $conn->close();
	
     }






?>