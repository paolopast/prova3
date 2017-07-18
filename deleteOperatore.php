<?php
	session_start();
	if($_SESSION['loginlev'] !== 1)
		header('location: missAutentication.php');
require('csrfpphplibrary/libs/csrf/csrfprotector.php');
csrfProtector::init();
	//dichiarazione variabili
	$username = $_GET['username'];

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
$sql = $db->prepare('DELETE FROM operatoremuseo WHERE username = :username');
$sql->bindParam(':username', $username);
$sql->execute();
}
?>