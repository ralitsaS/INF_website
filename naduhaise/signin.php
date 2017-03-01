<?php 
session_start();
require("db_info_NEW.php");




	$name = mysql_real_escape_string($_POST['reg_name']);
    $user = mysql_real_escape_string($_POST['reg_username']);
    $pass = mysql_real_escape_string($_POST['reg_password']);
	$pass2 = mysql_real_escape_string($_POST['reg_2password']);
    $email = mysql_real_escape_string($_POST['reg_mail']);
	$encrypt=md5($pass);
	$key=rand(1000000000, 2000000000);
     
        $registerquery = mysql_query("INSERT INTO users (name, username, password, email, sec_key) VALUES('".$name."', '".$user."', '".$encrypt."', '".$email."', '".$key."')");
		
		
        if($registerquery)
        {
            ?>
	<script type="text/javascript">

alert("Your account was successfully created.");

location = "http://localhost/naduhaise/index.php";

</script>
<?php
            
        }
        else
        {
            
            ?>
	<script type="text/javascript">

alert("YSomething went wrong.");

location = "http://localhost/naduhaise/index.php";

</script>
<?php   
        }       
     
	

    ?>
    