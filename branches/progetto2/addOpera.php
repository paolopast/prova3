<?php
//avvio sessione
	session_start();
	if($_SESSION['loginlev'] !== 1 && $_SESSION['loginlev'] !== 2)
		header('location: missAutentication.php');
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
<img src="Pictures/Durres-Amphitheatre-Albania-1024x768-iloveimg-resized.jpg" width="100%" height="367px" alt>
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
		$res2 =$mysqli->query("SELECT * FROM sede");    
	?>
    	<div class = 'titlebox'>Add new Opera<br/></div>
        <font color = 'red'>
	<?php
		if(isset($_GET['err']) === true)
		echo "Inserisci i valori obbligatori";
	?>
    </font>
		<form enctype='multipart/form-data' name = 'add' action = 'saveNuovaOpera.php' method = 'POST'>
    	<label>Nome*:</label><br/>
   		<input name = 'nome' /><br/><br/>
    	<label>Anno:</label><br/>
    	<input name = 'anno' /><br/><br/>
		<label>Autore:</label><br/>
    	<input name = 'autore' /><br/><br/>
        <label>Proprietario*:</label><br/>
    	<input name = 'proprietario' /><br/><br/>
		<label>Numero Passaporto:</label><br/>
    	<input name = 'numPassaporto' /><br/><br/>
		<label>Location:</label><br/>
    	<input name = 'location' /><br/><br/>
		<tr>
		<label>Materiale*:</label><br/>
    	<input name = 'materiale' /><br/><br/>
    	<label>Categoria*:</label><br/>
   		<input name = 'categoria' /><br/><br/>
    	<label>Data Ricezione:</label><br/>
    	<input name = 'dataRicezione' /><br/><br/>
		<label>Tecnica*:</label><br/>
    	<input name = 'tecnica' /><br/><br/>
        <label>Periodo Storico:</label><br/>
    	<input name = 'periodoStorico' /><br/><br/>
		<label>Dimensioni(Nel formato hh x ww x dd in centimetri):</label><br/>
    	<input name = 'dimensioni' /><br/><br/>
		<label>Peso*(in chilogrammi):</label><br/>
    	<input name = 'peso' /><br/><br/>
		<label>Valore*(in euro):</label><br/>
   		<input name = 'valore' /><br/><br/>
    	<label>Ditta Consegna:</label><br/>
    	<input name = 'dittaConsegna' /><br/><br/>
		<td>Integrità:</td>
		<td>
			<select name='integrita'>
        <?php
			$i = 0;
			while($i <= 10)
			{
            ?>
				<option value='<?php echo $i?>'> <?php echo $i ?></option>
			<?php
				$i++;

			}
            ?>
		</select>
		</td>
		</tr>
		<br/><br/>
    	<fieldset>
        <legend>E' un'originale?* </legend>
        yes <input type='radio' name='original' value='true'/>
		no <input type='radio' name='original' value='false'/>
  		</fieldset><br/>
		<fieldset>
        <legend>Si vuole pubblicare l'opera sul sito web?* </legend>
        yes <input type='radio' name='pubblicata' value='true'/>
		no <input type='radio' name='pubblicata' value='false'/>
  		</fieldset><br/>
        <label>Data pubblicazione:</label><br/>
    	<input name = 'dataPubblicazione' /><br/><br/>
		<label>Luogo origine:</label><br/>
    	<input name = 'luogoOrigine' /><br/><br/>
		<label>Info storiche:</label><br/>
    	<input name = 'infoStoriche' /><br/><br/>
		<tr>
		<label>Descrizione:</label><br/>
    	<input name = 'descrizione' /><br/><br/>
		<td>Restauri effettuati:</td><br/>
		<input name = 'restauriEffettuati' /><br/><br/>
		<td>Sede:</td>
		<td>
			<select name='sede_id'>
            <?php
			while($row2 = $res2->fetch_assoc())
			{
            ?>
				<option value='<?php echo $row2['id'] ?>'><?php echo $row2['nome'] ?></option>
				<?php
			}
            ?>
		</select>
		</td>
		</tr>
		<br/><br/>
		<tr>
		<label>URL video:</label><br/>
    	<input name = 'urlVideo' /><br/><br/>
 		<input type='hidden'>
 		Carica immagine: <input name='userfile' type='file'></br><br/>
		<input type='hidden'>
 		Carica un file audio: <input name='audiofile' type='file'></br><br/>
		<input type='hidden'>
 		Carica un video: <input name='videofile' type='file'></br><br/>
		<button type='submit'>Salva Modifiche</button>
    	</form>
    </div>
</div>
</body>
</html>