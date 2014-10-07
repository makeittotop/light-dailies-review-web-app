$(document).ready(function() {
	// Numbering
	$("tr").find('td:first-child').each(function(index) {var number = index + 1; $(this).html(number);})
	// Highlight
	$("tr").click(function() {
	    $("tr").each(function(index) {
	        $(this).attr("class", "info");
	    });
	    $(this).attr("class", "highlighted");

	    var table_row_num = $(this).find('td:first-child').html();
	    console.log(table_row_num);

	    var payload = {
	    	'user': get_cookie("user"),
	    	'selected': table_row_num
	    };

        payload_json = JSON.stringify(payload);
        console.log(payload_json);

	    websocket.send(payload_json);
	});

	// Web socket
	websocket = web_socket_demo();
	        //var mymessage = 'This is a test message'; 
        //websocket.send(mymessage);
});

function web_socket_demo() {
    //Open a WebSocket connection.
    var wsUri = "ws://172.16.15.26:8080/chat";   
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
        alert('Message '+ ev.data);
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