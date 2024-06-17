<?php

if(isset($_POST['setPAY'])){
    $faqQuections = $_POST['faqQuections'];

    $con = new mysqli('localhost','root','','rentgo');
    // Check connection
    if($con->connect_error){
        die("Connection failed: " . $con->connect_error);
    }
    else{
        $stmt = $con->prepare("insert into quections (faqQuections) values (?)");
        $stmt->bind_param("s", $faqQuections);
        $stmt->execute();
        echo "Details entered...";
        header("Location: faqRead.php");
        $stmt->close();
        $con->close();
    }
}
?>

