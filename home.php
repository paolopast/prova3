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
        Welcome to the Durres Archeological Museum website
        </div>
    The Durrës Archaeological Museum (Albanian: Muzeu Arkeologjik) in Durrës, Albania, established in 1951, is the largest archaeological museum in the country. The museum is located near the beach and north of the museum are the 6th-century Byzantine walls, constructed after the Visigoth invasion of 481. The 1997 rebellion in Albania saw the museum seriously damaged and looted. In 2010, the Durrës Archaeological Museum is expected to undergo a total reconstruction. Despite the importance of archaeological objects, the museum is not an independent institution and is operated by the Regional Directorate of Durrës Monuments. The museum is supported by the Albanian Institute of Archaeology and the Academy of Sciences and intend it to become a national museum according to archaeologists such as Adi Anastasi and Luan Përzhita, given the historical significance of its artifacts and their illustration rich cultural heritage. A fund has been opened by the Ministry of Tourism, Culture, Youth and Sports to provide the museum with a new research unit, its own scientific staff and laboratory and administrative body. Problems have been identified in the reconstruction process given that the museum is located near the sea faces erosion from the iodine content of salt and moisture and weathering. The museum was reopened by prime minister Edi Rama on March 20, 2015 after 4 years of closure. The museum is open from 9 am to 3 pm every day of the week, except Monday.
    </div>
</div>
</body>
</html>