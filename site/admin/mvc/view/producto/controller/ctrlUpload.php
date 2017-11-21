<?php 
// You need to add server side validation and better error handling here
header('Content-Type: text/html; charset=UTF-8');
include("../../../../mvc/util/MysqlDAO.php");
$data = array();

if(isset($_GET['files']))
{
	$files = array();
	$contador=0;

	$idProducto=trim($_POST['idProducto']);
	
	$db = new MySQL ();  		
	$conn=$db->getConexion();
	
	
	
	
	$sqlFind="SELECT count(idImagen) contador  FROM t02imagen WHERE idProducto = $idProducto  ";
	
	$resultFind = $conn->query($sqlFind);
	
	
	if ($resultFind->num_rows > 0) {
	// output data of each row
		while($row = $resultFind->fetch_assoc()) {
			$contador=$row["contador"];
		}
	
	}
	
	
	
	
	foreach($_FILES as $file){	
		
		$txtNombre=$file['name'];
		$base64=base64_encode(file_get_contents($file['tmp_name']));
		
		if($contador == 0){
			$sql="INSERT INTO t02imagen (idProducto,imagen,txtNombre)
			VALUES ('{$idProducto}','{$base64}','{$txtNombre}')";
		}else{
			$sql="UPDATE t02imagen SET imagen='{$base64}',txtNombre='{$txtNombre}' WHERE idProducto={$idProducto} ";
			
		}
		
		if ($conn->query($sql) === TRUE) {
			$data = array('success' => 1);
		} else {
			$data = array('error' => 0);
		}
		
	
	}
	
	$db->closeSession();

}
else
{
	$data = array('error' => 0);
}


echo json_encode($data);

?>

	

			