<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
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
 }
 
 .list-group-item {
	 background: #000;
 }

</style>
  </head>
  
  
   <body>
   
   <div class="page">
        <!-- Sidebar -->
        <div class="sidebar">
            
               <div class="list-group sidebar_cont">
			   
			   <a href="allMap.html" target="map_here" class="list-group-item">All</a>
			   
			   
			   
                <a id="toggler" href="#" data-toggle="collapse" class="list-group-item" data-target="#demo">By Class</a>
<div id="demo" class="collapse">
<ul >
	<li><a href="mammalMap.html" target="map_here">Mammals</a></li>
  <li><a href="birdMap.html" target="map_here">Birbs</a></li>
  <li><a href="fishMap.html" target="map_here">Fish</a></li>
  <li><a href="insectMap.html" target="map_here">Insects</a></li>
  <li><a href="crustMap.html" target="map_here">Crustaceans</a></li>
  <li><a href="reptileMap.html" target="map_here">Reptiles</a></li>
  <li><a href="amphMap.html" target="map_here">Amphibians</a></li>
</ul>
</div>
                
               
                    <a href="userMap.php" target="map_here" class="list-group-item">By User</a>
                
                </div>
            
        </div> 
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        
   
	
    <iframe src="allMap.html" style="width: 100%; height: 700px; border: none;" name="map_here"></iframe>
	
	 </div>
                </div>
            </div>
        
        <!-- /#page-content-wrapper -->
</div>
	
  </body>
</html>