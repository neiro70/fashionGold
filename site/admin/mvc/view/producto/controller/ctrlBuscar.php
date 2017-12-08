<?php

	header("Content-Type: text/json; charset=ISO-8859-1");
	include("../../../util/MysqlDAO.php");

	$db = new MySQL (); 
	$idTipo = isset($_GET['idTipo']) ? (int)trim($_GET['idTipo']) : 0;
	$idLinea = isset($_GET['idLinea']) ? trim($_GET['idLinea']) : 'TODAS';
	$entrys;

	if($idTipo > 0 && $idLinea != 'TODAS' ){
		
		$sql="SELECT t01.idProducto,t01.idLinea,t01.isOferta,t01.txtCodigo, t01.txtTitulo,t01.dPrecioComercial,t01.dPrecioOferta,t01.txtdescripcion as txtDescripcion,c02.txtDescripcion AS estatus,c01.txtdescripcion as tipo,t01.idStatus
		FROM t01producto t01 
		INNER JOIN c02estatus c02 ON c02.idEstatus=t01.idStatus 
		INNER JOIN c01tipo c01 ON c01.idtipo = t01.idTipo 
		WHERE t01.idTipo = {$idTipo} and t01.idLinea ='{$idLinea}' ";
		
	}else if($idTipo > 0  ){
		$sql="SELECT t01.idProducto,t01.idLinea,t01.isOferta,t01.txtCodigo, t01.txtTitulo,t01.dPrecioComercial,t01.dPrecioOferta,t01.txtdescripcion as txtDescripcion,c02.txtDescripcion AS estatus,c01.txtdescripcion as tipo,t01.idStatus
		FROM t01producto t01 
		INNER JOIN c02estatus c02 ON c02.idEstatus=t01.idStatus 
		INNER JOIN c01tipo c01 ON c01.idtipo = t01.idTipo 
		WHERE t01.idTipo = {$idTipo} ";

	}else if( $idLinea != 'TODAS'){
		$sql="SELECT t01.idProducto,t01.idLinea,t01.isOferta,t01.txtCodigo, t01.txtTitulo,t01.dPrecioComercial,t01.dPrecioOferta,t01.txtdescripcion as txtDescripcion,c02.txtDescripcion AS estatus,c01.txtdescripcion as tipo,t01.idStatus
		FROM t01producto t01 
		INNER JOIN c02estatus c02 ON c02.idEstatus=t01.idStatus 
		INNER JOIN c01tipo c01 ON c01.idtipo = t01.idTipo 
		WHERE t01.idLinea ='{$idLinea}' ";
	}else{
		$sql="SELECT t01.idProducto,t01.idLinea,t01.isOferta,t01.txtCodigo, t01.txtTitulo,t01.dPrecioComercial,t01.dPrecioOferta,t01.txtdescripcion as txtDescripcion,c02.txtDescripcion AS estatus,c01.txtdescripcion as tipo,t01.idStatus
		FROM t01producto t01 
		INNER JOIN c02estatus c02 ON c02.idEstatus=t01.idStatus 
		INNER JOIN c01tipo c01 ON c01.idtipo = t01.idTipo "; 
	}	 

		$conn=$db->getConexion();

		$result = $conn->query($sql);
		
		
		setlocale(LC_MONETARY, 'es_MX'); 
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$idLinea=$row["idLinea"];
				$idProducto=$row["idProducto"];
				$txtTitulo=$row["txtTitulo"];
				$dPrecioComercial= money_format('%n',$row["dPrecioComercial"]);
				$dPrecioOferta= money_format('%n',$row["dPrecioOferta"]);

				//$txtDescripcion=mb_convert_encoding($row["txtDescripcion"],'UTF-8','ISO-8859-1,UTF-8');				
				//$txtDescripcion=utf8_encode($row["txtDescripcion"]); 
				$txtDescripcion=$row["txtDescripcion"];
				//$txtDescripcion=mb_convert_encoding($row["txtDescripcion"],'UTF-8','auto');	
				
				$estatus=$row["estatus"];
				$tipo=$row["tipo"];
				$isOferta=$row["isOferta"];
				$txtCodigo=$row["txtCodigo"];
				
				if($isOferta == 0){
					$isOferta='NO';
				}else{
					$isOferta='SI';
				}
					
				

				$nestatus=$row["idStatus"];

				if($nestatus != 3){
					$ligaEditar="
				 			<button typhttp://fashiongold.com.mx/e='button class='btn btn-success'  onclick='editarProducto({$idProducto})' 
		                           		style='cursor: pointer;' title='Editar'>
		                           		<i class='fa fa-pencil-square-o'></i></button>
							</a>";

				}else{
					$ligaEditar="";

				}
					
				$ligaEliminar="
						<button type='button class='btn btn-success'  onclick='eliminarProducto({$idProducto})'
	                           		style='cursor: pointer;' title='Eliminar'><i class='fa fa-trash'></i></button>";
				$ligaPreview="
						<button type='button class='btn btn-success' onclick='previewProducto({$idProducto})' data-toggle='modal' data-target='#myModalFrame'
									style='cursor: pointer;' title='ver'><i class='fa fa-eye'></i></button> ";


				$entrys[]= array( $idLinea, $txtTitulo,$txtCodigo,$txtDescripcion,$estatus,$dPrecioComercial,$dPrecioOferta,$isOferta,$tipo,  $ligaPreview.$ligaEditar.$ligaEliminar);
				//echo $txtDescripcion;
			}
		}


		if($entrys != null && count($entrys) > 0) {
			$data=array('data'=>$entrys);
		}

		if(count(isset($entrys)?$entrys:array()) == 0) {
			$data=array('data'=>array());
		}

$db->closeSession();
$json_string = json_encode($data);
echo $json_string;
?>