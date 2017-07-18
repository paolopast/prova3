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
	if($_POST['nome'] === '')
    {
		$strdest = 'modSede.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 21)) === true && is_numeric(substr(rawurldecode($strdest), 21)) === true)
        {
        	header('location: '.rawurldecode($strdest));
       		
        }
   		else
    		echo "error";
        return;	
    }
	else
		$nome = $_POST['nome'];
		
	if($_POST['indirizzo'] === '')
    {
		$strdest = 'modSede.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 21)) === true && is_numeric(substr(rawurldecode($strdest), 21)) === true)
        {
        	header('location: '.rawurldecode($strdest));
       		
        }
   		else
    		echo "error";
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
		$strdest = 'modSede.php?err=1&id='.$_GET['id'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 21)) === true && is_numeric(substr(rawurldecode($strdest), 21)) === true)
        {
        	header('location: '.rawurldecode($strdest));
       		
        }
   		else
    		echo "error";
        return;	
    }
	else
		$numTelefono = $_POST['numTelefono'];
	
	//esecuzione query
if (isset($_SERVER[‘HTTP_REFERER’]) && $_SERVER[‘HTTP_REFERER’]!=””)
  {
  if (strpos($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST'])===false)
    {
    echo "accesso negato";
    }
  }
  else{
	$stmt = $PDO->prepare( 'UPDATE sede SET nome = ?, citta = ?, indirizzo = ?, numTelefono = ? WHERE id = ?');
	$stmt->execute( array($nome,$citta,$indirizzo, $numTelefono, $_GET['id']));
	
header('location: gestSedi.php');
}