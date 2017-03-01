<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if(empty($_SESSION['LoggedIn']))
{
     include("nav_guest.html");
}
elseif($_SESSION['Priv']=="user")
{
	include("nav_user.php");
} 
else {include("nav_admin.php");}


?>