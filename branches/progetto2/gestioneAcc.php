<?php
//avvio sessione
	session_start();
	if($_SESSION['loginlev'] !== 1 && $_SESSION['loginlev'] !== 2)
		header('location: missAutentication.php');
                require('csrfpphplibrary/libs/csrf/csrfprotector.php');
csrfProtector::init();
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
					if(isset($_SESSION['loginlev']) === true)
						menuPrivato($_SESSION['loginlev']);
					else
						menuPubblico();
					?>
                </ul>
            </div>



    <div class ="content">
	<?php
		$mysqli = new MySQLi("localhost", "root","", "my_durresarchmuseum");
		$res = $mysqli->query("SELECT * FROM operatoremuseo WHERE username = '".$_SESSION['username']."'");
		if($res === false)
			echo mysql_error();
		$row = $res->fetch_assoc();
    ?>
    	<div class = 'titlebox'>Gestione Account</div>
        In questa pagina potrai modificare il tuo indirizzo email o la tua password<br/><br/>
        <font color = 'red'>
    <?php 
    	if(isset($_GET['err']) === true && $_GET['err'] === '1')
			echo "Inserisci i valori obbligatori";
        else if(isset($_GET['err']) === true && $_GET['err'] === '2')
        	echo "Le due password non corrispondono";
        else if(isset($_GET['err']) === true && $_GET['err'] === '3')
        	echo "Password non valida";
    ?>
    </font>
    	<br/>
		<br/>
    	<form name = 'modify' action = 'saveModAccount.php' method = 'POST'>
    	<label>E-mail*:</label><br/>
   		<input name = 'email' rows 1 value = '<?php echo htmlspecialchars($row['email'])?>'><br/><br/>
    	<label>Password*:</label><br/>
    	<input type='password' name = 'pwd1'><br/><br/>
        <label>Nuova password*:</label><br/>
    	<input type = 'password' name = 'newpwd'><br/><br/>
        <label>Ripeti nuova password*:</label><br/>
    	<input type = 'password' name = 'newpwd2'><br/><br/>	
		<button type='submit'>Salva Modifiche</button>
    	</form>
    </div>
</div>
</body>
</html>