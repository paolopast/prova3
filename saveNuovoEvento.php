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
	
	if($_POST['titolo'] === '')
    {
		$strdest = 'addEv.php?err=1';
        $strdest = rawurlencode($strdest);
        header('location: '.rawurldecode($strdest));
        return;
    }
	else
		$titolo = $_POST['titolo'];
		
	if($_POST['data'] === '')
    {
		$strdest = 'addEv.php?err=1';
        $strdest = rawurlencode($strdest);
        header('location: '.rawurldecode($strdest));
        return;
    }
	else
		$data = $_POST['data'];
		
	if($_POST['descrizione'] === '')
		$descrizione = null;
	else
		$descrizione = $_POST['descrizione'];
	
	if($_POST['sede_id'] === '')
    {
		$strdest = 'addEv.php?err=1';
        $strdest = rawurlencode($strdest);
        header('location: '.rawurldecode($strdest));
        return;
    }
	else
		$sede_id = $_POST['sede_id'];
	
	//esecuzione query
	
$stmt = $PDO->prepare( 'INSERT INTO evento (data,titolo,descrizione,sede_id) VALUES(?,?,?,?)');
	$stmt->execute( array($data,$titolo,$descrizione, $sede_id));
	header('location: gestEv.php');

?>
</body>
</html>