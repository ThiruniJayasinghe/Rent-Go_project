document.getElementById('payment-form').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission

  // Perform AJAX request or form validation here
  
  // Simulating a successful payment
  var paymentSuccessful = true; // Replace with actual logic or result

  if (paymentSuccessful) {

    window.location.href = "payment successfully.html"; // Redirect to payment success page
    document.getElementById('payment-form').reset();// reset the data in form
  } else {
    // Handle payment failure
    alert("Payment failed. Please try again.");
  }
});
