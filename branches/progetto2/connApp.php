<?php
$mysqli = new MySQLi('localhost', 'root','','my_durresarchmuseum');
mysqli_set_charset($mysqli, 'utf8');
$query = "SELECT id, nome, anno, autore, materiale, categoria, urlVideo, urlAudio, tecnica, periodoStorico, dimensioni, peso, valore, infoStoriche, descrizione FROM opera" ;
$res = mysqli_query($mysqli, $query);
$temp_array = array();
while($row = $res->fetch_assoc())
{
	$orders=array();
     	$orders[] = array(
          'id' => $row['id'],
          'nome' => $row['nome'],
          'anno' => $row['anno'],
          'autore' => $row['autore'],
          'materiale' => $row['materiale'],
          'categoria' => $row['categoria'],
          'urlVideo' => $row['urlVideo'],
          'urlAudio' => $row['urlAudio'],
          'tecnica' => $row['tecnica'],
          'periodoStorico' => $row['periodoStorico'],
          'dimensioni' => $row['dimensioni'],
          'peso' => $row['peso'],
          'valore' => $row['valore'],
          'infoStoriche' => $row['infoStoriche'],
          'descrizione' => $row['descrizione']
          );
	$temp_array[]=$orders;
}
header('Content-Type: application/json');
echo json_encode(array("opere"=>$temp_array));
mysqli_close($mysqli);
?>
