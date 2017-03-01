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
  html, body {
    height:100%;
}

.well{
		  width: 80%;
		  margin: 0 auto;
		  margin-top: 5%;
		  overflow: hidden;
		  height: 600px;
	  }
	  #cont {
     width: 600px;
     height: 100%;
	 position: relative;
	 margin-left: 10%;
 }
 
 p{
	 font-size: 20px;
	 text-align: justify;
    text-justify: inter-word;
 }
	  </style>
  </head>
  
  <body>
  <div class="well">
  </br>
  <img style="float:right;margin-right: 150px"  alt="Embedded Image" width="500" height="500" 
  src="aboutderp.jpg"/>
  
  <div id="cont">
  <h1>The Cause</h1>
  </br></br>
  <blockquote>
  <p>The quicker we humans learn that saving open space and wildlife is critical to our welfare and quality of life, maybe we'll start thinking of doing something about it.
</p>
  <footer>Jim Fowler</footer>
</blockquote>
<br>
<p>
Fewer natural wildlife habitat areas remain each year. Moreover, the habitat that remains has often been degraded to bear little resemblance to the wild areas which existed in the past.Habitat loss due to destruction, fragmentation and degradation of habitat is the primary threat to the survival of wildlife in the United States. When an ecosystem has an ecosystem) are some of the ways habitats can become so degraded that they no longer support native wildlife.
 </p> </div>
  </div></body>
  
  </html>