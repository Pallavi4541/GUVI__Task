$(document).ready(function() {
  $("#submit").click(function(e) {
  
      e.preventDefault(); // avoid to execute the actual submit of the form.
      var data = {
          email: $("#email").val(),
          username: $("#username").val(),
          password: $("#password").val(),
          confirm_password: $("#repeat_password").val(),
          submit:"submit"
        };
      
      $.ajax({
          type: "POST",
          url: 'php/register.php',
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