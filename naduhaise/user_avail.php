<?php
require("db_info_NEW.php");

// Opens a connection to a MySQL server
$connection=@mysql_connect('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}


$username = $_POST['reg_username'];

$checkusername = mysql_query("SELECT * FROM users WHERE username = '".$username."'");
      
     if(mysql_num_rows($checkusername) == 0)
     {
        
        $isAvailable = true;
     }
     else
     {
		 $isAvailable = false;
	 }

// Finally, return a JSON
echo json_encode(array(
    'valid' => $isAvailable,
));

?>