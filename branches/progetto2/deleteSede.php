<?php
	session_start();
	if($_SESSION['loginlev'] !== 1)
		header('location: missAutentication.php');
require('csrfpphplibrary/libs/csrf/csrfprotector.php');
csrfProtector::init();
	//dichiarazione variabili
	$id = $_GET['id'];

$col = 'mysql:host=localhost;dbname=my_durresarchmuseum';
$db = new PDO($col , 'root', '');
$db->beginTransaction();
if (isset($_SERVER[‘HTTP_REFERER’]) && $_SERVER[‘HTTP_REFERER’]!=””)
  {
  if (strpos($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST'])===false)
    {
    // Qualcosa non quadra: uscire dal programma, creare file di log, etc etc.
    }
  }
  else{
$sql = $db->prepare('DELETE FROM sede WHERE id = :id');
$sql->bindParam(':id', $id);
$sql->execute();
}
header('location: gestSedi.php');
?>