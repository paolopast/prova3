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
	//Si fanno dei controlli per assicurarsi che nel caso in cui non sia stato inserito nulla si possa mettere il valore NULL nel database
    
	if($_POST['email'] === '')
    {
		$strdest = 'modOperator.php?err=1&username='.$_GET['username'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 27)) === true)
        	header('location: '.rawurldecode($strdest));
        return;
    }
	else
		$email = $_POST['email'];
		
	if($_POST['telefono'] === '')
		$telefono = null;
	else
		$telefono =$_POST['telefono'];
		
	if($_POST['nome'] === '')
    {
		$strdest = 'modOperator.php?err=1&username='.$_GET['username'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 27)) === true)
        	header('location: '.rawurldecode($strdest));
        return;
    }
	else
		$nome = $_POST['nome'];
	
	if($_POST['cognome'] === '')
    {
		$strdest = 'modOperator.php?err=1&username='.$_GET['username'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 27)) === true)
        	header('location: '.rawurldecode($strdest));
        return;
    }
	else
		$cognome = $_POST['cognome'];
		
	if($_POST['cf'] === '')
		$cf = null;
	else
		$cf = $_POST['cf'];
	
	if($_POST['dataN'] === '')
    {
		$strdest = 'modOperator.php?err=1&username='.$_GET['username'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 27)) === true)
        	header('location: '.rawurldecode($strdest));
        return;
    }
	else
		$dataN = $_POST['dataN'];
	
	if($_POST['amministratore'] !== 'true' && $_POST['amministratore'] !== 'false' )
    {
		$strdest = 'modOperator.php?err=1&username='.$_GET['username'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 27)) === true)
        	header('location: '.rawurldecode($strdest));
        return;
    }
	else
		$amministratore = $_POST['amministratore'];
	
	if($_POST['citta'] === '')
		$citta = null;
	else
		$citta = $_POST['citta'];
		
	if($_POST['sede_id'] === '')
    {
		$strdest = 'modOperator.php?err=1&username='.$_GET['username'];
        $strdest = rawurlencode($strdest);
        if(is_string(substr(rawurldecode($strdest), 27)) === true)
        	header('location: '.rawurldecode($strdest));
        return;
    }
	else
		$sede_id = $_POST['sede_id'];
	//esecuzione query
if (isset($_SERVER[‘HTTP_REFERER’]) && $_SERVER[‘HTTP_REFERER’]!=””)
  {
  if (strpos($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST'])===false)
    {
    echo "accesso negato";
    }
  }
  else{
	$stmt = $PDO->prepare( 'UPDATE operatoremuseo SET nome = ?, cognome = ?, cf = ?, dataNascita = ?, ammministratore = ?, citta = ?, sede_id = ?, email = ?, telefono = ? WHERE username = ?');
	$stmt->execute( array($nome,$cognome,$cf, $dataN, $amministratore, $citta, $sede_id, $email, $telefono, $_GET['username']));
}

header('location: gestOperatori.php');

?>
</body>
</html>