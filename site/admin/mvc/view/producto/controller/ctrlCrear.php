<?php 
 
	session_start();
 	header('Content-Type: text/html; charset=UTF-8');
 	include("../../../../mvc/util/MysqlDAO.php");

 	$idusuario=$_SESSION['idusuario'];
 	
 	$idStatus=1;
	$dPrecioComercial=0.0;
	$dprecioMayoreo=0.0;
 	$dPrecioOferta=0.0;
 	$isOferta=0;

	
	$db = new MySQL();   
	
	
	
	$sql="INSERT INTO t01producto (idUsuario, idStatus,idTipo,dPrecioComercial,dprecioMayoreo,dPrecioOferta,isOferta,txtDescripcion,txtTitulo,fhregistro,idLinea) 
						   VALUES ($idusuario,$idStatus,1,$dPrecioComercial,$dprecioMayoreo,$dPrecioOferta,$isOferta,NULL,NULL,CURRENT_TIMESTAMP,'')";
			
	$conn=$db->getConexion();
	 
	
	if ($conn->query($sql) === TRUE) {
		echo $conn->insert_id;
	} else {
		echo 0;
	}
	

	$db->closeSession();
	

	

?>

    

 
