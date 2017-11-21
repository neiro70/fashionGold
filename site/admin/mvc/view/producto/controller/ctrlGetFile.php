<?php


include("../../../../mvc/util/MysqlDAO.php");
$idimg=trim($_GET['idimg']);	



$db = new MySQL (); 

$sql="SELECT  imagen, txtNombre FROM t02imagen WHERE idImagen = $idimg  ";

$conn=$db->getConexion();

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		
		$encodedString = str_replace(' ','+',$row["imagen"]);
		$data = base64_decode($encodedString);
		$nombre=$row["txtNombre"];
		file_put_contents($nombre,$data);
		$stream = fopen($nombre, 'r');
		header('Content-type:application/octet-stream');
		header("Content-disposition:attachment;filename={$nombre}");
		echo stream_get_contents($stream);
		//cierra el flujo
		fclose($stream);
		//borra el archivo
		unlink($nombre);
	}
}

$db->closeSession();

?>