$(document).ready(function() {
	data = '';
	// Numbering
	$("tr").find('td:first-child').each(function(index) {var number = index + 1; $(this).html(number);})
	// Users addition
	users = ['domingos', 'ashish', 'ravi', 'prashanth', 'oliver'];
	$( "tr td:nth-last-child(3)" ).each(function(index){
		var i = Math.floor(Math.random() * 4) ;
		$(this).html(users[i]);
	})


	// Highlight
	if(get_cookie("user") == "admin") {
		$("tr").click(function() {
		    $("tr").each(function(index) {
		        $(this).attr("class", "info");
		    });
		    //if(get_cookie("name") != )
		    $(this).attr("class", "highlighted");

		    var table_row_num = $(this).find('td:first-child').html();
		    var table_data_user = $(this).find('td:nth-last-child(3)').html();

		    var payload = {
		    	'user': get_cookie("user"),
		    	'selected': table_row_num,
		    	'row_user': table_data_user
		    };

		    //console.log(payload);

	        payload_json = JSON.stringify(payload);
	        //console.log(payload_json);

		    websocket.send(payload_json);

	        var url = 'http://172.16.15.26/php/xmpp_sendmessage.php';
	        // Use ajax to jab the user
	      	var posting = $.post( url, {to: table_data_user} );
	      	// Put the results in a div
	      	posting.done(function(data) {
	        	console.log(data);
	        	d = JSON.parse(data);

	        	if(d.status == 0) {
	            	//$("#signin-button").after(sprintf(alert_message, "User not found."));
	        	}
	        	else if(d.status == 1) {
	            	//window.location.href = "home.php";
	        	}
	        	else {
	            	//$("#signin-button").after(sprintf(alert_message, "Invalid password, please retry."));
	        	}
	      	});		    
		});
	}

	// Web socket
	websocket = server_setup();
});

function server_setup() {
    //Open a WebSocket connection.
    var wsUri = "ws://172.16.15.26:8080/server";   
    websocket = new WebSocket(wsUri); 
    
    //Connected to server
    websocket.onopen = function(ev) {
        console.log('Connected to server');

    }
    
    //Connection close
    websocket.onclose = function(ev) { 
        alert('Disconnected');
    };
    
    //Message Receved
    websocket.onmessage = function(ev) { 
    	console.log('Message: '+ ev.data);
        data = JSON.parse(ev.data);
        highlight_table_row(data.selected);

        //Only through the admin
        	        console.warn("foo");

        if(get_cookie('user') == 'admin') {

      	}
    };
    
    //Error
    websocket.onerror = function(ev) { 
        alert('Error '+ ev.data);
    };
    
    return websocket;
     //Send a Message
    //$('#send').click(function(){ 
     //   var mymessage = 'This is a test message'; 
     //   websocket.send(mymessage);
    //});
}

function get_cookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') 
        	c = c.substring(1);
        if (c.indexOf(name) != -1) 
        	return c.substring(name.length,c.length);
    }
    return "";
} 

function highlight_table_row(val) {
	$("tr").each(function(index) {
		var td = $(this).find('td:first-child');
		if(td.html() == val) {
			console.log(td.attr("class"));
			$(this).attr("class", "highlighted");
		}
		else {
			$(this).attr("class", "info");
		}
	})
}