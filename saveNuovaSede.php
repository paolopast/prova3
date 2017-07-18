<?php
//avvio sessione
	session_start();
	if($_SESSION['loginlev'] !== 1)
		header('location: missAutentication.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	//connessione a database
	$col = 'mysql:host=localhost;dbname=my_durresarchmuseum';
	$PDO = new PDO($col , 'root', '');
	//dichiarazione variabili
	//dichiarazione variabili
	//dichiarazione variabili
	//Si fanno dei controlli per assicurarsi che nel caso in cui non sia stato inserito nulla si possa mettere il valore NULL nel database
	
	if($_POST['nome'] === '')
    {
		header('location: addSede.php?err=1');
        return;
    }
	else
		$nome = $_POST['nome'];
		
	if($_POST['indirizzo'] === '')
    {
		header('location: addSede.php?err=1');
    	return;
    }
	else
		$indirizzo = $_POST['indirizzo'];
		
	if($_POST['citta'] === '')
		$citta = null;
	else
		$citta = $_POST['citta'];
	
	if($_POST['numTelefono'] === '')
    {
		header('location: addSede.php?err=1');
        return;
    }
	else
		$numTelefono = $_POST['numTelefono'];
	
	//esecuzione query
	$sql = "INSERT INTO sede (nome,citta,indirizzo,numTelefono) VALUES(".$PDO->quote($nome).",".$PDO->quote($citta).",".$PDO->quote($indirizzo).",".$PDO->quote($numTelefono);
    

	$stmt = $PDO->prepare( 'INSERT INTO sede (nome,citta,indirizzo,numTelefono) VALUES (?, ?, ?, ?)');
	$stmt->execute( array($nome,$citta,$indirizzo, $numTelefono));


	header('location: gestSedi.php');

?>
</body>
</html>