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
					if(isset($_SESSION['loginlev']) ===true)
						menuPrivato($_SESSION['loginlev']);
					else
						menuPubblico();
					?>
                </ul>
            </div>


    <div class ="content">
    	<div class = "titlebox">
        Our contacts
        </div>
        
		<div class ="colonnaMeta">
			<h2>Information Desk</h2>
			<p>General Information</p>
            <p>000 1234567</p>
            <p><font color="#000099">asdasda@gmail.com</font></p>
   		</div>
       
    	<div class ="colonnaMeta">
        	<h2>Ticket Desk</h2>
       		<p>Tickets for exhibitions and events</p>
            <p>000 3456789</p>
            <p><font color="#000099">ajdlasnd@yahoo.it</font></p>
    	</div>
                                    
        <div class ="colonnaMeta">
        	<h2>Membership</h2>
       		<p>Enquiries about Membership</p>
            <p>000 3456789</p>
            <p><font color="#000099">ajdlasnd@yahoo.it</font></p>
    	</div>
                                                   
        <div class ="colonnaMeta">
        	<h2>Feedback</h2>
       		<p>Feedback, comments, suggestions or concerns</p>
            <p>000 3456789</p>
            <p><font color="#000099">ajdlasnd@yahoo.it</font></p>
    	</div>
                                    
       	<div class ="colonnaTot">
        	<h2>General postal address</h2>
       		<p>Rruga Taulantia 32, Durrës 2000, Albania</p>
        </div>
    								
    </div>
</div>
</body>
</html>