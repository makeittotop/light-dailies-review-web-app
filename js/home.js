$(document).ready(function() {
	data = '';
	// Numbering
	$("tr").find('td:first-child').each(function(index) {var number = index + 1; $(this).html(number);})
	// Highlight
	if(get_cookie("user") == "admin") {
		$("tr").click(function() {
		    $("tr").each(function(index) {
		        $(this).attr("class", "info");
		    });
		    //if(get_cookie("name") != )
		    $(this).attr("class", "highlighted");

		    var table_row_num = $(this).find('td:first-child').html();
		    console.log(table_row_num);

		    var payload = {
		    	'user': get_cookie("user"),
		    	'selected': table_row_num
		    };

	        payload_json = JSON.stringify(payload);
	        //console.log(payload_json);

		    websocket.send(payload_json);
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

        find_table_row(data.selected);

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

function find_table_row(val) {
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