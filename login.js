$(document).ready(function() {
    $("#submit-login").click(function(e) {
    
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var data = {
            email: $("#email").val(),
            password: $("#password").val(),
            login:"login"
          };
        
        $.ajax({
            type: "POST",
            url: 'php/login.php',
            data: data, // serializes the form's elements.
            success: function(data)
            {
              alert(data); // show response from the php script.
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error('Error: ' + status + ' - ' + error);
              }
              
        });
    
        e.preventDefault();
        
        
    });
    });