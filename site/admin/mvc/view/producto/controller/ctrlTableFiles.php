<?php

	$idProducto=trim($_GET['idProducto']);
	header('Content-Type: application/json; charset=UTF-8');
	include("../../../util/MysqlDAO.php");
	$entrys;
	$db = new MySQL (); 

	$sql="SELECT idImagen,txtNombre FROM t02imagen WHERE idProducto = $idProducto  ";
	
	$conn=$db->getConexion();

	$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
			

		//$data = base64_decode($row["txtbase64"]);
		$idimgproducto=$row["idImagen"];
		$txtnombre=$row["txtNombre"];
		$ran=rand();
		
		$liga="<a href='controller/ctrlGetFile.php?idimg={$idimgproducto}' target='_blank' >{$txtnombre} </a>";	
		$ligaEliminar="<a href='#' onclick='eliminarFile({$idimgproducto})'  ><i class='fa fa-trash'></i> </a>";
		$thumbnail="<img class='img-thumbnail' src='controller/ctrlGetFile.php?idimg={$idimgproducto}&r={$ran}' alt='{$txtnombre}' width='100px'>";
		//$tipo="Nutrimental";
		//if($row["ntipo"]== 1){
		//	$tipo="Adjunto";
		//}
		
		$entrys[]= array( $liga,$thumbnail,$ligaEliminar);
		
	}
	if(count($entrys) > 0) {
		$data=array('data'=>$entrys);
	}

} 
if(count(isset($entrys)?$entrys:array()) == 0) {
	$data=array('data'=>array());
}

$db->closeSession();
$json_string = json_encode($data);
echo $json_string;

?>