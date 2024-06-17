<?php


if(isset($_POST['setPAY'])){


	 
	$chName=$_POST['holderName'];
	$cardNumber=$_POST['crdNumber'];
	$expDate=$_POST['expyDate'];
	$cvv=$_POST['cvvNUM'];
     $amount=$_POST['amount'];
	 
}
 $con=new mysqli('localhost','root','','rentgo');
// Check connection
if($con->connect_error){
die("Connection failed: " . $con->connect_error);

}
else{
     
     $stmt = $con->prepare("insert into payment(chName,cardNumber,expDate,cvv,amount)
     values(?,?,?,?,?)");
     $stmt->bind_param("ssiis",$chName,$cardNumber,$expDate,$cvv,$amount);
     $stmt->execute();
     echo"Details entered.....";
     header("Location: paymentsuccess.php");
     $stmt->close();
     $con->close();
    


     
   
};
?>
