<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	if(empty($_SESSION['LoggedIn'])||($_SESSION['Priv']=="user"))
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('These Are Not the Droids You Are Looking For. SHOO!')
    window.location.href='http://localhost/naduhaise/index.php';
    </SCRIPT>");
		
	}
	
include("testPage.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
<style>


.page {
     margin-top: 60px;
	 position: relative;
 }
 
.sidebar {
     position: fixed;
     width: 200px;
     height: 100%;
     background: #000;
 }
 
 .sidebar_cont {
    margin-top: 60px;
 }
 
 .container {
     margin-left: 200px;
     width: auto;
     height: 100%;
	 position: relative;
	 overflow: hidden;
	 margin-top: 60px;
 }
 
 .list-group-item {
	 background: #000;
 }
 
 #m_entry, #m_users{
	 width: 100%;
    height: 100%;
    overflow: auto;
 }

</style>
</head>

<body>


<div class="page">
        <!-- Sidebar -->
        <div class="sidebar">
            
               <div class="list-group sidebar_cont">
                
                    <a href="#m_users" class="list-group-item">Manage Users</a>
                
               
                    <a href="#m_entry" class="list-group-item">Manage Entries</a>
                
                </div>
            
        </div> 
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
					<div id="m_users"></br></br></br>
                        <h1>Manage Users</h1>
                        
						<?php
require("db_info_NEW.php");


if(isset($_POST['delete'])) {
	
$sql="DELETE FROM users WHERE username='" . $_POST['name_user'] . "'";
mysql_query($sql);

$sql_x="DELETE FROM animal WHERE uploaded_by='" . $_POST['name_user'] . "'";
mysql_query($sql_x);
}

if(isset($_POST['change'])) {
	if($_POST['chng_type']=='admin'){
		$sql_y = "UPDATE users SET type='user' WHERE username='" . $_POST['name_user'] . "'";
	}
	else{
		$sql_y = "UPDATE users SET type='admin' WHERE username='" . $_POST['name_user'] . "'";
	}
mysql_query($sql_y);

}


$sql = "SELECT * FROM users";

 $result = mysql_query($sql) or die('Invalid query: ' .mysql_error());

//if (mysql_num_rows($result) > 0) {
    echo "<table class=\"table table-striped\"><thead class=\"thead-inverse\"><tr><th>Name</th><th>UserName</th><th>Email</th><th>Privilage</th><th>Switch</th><th>Delete</th></tr></thead>";
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["username"]."</td><td>".$row["email"]."</td><td>".$row["type"]."</td>";
		echo "<td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"chng_type\" value=\"".$row["type"]."\" ><input type=\"hidden\" name=\"name_user\" value=\"".$row["username"]."\" ><input type=\"submit\" name=\"change\" value=\"Change\"></form></td>";
		echo "<td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"name_user\" value=\"".$row["username"]."\" ><input type=\"submit\" name=\"delete\" value=\"Delete\"></form></td></tr>";
    }
    echo "</table>";
/*} else {
    echo "0 results";
}
*/
?>
</div>
</br></br></br></br></br></br></br></br>
<div id="m_entry">
<h1>Manage Entries</h1>
                        
<?php

if(isset($_POST['del_anml'])) {
	
$sql_x="DELETE FROM animal WHERE index_n='" . $_POST['anml_id'] . "'";
mysql_query($sql_x);

$sql_y = "UPDATE users SET contr_num=contr_num-1 WHERE username='" . $_POST['up_by'] . "' AND contr_num>0 ";
mysql_query($sql_y);

}


$sql = "SELECT * FROM animal";

 $result = mysql_query($sql) or die('Invalid query: ' .mysql_error());

//if (mysql_num_rows($result) > 0) {
    echo "<table class=\"table table-striped\"><thead class=\"thead-inverse\"><tr><th>Name</th><th>Class</th><th>Sex</th><th>Age</th><th>Uploaded By</th><th>Delete</th></tr></thead>";
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
        echo "<tr><td>".$row["whole_name"]."</td><td>".$row["sp_kind"]."</td><td>".$row["sex"]."</td><td>".$row["age"]."</td><td>".$row["uploaded_by"]."</td>";
		//echo "<td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"chng_type\" value=\"".$row["type"]."\" ><input type=\"hidden\" name=\"name_user\" value=\"".$row["username"]."\" ><input type=\"submit\" name=\"change\" value=\"Change\"></form></td>";
		echo "<td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"up_by\" value=\"".$row["uploaded_by"]."\" ><input type=\"hidden\" name=\"anml_id\" value=\"".$row["index_n"]."\" ><input type=\"submit\" name=\"del_anml\" value=\"Delete\"></form></td></tr>";
    }
    echo "</table>";
/*} else {
    echo "0 results";
}
*/
?>
 </div>                   </div>
                </div>
            </div>
        
        <!-- /#page-content-wrapper -->
</div>
  
</body>

</html>