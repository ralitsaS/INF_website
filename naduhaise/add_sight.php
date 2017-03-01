<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
	if(empty($_SESSION['LoggedIn']))
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('These Are Not the Droids You Are Looking For. SHOO!')
    window.location.href='http://localhost/naduhaise/index.php';
    </SCRIPT>");
		
	}
	
	include("testPage.php");

	require("db_info_NEW.php");
 
	// Only process the form if $_POST isn't empty
if(isset($_POST['submit'])) {
  
  
  
  //echo $_POST['spRadio'];
  $name_all = mysql_real_escape_string($_POST['spRadio']);
  $user_dscr=mysql_real_escape_string($_POST['dscr']);
  // Insert our data
  //$sql = "INSERT INTO animal ( 'lat', 'lng', 'sp_kind', 'sc_name' ) VALUES ( '$_POST[latitude]', '$_POST[longtitude]', '$_POST[kindRadio]', '$_POST[spRadio]' )";
  $sql = "INSERT INTO animal ( lat, lng, sp_kind, whole_name, sex, age, uploaded_by, description) VALUES ( '" . $_POST['latitude'] . "', '" . $_POST['longtitude'] . "', '" . $_POST['kindRadio'] . "', '$name_all', '" . $_POST['sexRadio'] . "', '" . $_POST['ageRadio'] . "', '" . $_SESSION['Username'] . "', '$user_dscr')";
  $insert = mysql_query($sql);
  
  // Print response from MySQL
  if ( $insert ) {
    //echo "Success! ";
	$sql_y = "UPDATE users SET contr_num=contr_num+1 WHERE username='" . $_SESSION['Username'] . "'";
mysql_query($sql_y);
	
	?>
	<script type="text/javascript">

alert("Entry added successfully.");

location = "http://localhost/naduhaise/index.php";

</script>
<?php

  } else {
    die("Error: Oops! Something went wrong. Try again.");
  }
  // Close our connection
  mysql_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <style>
  
  html, body {
    height:100%;
}
    #map-canvas {
        width: 500px;
        height: 400px;
      }
	  
	  #step1, #step2, #step3{
		  width: 90%;
		  margin: 0 auto;
		  margin-top: 0%;
		  
		  height: 100%;
	  }
	  
	  
	  .box{
        padding: 20px;
        display: none;
    }
    .red{ background: #ff0000; }
    .green{ background: #00ff00; }
    .blue{ background: #0000ff; }
	
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
 }
 
 .list-group-item {
	 background: #000;
 }
	
  </style>
  
  <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="Mammals"){
            $(".box").not(".mammal").hide();
            $(".mammal").show();
        }
        if($(this).attr("value")=="Birds"){
            $(".box").not(".birb").hide();
            $(".birb").show();
        }
        if($(this).attr("value")=="Fish"){
            $(".box").not(".fish").hide();
            $(".fish").show();
        }
		if($(this).attr("value")=="Insects"){
            $(".box").not(".insect").hide();
            $(".insect").show();
        }
		if($(this).attr("value")=="Crustaceans"){
            $(".box").not(".crust").hide();
            $(".crust").show();
        }
		if($(this).attr("value")=="Reptiles"){
            $(".box").not(".reptile").hide();
            $(".reptile").show();
        }
		if($(this).attr("value")=="Amphibians"){
            $(".box").not(".amph").hide();
            $(".amph").show();
        }
    });
});
</script>


  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?">
  </script>    
  <script>
    var map;
    
   // var myLatlng = new google.maps.LatLng(myLocation.latitude, myLocation.longitude);
    var mapOptions = {
          center: new google.maps.LatLng(42.0224879, 23.0947407),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }

    function initialize() {
      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

      //var displayElement = document.getElementById('display');
      // Add a right click event
      // @see http://stackoverflow.com/questions/7168394/google-map-v3-context-menu
      google.maps.event.addListener(
        map,
        "rightclick",
        function( event ) {
		/*
          // just as an example, I write the data to the input
          displayElement.value = 
            'mouse: ' + event.pixel.x +','+  event.pixel.y +
            ' ||| coordinates: ' + event.latLng.lat() +','+ event.latLng.lng() ; */
			
			 var clickLat = event.latLng.lat();
                var clickLon = event.latLng.lng();

                // show in input box
                document.getElementById("lat").value = clickLat.toFixed(4);
                document.getElementById("lon").value = clickLon.toFixed(4);
        }
      );
    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
</head>
<body>

   
   <div class="page">
        <!-- Sidebar -->
        <div class="sidebar">
            
               <div class="list-group sidebar_cont">
			   
			   <a href="#step1"  class="list-group-item">Step 1</a>
			   <a href="#step2"  class="list-group-item">Step 2</a>
			   <a href="#step3"  class="list-group-item">Step 3</a>
			   
			  
                
                </div>
            
        </div> 
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
            <div class="container">
			
                <div class="row">
                    <div class="col-lg-12">
					<h1><b>Add a new entry</b></h1>
					
                        <form id="AddNewForm" method="post" class="form-horizontal" action="add_sight.php">
   <div id="step1">
   <br><br><br><br>
   
   <h1>Step 1: Choose location</h1>
   <div style="float:left">
	Right-click on map to select location of sighting.
<div id="map-canvas" ></div>
</div>
<div style="">
<div class="form-group">
                        <label class="col-md-3 control-label">Latitude:</label>
                        <div class="col-md-5">
                            <input id="lat" type="text" class="form-control" name="latitude" />
                        </div>
						<label class="col-md-3 control-label">Longtitude:</label>
						<div class="col-md-5">
                            <input id="lon" type="text" class="form-control" name="longtitude" />
                        </div>
                    </div>
  
  </div>
  </div>
  </br></br></br></br></br>
  <div id="step2">
  <br><br><br><br>
   
   <h1>Step 2: Choose class and species</h1>
  <div>
        <label><input type="radio" name="kindRadio" value="Mammals"> Mammals</label>
        <label><input type="radio" name="kindRadio" value="Birds"> Birds</label>
        <label><input type="radio" name="kindRadio" value="Fish"> Fish</label>
		<label><input type="radio" name="kindRadio" value="Insects"> Insects</label>
		<label><input type="radio" name="kindRadio" value="Crustaceans"> Crustaceans</label>
		<label><input type="radio" name="kindRadio" value="Reptiles"> Reptiles</label>
		<label><input type="radio" name="kindRadio" value="Amphibians"> Amphibians</label>
    </div>
    <div class="mammal box"> 
	
	<?php
	$sql = "SELECT * FROM endangered WHERE kind='Mammals'";

 $result = mysql_query($sql) or die('Invalid query: ' .mysql_error());

 while($row = mysql_fetch_assoc($result)) {
	 
	 echo "<label><input type=\"radio\" name=\"spRadio\" value=\"".$row["name_com"]." (".$row["name_sci"].")\">".$row["name_com"]." (".$row["name_sci"].")</label></br>";
	 
 }
	
	?>
	
	</div>
    <div class="birb box"> 
	<?php
	$sql = "SELECT * FROM endangered WHERE kind='Birds'";

 $result = mysql_query($sql) or die('Invalid query: ' .mysql_error());

 while($row = mysql_fetch_assoc($result)) {
	 
	 echo "<label><input type=\"radio\" name=\"spRadio\" value=\"".$row["name_com"]." (".$row["name_sci"].")\">".$row["name_com"]." (".$row["name_sci"].")</label></br>";
	 
 }
	
	?>
	
	</div>
    <div class="fish box">
	<?php
	$sql = "SELECT * FROM endangered WHERE kind='Fish'";

 $result = mysql_query($sql) or die('Invalid query: ' .mysql_error());

 while($row = mysql_fetch_assoc($result)) {
	 
	 echo "<label><input type=\"radio\" name=\"spRadio\" value=\"".$row["name_com"]." (".$row["name_sci"].")\">".$row["name_com"]." (".$row["name_sci"].")</label></br>";
	 
 }
	
	?>
	</div>
	<div class="insect box">
	<?php
	$sql = "SELECT * FROM endangered WHERE kind='Insects'";

 $result = mysql_query($sql) or die('Invalid query: ' .mysql_error());

 while($row = mysql_fetch_assoc($result)) {
	 
	 echo "<label><input type=\"radio\" name=\"spRadio\" value=\"".$row["name_com"]." (".$row["name_sci"].")\">".$row["name_com"]." (".$row["name_sci"].")</label></br>";
	 
 }
	
	?>
	</div>
	<div class="crust box">
	<?php
	$sql = "SELECT * FROM endangered WHERE kind='Crustaceans'";

 $result = mysql_query($sql) or die('Invalid query: ' .mysql_error());

 while($row = mysql_fetch_assoc($result)) {
	 
	 echo "<label><input type=\"radio\" name=\"spRadio\" value=\"".$row["name_com"]." (".$row["name_sci"].")\">".$row["name_com"]." (".$row["name_sci"].")</label></br>";
	 
 }
	
	?>
	</div>
	<div class="reptile box">
	<?php
	$sql = "SELECT * FROM endangered WHERE kind='Reptiles'";

 $result = mysql_query($sql) or die('Invalid query: ' .mysql_error());

 while($row = mysql_fetch_assoc($result)) {
	 
	 echo "<label><input type=\"radio\" name=\"spRadio\" value=\"".$row["name_com"]." (".$row["name_sci"].")\">".$row["name_com"]." (".$row["name_sci"].")</label></br>";
	 
 }
	
	?>
	</div>
	<div class="amph box">
	<?php
	$sql = "SELECT * FROM endangered WHERE kind='Amphibians'";

 $result = mysql_query($sql) or die('Invalid query: ' .mysql_error());

 while($row = mysql_fetch_assoc($result)) {
	 
	 echo "<label><input type=\"radio\" name=\"spRadio\" value=\"".$row["name_com"]." (".$row["name_sci"].")\">".$row["name_com"]." (".$row["name_sci"].")</label></br>";
	 
 }
	
	?>
	</div>
	
  </div>
  </br></br></br></br></br>
  <div id="step3">
  <br><br><br><br>
   
   <h1>Step 3: Extra Information</h1>
  <div class="form-group">
                        <label class="col-md-3 control-label">Sex:</label>
                        <div class="col-md-5">
                            <input type="radio" name="sexRadio" value="M"> Male
							</br>
							<input type="radio" name="sexRadio" value="F"> Female
							</br>
							<input type="radio" name="sexRadio" value="Unknown"> Unknown
							
                        </div>
                    </div>
					
					
	<div class="form-group">
                        <label class="col-md-3 control-label">Age:</label>
                        <div class="col-md-5">
                            <input type="radio" name="ageRadio" value="Child"> Child
							</br>
							<input type="radio" name="ageRadio" value="Adult"> Adult
							</br>
							<input type="radio" name="ageRadio" value="Unknown"> Unknown
							
                        </div>
                    </div>
					
	<div class="form-group">
                        <label class="col-md-3 control-label">Description:</label>
                        <div class="col-md-5">
                            <textarea name="dscr" cols="86" rows ="10" class="form-control"></textarea>
							
                        </div>
                    </div>
					
	<div class="form-group">
                        <div class="col-md-5 col-md-offset-3">
                            <input type="submit" class="btn btn-default" name="submit" value="Submit Form"/>
                        </div>
                    </div>
  
  </div>
  </form>
	 </div>
                
            </div>
        </div>
        <!-- /#page-content-wrapper -->
</div>
	
  



  
</body>
	
	</html>