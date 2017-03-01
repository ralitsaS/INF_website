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

$user = mysql_real_escape_string($_POST['pass_name']);

$check = mysql_query("SELECT * FROM users WHERE username = '$user'");

if(mysql_num_rows($check) == 1)
    {
       $row = mysql_fetch_array($check);
       $email = $row['email'];
	   $key = $row['sec_key'];
	  
       $to=$email;
            $subject="Forget Password Virtual Safari";
            $from = 'admin@vs.bg';
            $body='Hi,  <br><br>Click here to reset your password  http://localhost/naduhaise/reset.php?username='.$user.' and your secutiry key is '.$key.'. thank you.';
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
 
 
			// set up valid mail in php.ini file---mail function
           // mail($to,$subject,$body,$headers);
		?>
		
		<script type="text/javascript">

alert("Email sent to <?php echo $email ?>.");

location = "http://localhost/naduhaise/index.php";

</script>

<?php
        
    }
?>