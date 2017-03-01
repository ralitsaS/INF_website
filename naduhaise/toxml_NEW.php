<?php
require("db_info_NEW.php");


function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$htmlStr);
$xmlStr=str_replace('"','&quot;',$htmlStr);
$xmlStr=str_replace("'",'&#39;',$htmlStr);
$xmlStr=str_replace("&",'&amp;',$htmlStr);
return $xmlStr;
}

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

// Select all the rows in the markers table
$query = "SELECT * FROM animal WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}


header("Content-type: text/xml");

echo "<?xml version='1.0' ?>"; 

// Start XML file, echo parent node

echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'sp_kind="' . parseToXML($row['sp_kind']) . '" ';
  echo 'whole_name="' . parseToXML($row['whole_name']) . '" ';
  echo 'sex="' . $row['sex'] . '" ';
  echo 'age="' . $row['age'] . '" ';
  echo 'uploaded_by="' . parseToXML($row['uploaded_by']) . '" ';
  echo 'description="' . parseToXML($row['description']) . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>
