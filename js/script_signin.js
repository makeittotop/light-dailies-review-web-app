d = '';
alert_message =  '<div class="alert alert-error alert-dismissable" style="margin-top:\"100px\";">'+
    '<button type="button" class="close" ' + 
    'data-dismiss="alert" aria-hidden="true">' + 
    '&times;' + 
    '</button>' + 
    '%s' + 
    '</div>';

$(document).ready(function() {
    $("#signin-form").submit(function(event) {
      // Stop form from submitting normally
      event.preventDefault();
      // Get some values from elements on the page:
      var $form = $(this),
        name = $form.find("input[name='username']").val(),
        pass = $form.find("input[name='password']").val(),
        url = $form.attr("action");
      // Send the data using post
      var posting = $.post( url, { username: name, password: pass } );
      // Put the results in a div
      posting.done(function(data) {
        //console.log(data);
        d = JSON.parse(data);

        if(d.status == 0) {
            $("#signin-button").after(sprintf(alert_message, "User not found."));
        }
        else if(d.status == 1) {
            window.location.href = "home.php";
        }
        else {
            $("#signin-button").after(sprintf(alert_message, "Invalid password, please retry."));
        }
      });
    });

    $("#signin-button").click(function(event) {
        var username = $("#username").val();
        var password = $("#password").val();
        if(!username || !password) {
	    $(this).after(sprintf(alert_message, "Fill in the incomplete fields first"));
            event.preventDefault();
        }
        else {
            //console.log("Username: " + username);
            //console.log("Password: " + password); 
        }
   });
});
