

    
        
        function validateForm(event) {
          var pickupLocation = document.getElementById("pickupLocation").value;
          var dropLocation = document.getElementById("dropLocation").value;
          var rideDate = document.getElementById("rideDate").value;
          var rideTime = document.getElementById("rideTime").value;
    

          if (pickupLocation === "" || dropLocation === "" || rideDate === "" || rideTime === "")
           {
            event.preventDefault();

            alert("Please fill in all the required fields.");

           } else if (pickupLocation === dropLocation)
            {
            event.preventDefault(); 

            alert("Invalid name: Pickup and drop locations cannot be the same.");

            }
        }
      
      
      
      
      