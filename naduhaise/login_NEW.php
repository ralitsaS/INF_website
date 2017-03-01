<?php
session_start();
require("db_info_NEW.php");




if(!empty($_POST['username']) && !empty($_POST['password']))
{
    $user = mysql_real_escape_string($_POST['username']);
    $pass = mysql_real_escape_string($_POST['password']);
     $encrypt=md5($pass);
	 //echo $user;
    $checklogin = mysql_query("SELECT * FROM users WHERE username = '$user' AND password = '$encrypt'");
     
    if(mysql_num_rows($checklogin) == 1)
    {
       $row = mysql_fetch_array($checklogin);
       // $email = $row['EmailAddress'];
	   $priv = $row["type"];
	   //echo $priv;
        // $user_type=mysql_query("SELECT type FROM users WHERE username = '$user'");
		 $_SESSION['Priv'] = $priv;
		// echo $_SESSION['Priv'];
        $_SESSION['Username'] = $user;
       // $_SESSION['EmailAddress'] = $email;
        $_SESSION['LoggedIn'] = 1;
         
        $message= "Success";
		
        header("Location: http://localhost/naduhaise/index.php"); /* Redirect browser */
		exit();
    }
    else
    {
        $message= "error";
		//echo "echo";
		//header("Location: http://localhost/naduhaise/home.html"); /* Redirect browser */
		//echo "<script type='text/javascript'>alert('$message');</script>";
		?>
		
		<script type="text/javascript">

alert("Wrong username or password.");

location = "http://localhost/naduhaise/index.php";

</script>

<?php
    }
}

?>