<?php 
 
 	header('Content-Type: text/html; charset=iso-8859-1');
 	include("../../../../mvc/util/MysqlDAO.php");

	//$txtDescripcion=utf8_decode(trim($_POST['txtDescripcion']));
	//$txtDescripcion=mb_convert_encoding(trim($_POST['txtDescripcion']),'ISO-8859-1','UTF-8');
	$txtDescripcion=trim($_POST['txtDescripcion']);
 	$txtPrecio=$_POST["txtPrecio"]!=null ?$_POST["txtPrecio"]:0;
 	$idOferta=trim($_POST['idOferta']);
 	$txtPrecioOld=trim($_POST['txtPrecioOld']);
 	$txtTitulo= trim($_POST['txtTitulo']);
 	$idTipo= trim($_POST['idTipo']);
 	$isDestacado=trim($_POST['isDestacado']);
 	$isNuevo=trim($_POST['isNuevo']);
 	$idCodigo=trim($_POST['idCodigo']);
 	$idLinea=trim($_POST['idLinea']);


 	
 	$finalizar=isset($_POST["finalizar"])?(int)$_POST["finalizar"]:0;
 	
 	//idProducto=11&txtTitulo=titulo&txtDescripcion=descripcion&idTipo=2&txtPrecio=5555&idOferta=0&txtPrecioOld=7777
 	
 	//LOCAL
	//$txtfabricante=utf8_decode(trim($_POST['txtfabricante']));
	//$txtemblema=utf8_decode(trim($_POST['txtemblema']));
	//$txtmo= utf8_decode(trim($_POST['txtmo']));	
	//$txtcaraterinova=utf8_decode(trim($_POST['txtcaraterinova']));
	//$txtdefinicion=utf8_decode(trim($_POST['txtdefinicion']));
	//$txtvalores=utf8_decode(trim($_POST['txtvalores']));
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

    

 
