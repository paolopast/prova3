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
		$res = $mysqli->query("SELECT * FROM opera WHERE id = '".$_GET['id']."'");
		$res2 =$mysqli->query("SELECT * FROM sede");
		$row = $res->fetch_assoc();
        ?>
    	<div class = 'titlebox'>Modifica informazioni dell'opera:<br/> <?php echo $row['nome']?> </div>
        <?php
        if(isset($_GET['err']) === true)
		{
			?><font color='#FFFF00'> Inserisci i campi obbligatori</font><?php
		
		}
		?><form enctype='multipart/form-data' name = 'modify' action = 'saveModOpera.php?id= <?php echo $_GET['id'] ?>' method = 'POST'>
    	<label>Nome:</label><br/>
   		<input name = 'nome' value = '<?php echo $row['nome'] ?>'/><br/><br/>
    	<label>Anno:</label><br/>
    	<input name = 'anno' value = '<?php echo $row['anno'] ?>'/><br/><br/>
		<label>Autore:</label><br/>
    	<input name = 'autore' value = '<?php echo $row['autore']?>'/><br/><br/>
        <label>Proprietario:</label><br/>
    	<input name = 'proprietario' value = '<?php echo $row['proprietario']?>' /><br/><br/>
		<label>Numero Passaporto:</label><br/>
    	<input name = 'numPass' value = '<?php echo $row['numPass'] ?>'/><br/><br/>
		<label>Location:</label><br/>
    	<input name = 'location' value = '<?php echo $row['location'] ?>' /><br/><br/>
		<label>Materiale:</label><br/>
    	<input name = 'materiale' value = '<?php echo $row['materiale'] ?>'/><br/><br/>
		<label>Categoria:</label><br/>
   		<input name = 'categoria' value = '<?php echo $row['categoria'] ?>'/><br/><br/>
    	<label>Data ricezione:</label><br/>
    	<input name = 'dataRicezione' value = '<?php echo $row['dataRicezione'] ?>'/><br/><br/>
		<label>Tecnica:</label><br/>
    	<input name = 'tecnica' value = '<?php echo $row['tecnica'] ?>'/><br/><br/>
        <label>Periodo storico:</label><br/>
    	<input name = 'periodoStorico' value = '<?php echo $row['periodoStorico'] ?>' /><br/><br/>
		<label>Dimensioni:</label><br/>
    	<input name = 'dimensioni' value = '<?php echo $row['dimensioni']?>'/><br/><br/>
		<label>Peso(in chilogrammi)*:</label><br/>
    	<input name = 'peso' value = '<?php echo $row['peso'] ?>' /><br/><br/>
		<label>Valore(in euro)*:</label><br/>
    	<input name = 'valore' value = '<?php echo $row['valore'] ?>'/><br/><br/>
		<label>Ditta consegna:</label><br/>
   		<input name = 'dittaConsegna' value = ' <?php echo $row['dittaConsegna'] ?>'/><br/><br/>
		<td>
		<label>Integrit&#224*:</label>
			<select name='integrita' >
            <?php
			$i = 0;
			while($i <= 10)
			{
				?><option value='<?php echo $i ?>'><?php echo $i ?></option>";
				<?php
				$i++;

			}
            ?>
		</select>
		</td>
		<br/><br/>
		<fieldset>
		<legend>E' un'originale?* </legend>
        <?php if($row['original'] === 'true'){
        ?>
        yes <input type='radio' name='original' value='true' checked/>
		no <input type='radio' name='original' value='false'/>
        <?php 
        }else {?>
        yes <input type='radio' name='original' value='true'/>
		no <input type='radio' name='original' value='false' checked/>
        <?php } ?>
  		</fieldset><br/>
		<fieldset>
        <legend>Si vuole pubblicare l'opera sul sito web?* </legend>
        <?php if($row['pubblicata'] === 'true'){?>
        yes <input type='radio' name='pubblicata' value='true' checked/>
		no <input type='radio' name='pubblicata' value='false'/>
        <?php
        }else{?>
        yes <input type='radio' name='pubblicata' value='true'/>
		no <input type='radio' name='pubblicata' value='false' checked/>
       <?php }?>
  		</fieldset><br/>
		<label>Luogo Origine:</label><br/>
    	<input name = 'luogoOrigine' value = '<?php echo $row['luogoOrigine'] ?>'/><br/><br/>
        <label>Info storiche:</label><br/>
    	<input name = 'infoStoriche' value = '<?php echo $row['infoStoriche'] ?>' /><br/><br/>
		<label>Descrizione:</label><br/>
    	<input name = 'descrizione' value = '<?php echo $row['descrizione'] ?>'/><br/><br/>
		<label>Restauri effettuati:</label><br/>
    	<input name = 'restauriEffettuati' value = '<?php echo $row['restauriEffettuati'] ?>' /><br/><br/>
		<label>Data pubblicazione:</label><br/>
    	<input name = 'dataPubblicazione' value = '<?php echo $row['dataPubblicazione'] ?>'/><br/><br/>
		<td>Sede*:</td>
		<td>
			<select name='sede_id'>
            <?php
			while($row2 = $res2->fetch_assoc())
			{
				?><option value='<?php echo $row2['id']?>'><?php echo $row2['nome'] ?></option><?php
			}
            ?>
		</select>
		</td>
		<br/><br/>

 		<input type='hidden'>
 		Carica o sostituisci l'immagine: <input name='userfile' type='file'><br/><br/>

 		Carica o sostituici il file audio: <input name='audiofile' type='file'><br/><br/>
		
 		Carica o sostituici il video: <input name='videofile' type='file'><br/><br/>
        
		<button type='submit'><b>Salva Modifiche</b></button><br/></form>

        <button onclick="window.location.href='deleteOpera.php?id=<?php echo $_GET['id'];?>'"><b>Cancella opera</b></button>
		
		<br/><a href='qrcodegen.php?id=<?php echo $_GET['id']?>'><button class='action bluebtn'><span class='label'><b>Stampa QR-code opera</b></span></button>
		

    </div>
</div>
</body>
</html>