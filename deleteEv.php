<?php
session_start();
require('csrfpphplibrary/libs/csrf/csrfprotector.php');
csrfProtector::init();
	if($_SESSION['loginlev'] !== 1)
		header('location: missAutentication.php');
	$id = $_GET['id'];
	$col = 'mysql:host=localhost;dbname=my_durresarchmuseum';
	$db = new PDO($col , 'root', '');
	$db->beginTransaction();


       	$sql = $db->prepare('DELETE FROM evento WHERE id = :id');
	$sql->bindParam(':id', $id);
	$sql->execute();
        $result = 'CSRF check passed. Form parsed.';
  
 header('location: gestEv.php')
?>