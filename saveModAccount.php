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
	$username = $_SESSION['username'];
	if($_POST['email'] === '')
		header('location: gestioneAcc.php?err=1');
	else
		$email = $_POST['email'];
		
	if($_POST['pwd'] === '')
		header('location: gestioneAcc.php?err=1');
	else
		$pwd = $_POST['pwd1'];
	
	if($_POST['newpwd2'] === '')
		header('location: gestioneAcc.php?err=1');
	else
		$newpwd2 = $_POST['pwd2'];
		
	if($_POST['newpwd'] === '')
		header('location: gestioneAcc.php?err=1');
	else
		$newpwd = $_POST['newpwd'];
	
	if($_POST['newpwd'] !== $_POST['newpwd2'])
		header('location: gestioneAcc.php?err=2');
	//esecuzione query
	
  else{
  	$mysqli = new mysqli('localhost','root','','my_durresarchmuseum');
    $res = $mysqli->query("SELECT* FROM operatoremuseo WHERE username = '".$username."'");
    echo mysqli_num_rows($res);
    echo $username;
    $row = $res->fetch_assoc();
    if($row['password'] !== $pwd)
    	header('location: gestioneAcc.php?err=3');
    else
    {
		$stmt = $PDO->prepare( 'UPDATE operatoremuseo SET email = ?, password = ? WHERE username = ?');
		$stmt->execute( array($email,$newpwd,$username));
        header('location: home.php');
	}
}

?>
</body>
</html>