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
		  height: 100%;
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
  <img style="float:right;margin-right: 200px;margin-top: 100px"  alt="Embedded Image" width="400" height="500" 
  src="homebirb.jpg"/>
  
  <div id="cont">
  <h1>Ready to go on a safari?</h1>
  </br></br>
  <p>There are 27,000 species of invertebrate fauna in Bulgaria, and more than 750 species of vertebrates. Of these, 397 are birds, 207 are fresh-water and Black Sea fish, 94 are mammals, and 52 are amphibians and reptiles. Seven zoological regions are recognized throughout the country, four of which are in the Mediterranean climatic zone. Bulgaria is home to European, Euro-Siberian and Mediterranean flora and fauna, and the Mediterranean climate has strongly influenced the development of many species. The cave fauna in Bulgaria consists of more than 100 species. The Black Sea fish populations attract both sport and industrial fishing.
</br></br>
Three national parks have been established in the country: Pirin National Park (a UNESCO natural heritage site), Rila National Park, and the Central Balkans National Park. There are also 11 nature reserves – Belasitsa, Balgarka, Vratsa Balkan, Golden Sands, Persina, Rila Monastery, Rusenski Lom, Sinite Kamani, Strandzha and the Shumen Plateau.
  </p></div>
  </div></body>
  
  </html>