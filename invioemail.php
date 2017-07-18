<?php
include 'util.php';
$password = generaPwdCasuale();
$mysqli = connectDB();
$username = $_POST['username'];
$res = $mysqli->query("SELECT email FROM operatoremuseo WHERE username = '".$username."'");
if($res->num_rows === 0)
	echo "Credenziali errate";
else
{
	$col = 'mysql:host=localhost;dbname=my_durresarchmuseum';
	$PDO = new PDO($col , 'root', '');
	$stmt = $PDO->prepare( 'UPDATE operatoremuseo SET  password = ? WHERE username = ?');
	$stmt->execute( array($password,$username));
	$row = $res->fetch_assoc();
	$email = $row['email'];
	mail($email, "Rinnovo password", "Come da lei richiesto ecco la nuova password: ".$password, 'FROM: "Paolo Pastore" <paolo.pastore.f@gmail.com>');
	header('location: home.php');
}