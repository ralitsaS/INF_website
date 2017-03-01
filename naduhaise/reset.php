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

 if(isset($_POST['submit'])) {       
    
        //$encrypt = mysqli_real_escape_string($connection,$_GET['encrypt']);
        //$check = mysql_query("SELECT * FROM users WHERE username = '" . $_GET['username'] . "'");
        //$result = mysqli_query($connection,$query);
        //$Results = mysqli_fetch_array($check);
        //if(count($Results)==1)
       // {
		   
		   $crypt=md5($_POST['new_pass']) ;
		   
			$sql = "UPDATE users SET password='$crypt' WHERE username='" . $_GET['username'] . "' AND sec_key='" . $_POST['s_key'] . "'";
			mysql_query($sql);
			$change = mysql_query($sql);
			if ( $change ) {
				echo "changed pass";
			}
			else{
				echo "oops";
			}
       // }
       // else
       // {
       //     $message = 'Invalid key please try again. <a href="http://demo.phpgang.com/login-signup-in-php/#forget">Forget Password?</a>';
       // }
    
 }


?>
<!DOCTYPE html>
<html lang="en">
  <head></head>
  <body>
<form id="resetform" method="post" class="form-horizontal" action="">
				
				
					<div class="form-group">
                        <label class="col-md-3 control-label">Key: </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="s_key" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">New Password: </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="new_pass" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-3">
                            <input type="submit" class="btn btn-default" name="submit" value="Reset Password"/>
                        </div>
                    </div>
                </form>
				
				
				
				</body>
				</html>