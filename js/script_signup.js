$(document).ready(function() {
	$("#login-page-link").hide();
	
	$("#signup-form").submit(function( event ) {
	 
	  // Stop form from submitting normally
	  event.preventDefault();
	 
	  // Get some values from elements on the page:
	  var $form = $(this),
	    name = $form.find( "input[name='username']" ).val(),
	    pass = $form.find("input[name='password']").val(),
	    url = $form.attr( "action" );
	 
	  // Send the data using post
	  var posting = $.post( url, { username: name, password: pass } );
	 
	  // Put the results in a div
	  posting.done(function(data) {
	  	var d = JSON.parse(data);
	    if(d.ok == true)
	    	console.log(true);
	        var text = $(".form-signup-heading").html();
			$(".form-signup-heading").text(text + " Successful!");	        
	        /*
	        $("#username").attr("disabled", "disabled");
	        $("#password").attr("disabled", "disabled");
	        $("#confirm-password").attr("disabled", "disabled");
	        $("#signup-button").attr("disabled", "disabled");
			*/
	        $("#signup-div").hide();

	        $("#login-page-link").show();
	    //$( "#result" ).empty().append( content );
	  });
	});

    $("#signup-button").click(function(event) {
        var username = $("#username").val();
        var password = $("#password").val();
        var confirm_password = $("#confirm-password").val();

        if(!username || !password || !confirm_password) {
	    $(this).after(
		'<div class="alert alert-error alert-dismissable" style="margin-top:\"100px\";">'+
		    '<button type="button" class="close" ' + 
			    'data-dismiss="alert" aria-hidden="true">' + 
			'&times;' + 
		    '</button>' + 
		    'Fill in the incomplete fields first' + 
		 '</div>');
            event.preventDefault();
        }
        else {
            //console.log("Username: " + username);
            //console.log("Password: " + password); 
			if(password != confirm_password) {
			    $(this).after(
				'<div class="alert alert-error alert-dismissable" style="margin-top:\"100px\";">'+
				    '<button type="button" class="close" ' + 
					    'data-dismiss="alert" aria-hidden="true">' + 
					'&times;' + 
				    '</button>' + 
				    'Passwords doesn\'t match' + 
				 '</div>');
			    event.preventDefault();
			}
        }

   });
});

