

function validateForm(event)
 {
   event.preventDefault(); // Prevent form submission

   var pickupLocation = document.getElementById("pickupLocation").value;
   var dropLocation = document.getElementById("dropLocation").value;

   if (pickupLocation === "" || dropLocation === "")
    {

     alert("Error: Please fill in both pickup and drop locations.");


    } 
    
    else if (pickupLocation === dropLocation)
     {
       alert("Error: Pickup and drop locations cannot be the same.");
     } 
   
   else 
     {
       document.getElementById("data").submit(); // Submit the form
     }
 }
