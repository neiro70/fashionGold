<?php


    include("../../site/admin/mvc/util/MysqlDAO.php");
        
        $context= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        $var =explode("/",$context);
        
        if (strpos($context, "localhost") !== false) {
            $context="http://" .$var[0]."/".$var[1];
        }else{
            $context="http://" .$var[0];
        }

        $db = new MySQL ();
        
    $node = array();
    $nodeCatalogo = array();
    $posCatalogo=1;
        $pos=1;
        $idTipo=2;

        $sql="SELECT m01.idImagen,t01.txtCodigo,t01.idLinea,t01.idProducto,t01.isOferta, t01.txtTitulo,t01.dPrecioComercial,t01.dPrecioOferta,t01.txtDescripcion,c02.txtDescripcion AS estatus,c01.txtdescripcion as tipo,t01.idStatus
            FROM t01producto t01 
            INNER JOIN c02estatus c02 ON c02.idEstatus=t01.idStatus 
            INNER JOIN c01tipo c01 ON c01.idtipo = t01.idTipo 
            LEFT JOIN t02imagen m01 ON m01.idProducto = t01.idProducto 
            WHERE 1=1 AND t01.idTipo = {$idTipo}";
        
    $sqlCatalogo="SELECT * FROM c01tipo";



        $conn=$db->getConexion();

    $result = $conn->query($sql);
    $resultCatalogo = $conn->query($sqlCatalogo);

        setlocale(LC_MONETARY, 'es_MX');
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $idLinea=$row['idLinea'];
                $idProducto=$row["idProducto"];
			
                $txtDescripcion=mb_convert_encoding($row["txtDescripcion"],'UTF-8','ISO-8859-1');
                $txtTitulo=mb_convert_encoding($row["txtTitulo"],'UTF-8','ISO-8859-1');
                $dPrecioComercial= money_format('%n',$row["dPrecioComercial"])." MXN" ;
                $dPrecioOferta= money_format('%n',$row["dPrecioOferta"])." MXN";

                
                $estatus=$row["estatus"];
                $tipo=$row["tipo"];
                $isOferta=$row["isOferta"];
                $txtCodigo=$row["txtCodigo"];

                $idImagen=$row["idImagen"];
                $ran=rand();
                
                $imagen="site/admin/mvc/view/producto/controller/ctrlGetFile.php?idimg={$idImagen}&r={$ran}";
                
                $node[$pos++]=array('descripcion'=>$txtDescripcion,'precio'=>$dPrecioComercial,'titulo'=>"$idLinea-$txtCodigo-$txtTitulo",'imagen'=>$imagen,'oferta'=> $isOferta,'precioAnterior'=>$dPrecioOferta,'idProducto'=>$idProducto);
                
        

            }
    }
    
    if ($resultCatalogo->num_rows > 0) {
            // output data of each row
            while($row =  $resultCatalogo->fetch_assoc()) {
                $txtDescripcion=mb_convert_encoding($row["txtdescripcion"],'ISO-8859-1','UTF-8');
                $txturl=$row["txturl"];
                $idTipo=$row["idtipo"];
                $nodeCatalogo[$posCatalogo++]=array('descripcion'=>$txtDescripcion,'idTipo'=>$idTipo,'url'=>$txturl);
            }
        }



    $db->closeSession();
	$title="Gargantillas | Fashion Gold";
	$image="necklances/banner_collares.jpg";
?>

<!doctype html>
<html lang="en" class="no-js">

	<?php include "../../site/template/head.php";?>

    <body itemscope itemtype="http://schema.org/WebPage" class="templateCollection">

		<?php include "../../site/template/header.php";?>
		<?php include "../../site/template/content.php";?>
		<?php include "../../site/template/footer.php";?>
		<?php include "../../site/template/modal.php";?>

		<script type="text/javascript">
			jQuery('.currencies li').on(clickEv, function() {
				if (!$(this).hasClass('active')) {
					jQuery('.currencies li').removeClass('active');
					var cls = jQuery(this).attr('class');
					jQuery('.' + cls).addClass('active');

					var selectedValue = jQuery(this).find('input[type=hidden]').val();
					jQuery('.currencies_src option[value=' + selectedValue + ']').attr('selected', true);
					jQuery('.currencies_src').change();
					jQuery('.currency').removeClass('open');
				}
			});
		</script>

		<script>
			jQuery(function() {
				jQuery('.swatch :radio').change(function() {
					var optionIndex = jQuery(this).closest('.swatch').attr('data-option-index');
					var optionValue = jQuery(this).val();
					jQuery(this)
						.closest('form')
						.find('.single-option-selector')
						.eq(optionIndex)
						.val(optionValue)
						.trigger('change');
				});
			});
		</script>


		
		<!-- Google Code --> 
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-55571446-8', 'auto');
			ga('require', 'displayfeatures');
			ga('set', 'dimension1', 'sf_jewelry');
			ga('set', 'dimension2', 'jewelry_store');
			ga('send', 'pageview');
		</script>

	</body>

</html>