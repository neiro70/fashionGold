<?php


	$contexto= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$var =explode("/",$contexto);
	if (strpos($contexto, "localhost") !== false) {
		$contexto="http://" .$var[0]."/".$var[1];
	}else{
		$contexto="http://" .$var[0];
	}
	
$idProducto=trim($_GET['idproducto']);
header('Content-Type: application/json; charset=UTF-8');
include("../../../util/MysqlDAO.php");
$entrys;
$db = new MySQL ();

$sql="SELECT  idImagen, txtNombre FROM t02imagen  WHERE idProducto=$idProducto  ";

$conn=$db->getConexion();

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
			
		$txtNombre=$row["txtNombre"];
		
		//$src=$txtnombre;
		//$data = base64_decode($row["txtbase64"]);
		$idImagen=$row["idImagen"];
		

		//$liga="<a href='controller/ctrlGetFile.php?idimg={$idimgproducto}' target='_blank' >{$txtnombre} </a>";
		//$ligaEliminar="<a href='#' onclick='eliminarFile({$row["idimgproducto"]})'  ><i class='fa fa-trash'></i> </a>";
		$thumbnail="<img class='img-thumbnail' src='$contexto/site/admin/mvc/view/producto/controller/ctrlGetFile.php?idimg={$idImagen}' alt='{$txtNombre}'>";
		$entrys[]= array('thumbnail'=>$thumbnail,'idimg'=>$idImagen);

	}
	/*if(count($entrys) > 0) {
		$data=array('data'=>$entrys);
	}*/

}
/*if(count(isset($entrys)?$entrys:array()) == 0) {
	$data=array('data'=>array());
}*/

$db->closeSession();
$json_string = json_encode($entrys);
echo $json_string;

?>