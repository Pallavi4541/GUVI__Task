$(document).ready(function() {
    $("#confirmDetails").click(function(e) {
    
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var data = {
            email: $("#email").val(),
            firstName: $("#firstName").val(),
            lastName: $("#lastName").val(),
            dob: $("#dob").val(),
            age:$("#age").val(),
            phone: $("phone").val(),
            submit_details:"submit_details"
          };
        
        $.ajax({
            type: "POST",
            url: 'php/profile.php',
            data: data, // serializes the form's elements.
            success: function(data)
            {
              alert(data); // show response from the php script.
              if(data=="success"){
                window.location.href = "/profile.html"
              }
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error('Error: ' + status + ' - ' + error);
              }
              
        });
    
        e.preventDefault();
        
        
    });
    });

    function showUpdateForm() {
      var updateFormContainer = document.getElementById('updateFormContainer');
      updateFormContainer.style.display = 'block';

      // Retrieve user data from localStorage
      var username = localStorage.getItem('username');
      var password = localStorage.getItem('password');

      // You can populate the form fields with existing user data here.
      // For simplicity, let's assume the name, age, and contact are retrieved from the server.
      document.getElementById('name').value = username;
      document.getElementById('age').value = 20; // Replace with actual user data
      document.getElementById('contact').value = 9876543210; // Replace with actual user data
  }

  document.getElementById('updateForm').addEventListener('submit', function(event) {
      event.preventDefault();

      // You can add JavaScript code here to handle profile update submission,
      // such as sending data to a server using AJAX or updating the user's details.
      // For this example, we'll simply log the form data to the console.

      var formData = new FormData(event.target);
      formData.forEach(function(value, key){
          console.log(key + ': ' + value);
      });

      // Close the update form after submission
      document.getElementById('updateFormContainer').style.display = 'none';
  });

  function hideForm(){
    var updateFormContainer = document.getElementById('updateFormContainer');
    updateFormContainer.style.display = 'none';
  }