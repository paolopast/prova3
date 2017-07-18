<?php
//avvio sessione
	session_start();
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
	
	//dichiarazione variabili
	$username = $_POST['username'];
	$password = $_POST['pwd'];
	//esecuzione query
	$col = 'mysql:host=localhost;dbname=my_durresarchmuseum';
	$PDO = new PDO($col , 'root', '');
	$PDO->beginTransaction();
	$sql = "SELECT * FROM operatoremuseo WHERE username= " . $PDO->quote($_POST['username']). "AND password = ".$PDO->quote($password);
	$res = $PDO->query($sql);
    if ($res->rowCount() === 1)
    {
    	foreach($PDO->query($sql) as $row)
		{
			if(	$row['ammministratore'] === 'true')
			{
				$_SESSION['loginlev'] = 1; 
                
               
			}
			else if($row['ammministratore'] === 'false')
			{
				$_SESSION['loginlev'] = 2;
				
			}
            $_SESSION['username'] = $row['username'];
			header('location: home.php');
		}
     }
        else
            echo 'Authentication error';
	
?>
</body>
</html>