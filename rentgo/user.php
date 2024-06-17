<?php

$Title=$_POST['Title'];
$Name=$_POST['Name'] ;
$email=$_POST['email'];
$dob=$_POST['dob'];
$Address=$_POST['Address'];
$_POST['a2']; $_POST['a3'];
$_POST['a4']; $_POST['a5'];
$selectcountry=$_POST['selectcountry'];
$mobile=$_POST['mobile'] ;$_POST['n'];
$companyName=$_POST['companyName'];
$Job=$_POST['Job'];
$companyAddress=$_POST['companyAddress']; $_POST['a2'] ;$_POST['a3'];
$_POST['a4'] ;$_POST['a5'];

$country=$_POST['country'];
$mobile1=$_POST['mobile1'] ;$_POST['b2'];

$preffered=$_POST['preffered'];

$conn =new mysqli('localhost','root','','user account');
if($conn->connect_error){
	
	die('Connection failed:'.$conn->connect_error);
	
}else{
	
	$stmt=$conn->prepare("insert into user(Title,Name,email,dob,Address,selectcountry,mobile,companyName,Job,companyAddress,country,mobile1,preffered)
	values(?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("sssssssssssss",$Title,$Name,$email,$dob,$Address,$selectcountry,$mobile,$companyName,$Job,$companyAddress,$country,$mobile1,$preffered);
	$stmt->execute();
	echo"Details entered.....";
	
	
	
	$stmt->close();
	$conn->close();
	
}













?>

