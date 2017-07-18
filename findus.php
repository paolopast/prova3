<?php
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Durres Museum</title>
<style type = "text/css">
</style>


<!--si importa la libreria degli stili-->
<link href="Stili/stili.css" rel="stylesheet">
<link href="Stili/slider.css" rel="stylesheet">
</head>

<body>
<!-- contenitore principale--> 
<div class = "mainContainer">
	<!-- contenitore per un immagine-->
	<div class = "imgHeader">
    	<div id="slider">
		<figure>
<img src="Pictures/Immagine.png" width="100%" height="367px" alt>
<img src="Pictures/museum.jpg" width="100%" height="367px" alt>
<img src="Pictures/durazzo.jpg" width="100%" height="367px" alt>
<img src="Pictures/102716.jpg" width="100%" height="367px" alt>
<img src="Pictures/Durres-Amphitheatre-Albania-1024x768-iloveimg-resized (1).jpg" width="100%" height="367px" alt>
</figure>
</div>
  	</div>
</div> 
<div class = "menuContentBox">
   <!--Contenitore per il menu con i relativi link per le altre pagine del sito-->
    <div class = "navbar">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="findus.php">Find us</a></li>
                    <li><a href="contacts.php">Contacts</a></li>    
                    <li><a href="collection.php">Collection</a></li>
                    <li><a href="event.php">Events</a></li>
                    <!--piccolo script in php che permette di visualizzare voci particolari voci del menu solo nel caso in cui si sia loggati come admin o operatori-->  
                    <?php 
					//se loglevel = 1 significa che si è loggati come admin
					//se loglevel = 2 significa che si è loggati come operatori
					include 'util.php';
					if(isset($_SESSION['loginlev'])===true)
						menuPrivato($_SESSION['loginlev']);
					else
						menuPubblico();
					?>
                </ul>
            </div>


	
    <div class ="content">
    	<div class = "titlebox">
        Come visiting our museum
        </div>
        	<p><strong><u>Location:</u></strong></p>
            <p>Rruga Taulantia 32, Durrës 2000, Albania</p>
            <p></p>
            <p><strong><u>Opening hours:</u></strong></p>
            <p> 09,00 - 14,00 & 17,00 - 20,00</p>
            <p></p>
            <p><strong><u>Estimated visit duration:</u></strong></p>
            <p> 1 - 2 hours </p>
 
		<div class="mapbox">
			<iframe class = "flex" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1498.43317933979!2d19.439835573543032!3d41.311770821241154!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd36a325500d50df4!2sArchaeological+Museum+Durres!5e0!3m2!1sit!2sit!4v1498575595129" width="700" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
</div>


</body>
</html>