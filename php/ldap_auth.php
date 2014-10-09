<?php
// basic sequence with LDAP is connect, bind, search, interpret search
// result, close connection

error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', true);

$username = $_GET['user'];
//$pass = $_GET['pass'];

echo "<h3>LDAP query test</h3>";
echo "Connecting ...";

$ldap_host = "172.16.10.10";
$ldap_port = 389;

try {
    $ds=ldap_connect($ldap_host);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    die("Could not connect to $ldaphost");  // must be a valid LDAP server!
}

echo "connect result is " . $ds . "<br />";

if ($ds) { 
    echo "Binding ..."; 
    $r=ldap_bind($ds, "abhishek@barajoun.local", "qwerty12345");     // this is an "anonymous" bind, typically
                           // read-only access
    echo "Bind result is " . $r . "<br />";

    echo "Searching for (sn=S*) ...";
    // Search surname entry
    //$sr=ldap_search($ds, "o=My Company, c=US", "sn=S*"); 
    $sr=ldap_search($ds, "OU=BarajounUSERS,DC=barajoun,DC=local", '(sAMAccountName='.$username.')'); 
     
    echo "Search result is " . $sr . "<br />";

    echo "Number of entries returned is " . ldap_count_entries($ds, $sr) . "<br />";

    echo "Getting entries ...<p>";
    $info = ldap_get_entries($ds, $sr);
    echo "Data for " . $info["count"] . " items returned:<p>";

    for ($i=0; $i<$info["count"]; $i++) {
        echo "dn is: " . $info[$i]["dn"] . "<br />";
        echo "first cn entry is: " . $info[$i]["cn"][0] . "<br />";
        echo "first email entry is: " . $info[$i]["mail"][0] . "<br /><hr />";
    }

    echo "Closing connection";
    ldap_close($ds);

} else {
    echo "<h4>Unable to connect to LDAP server</h4>";
}
?>