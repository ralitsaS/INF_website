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

$sql = "SELECT * FROM users";

 $result = mysql_query($sql) or die('Invalid query: ' .mysql_error());

//if (mysql_num_rows($result) > 0) {
    echo "<table><tr><th>Name</th><th>UserName</th><th>Email</th></tr>";
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["username"]."</td><td>".$row["email"]."</td></tr>";
    }
    echo "</table>";
/*} else {
    echo "0 results";
}
*/
?>