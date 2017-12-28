<?php 
 
 	header('Content-Type: text/html; charset=UTF-8');
 	include("../../../../mvc/util/MysqlDAO.php");
	$contexto= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$var =explode("/",$contexto);
	$isLocal=true;
	
	if (strpos($contexto, "localhost") !== false) {
		 $contexto="http://" .$var[0]."/".$var[1];
		 
	}else{
		 $contexto="http://" .$var[0];
		 $isLocal=false;
	 }

	 if($isLocal){
		$txtTitulo=$_POST["txtTitulo"];
		$txtDescripcion=$_POST["txtDescripcion"];
	}else{
		$txtTitulo=mb_convert_encoding($_POST["txtTitulo"],'UTF-8','ISO-8859-1');
		$txtDescripcion=mb_convert_encoding($_POST["txtDescripcion"],'UTF-8','ISO-8859-1');
	}	

	
 	$txtPrecio=$_POST["txtPrecio"]!=null ?$_POST["txtPrecio"]:0;
 	$idOferta=trim($_POST['idOferta']);
 	$txtPrecioOld=trim($_POST['txtPrecioOld']);
 	$idTipo= trim($_POST['idTipo']);
 	$isDestacado=trim($_POST['isDestacado']);
 	$isNuevo=trim($_POST['isNuevo']);
 	$idCodigo=trim($_POST['idCodigo']);
 	$idLinea=trim($_POST['idLinea']); 	
 	$finalizar=isset($_POST["finalizar"])?(int)$_POST["finalizar"]:0; 
	$idproducto=$_POST['idProducto'];
	
	$db = new MySQL();  
	
	//idUsuario, idStatus, idImagen,dPrecioComercial,dPrecioOferta,isOferta,txtDescripcion,txtTitulo,
	if($finalizar > 0){
			$sql="UPDATE t01producto SET idStatus = $finalizar,idLinea='{$idLinea}',idTipo={$idTipo},dPrecioComercial='{$txtPrecio}',isOferta='{$idOferta}',dPrecioOferta={$txtPrecioOld},txtCodigo='{$idCodigo}',
			txtDescripcion='{$txtDescripcion}',txtTitulo='{$txtTitulo}',isDestacado='{$isDestacado}',isNuevo='{$isNuevo}'	WHERE idProducto = {$idproducto}";
	}else{
			$sql="UPDATE t01producto SET idStatus = 2,idLinea='{$idLinea}',idTipo={$idTipo},dPrecioComercial='{$txtPrecio}',isOferta='{$idOferta}',dPrecioOferta={$txtPrecioOld},txtCodigo='{$idCodigo}',
			txtDescripcion='{$txtDescripcion}',txtTitulo='{$txtTitulo}',isDestacado='{$isDestacado}',isNuevo='{$isNuevo}'	WHERE idProducto = {$idproducto}";
	}

	
	
	$conn=$db->getConexion();
	 
	
	if ($conn->query($sql) === TRUE) {
		echo "Se actualizo producto! ";
	} else {
		echo "Error: ".$conn->error;
	}
	

	$db->closeSession();
	
	//echo "'{$txtnombre}','{$txtfabricante}','{$txtemblema}','{$txtmo}','{$fprecio}','{$txtcaraterinova}','{$txtdefinicion}','{$txtvalores}')";
?>

    

 
