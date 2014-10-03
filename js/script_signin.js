$(document).ready(function() {
    $("#signin-button").click(function(event) {
        var username = $("#username").val();
        var password = $("#password").val();

        if(!username || !password) {
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
            console.log("Username: " + username);
            console.log("Password: " + password); 
        }
   });
});

function incompleteFieldsAlert(field) {
    alert("Please fill in your " + field); 
    event.preventDefault();
}
