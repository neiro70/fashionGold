<?php
	include("../site/admin/mvc/util/MysqlDAO.php");
	
	$context= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	$var =explode("/",$context);
	
	if (strpos($context, "localhost") !== false) {
		$context="http://" .$var[0]."/".$var[1];
	}else{
		$context="http://" .$var[0];
	}

	$nodeNuevo = array();
	$nodeDestacado = array();
	$nodeCatalogo = array();
    $posCatalogo=1;
	$posNuevo=1;
	$posDestacado=1;

	$sql="SELECT m01.idImagen,t01.txtCodigo,t01.idProducto,t01.isOferta,t01.txtTitulo,t01.dPrecioComercial,t01.dPrecioOferta,
			t01.txtDescripcion,c02.txtDescripcion AS estatus,c01.txtdescripcion as tipo,t01.idStatus,t01.isNuevo,t01.isDestacado
			FROM t01producto t01 INNER JOIN c02estatus c02 ON c02.idEstatus=t01.idStatus INNER JOIN c01tipo c01 ON c01.idtipo = t01.idTipo 
			LEFT JOIN t02imagen m01 ON m01.idProducto = t01.idProducto WHERE 1=1 OR isNuevo=1 OR isDestacado=1 ";
	
	$sqlCatalogo="SELECT * FROM c01tipo";

	$db = new MySQL ();
	$conn=$db->getConexion();
	
	setlocale(LC_MONETARY, 'es_MX');
	
	$result = $conn->query($sql);
	$resultCatalogo = $conn->query($sqlCatalogo);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {// output data of each row
			$idProducto=$row["idProducto"];
			$txtTitulo=mb_convert_encoding($row["txtTitulo"],'ISO-8859-1','UTF-8');
			$dPrecioComercial= money_format('%n',$row["dPrecioComercial"])." MXN" ;
			$dPrecioOferta= money_format('%n',$row["dPrecioOferta"])." MXN";
			$txtDescripcion=mb_convert_encoding($row["txtDescripcion"],'ISO-8859-1','UTF-8');
			$estatus=$row["estatus"];
			$tipo=$row["tipo"];
			$isOferta=$row["isOferta"];
			$isNuevo=$row["isNuevo"];
			$isDestacado=$row["isDestacado"];
			$txtCodigo=$row["txtCodigo"];
			$idImagen=$row["idImagen"];
			$ran=rand();
			$imagen="$context/site/admin/mvc/view/producto/controller/ctrlGetFile.php?idimg={$idImagen}&r={$ran}";
				
			if($isNuevo=="1"){
				$nodeNuevo[$posNuevo++]=array('descripcion'=>$txtDescripcion,'precio'=>$dPrecioComercial,'titulo'=>"$txtCodigo - $txtTitulo",
				'imagen'=>$imagen,'oferta'=> $isOferta,'precioAnterior'=>$dPrecioOferta,'idProducto'=>$idProducto);
			}

			if($isDestacado=="1"){
				$nodeDestacado[$posDestacado++]=array('descripcion'=>$txtDescripcion,'precio'=>$dPrecioComercial,'titulo'=>"$txtCodigo - $txtTitulo",
				'imagen'=>$imagen,'oferta'=> $isOferta,'precioAnterior'=>$dPrecioOferta,'idProducto'=>$idProducto);
			}
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
?>

<!doctype html>
<html lang="en" class="no-js">

	<?php include "../site/template/headIndex.php";?>

	<body itemscope itemtype="http://schema.org/WebPage" class="templateIndex">
	
		<?php include "../site/template/header.php";?>

		<!--Start wrapper-->
		<div id="content-wrapper-parent">
			<div id="content-wrapper">
				
				<!--Start the slider-->
				<div class="home-slider-wrapper clearfix">
					<div class="camera_wrap" id="home-slider">
						
						<div data-src="<?php echo $context ?>/site/img/collection/navidad2.jpeg">
							<div class="camera_caption camera_title_1 fadeIn moveFromLeft">	
							
									<!--p style="color: #010101;" class='chopsFont' > Bienvenido </p-->
									  <img src="<?php echo $context ?>/site/img/expo.jpeg" style='margin-top:-4em; width: 256px;'>							
									<!-- a href="http://www.espaciosalpro.com/">
										<img src="<?php echo $context ?>/site/img/collection/expo2019.jpg" style='margin-top:-2em'>
									</a -->
									<!--div style="color: #000; margin-top:-11em;"><b>VISITANOS FASHION GOLD EN EL STAND #112</b>
									</div-->

									
								    <!--img src="<?php echo $context ?>/site/img/collection/madre.jpg" style='margin-top:-3em'>
									<div style="color: #000; margin-top:-2em;"><b>Encuentra en FashionGold el detalle perfecto para este 10 de mayo</b></div-->

							</div>
							<!--div class="camera_caption camera_caption_1 fadeIn" style="color: #010101;">
								La joya ideal para ti
							</div>
							<div class="camera_cta_1">
								<a href="<?php echo $context ?>/site/collections/general.php" class="btn">
									Ver c&aacute;talogo
								</a>
							</div -->
						</div>

						<div data-src="<?php echo $context ?>/site/img/collection/navidad2.jpeg">
							<div class="camera_caption camera_title_1 fadeIn moveFromLeft">

									<p style="color: #010101;" class='chopsFont'>  
										Encuentra en FashionGold el mejor regalo 
									</p>

							</div>
							<div class="camera_cta_1">
								<a href="<?php echo $context ?>/site/collections/general.php" class="btn">
									Ver c&aacute;talogo
								</a>
							</div>
						</div>

						<div data-src="<?php echo $context ?>/site/img/collection/navidad2.jpeg">
							<div class="camera_caption camera_title_1 fadeIn moveFromLeft">
								
									<p class='chopsFont' style="color: #010101;">
										Te invitamos a ver nuestros c&aacute;talogos
									</p>
								
							</div>
							<div class="camera_cta_1">
								<a href="<?php echo $context ?>/site/collections/general.php" class="btn">
									Ver C&aacute;talogo
								</a>
							</div>
						</div>

					</div>
				</div>

				<!-- Content -->
				<div id="content" class="clearfix">
					<section class="content">
						<div id="col-main" class="clearfix">
							<div class="home-popular-collections">
								<div class="container">
									<div class="group_home_collections row">
										<div class="col-md-24">
											<div class="home_collections">
												<h6 class="general-title">M&aacute;s Populares</h6>
												<div class="home_collections_wrapper">
													<div id="home_collections">

														<div class="home_collections_item">
															<div class="home_collections_item_inner">
																<div class="collection-details">
																	<a href="<?php echo $context ?>/site/collections/bracelets.php" title="Buscar Pulseras">
																		<img src="../site/img/collection/bracelets/13.jpg" alt="Puleras" />
																	</a>
																</div>
																<br><br><br><br>
																<div class="hover-overlay">
																	<span class="col-name">
																		<a href="<?php echo $context ?>/site/collections/bracelets.php">Pulseras</a>
																	</span>
																	<div class="collection-action">
																		<a href="<?php echo $context ?>/site/collections/bracelets.php">
																		<i class="fa fa-eye"></i> Ver Colecci&oacute;n</a>
																	</div>
																</div>
															</div>
														</div>

														<div class="home_collections_item">
															<div class="home_collections_item_inner">
																<div class="collection-details">
																	<a href="<?php echo $context ?>/site/collections/otherBracelets.php" title="Buscar Brazaletes">
																		<img src="../site/img/collection/bracelets/20.jpg" alt="Brazaletes" />
																	</a>
																</div>
																<br><br><br><br>
																<div class="hover-overlay">
																	<span class="col-name">
																		<a href="<?php echo $context ?>/site/collections/otherBracelets.php">Brazaletes</a>
																	</span>
																	<div class="collection-action">
																		<a href="<?php echo $context ?>/site/collections/otherBracelets.php">
																		<i class="fa fa-eye"></i> Ver Colecci&oacute;n</a>
																	</div>
																</div>
															</div>
														</div>														

														<div class="home_collections_item">
															<div class="home_collections_item_inner">
																<div class="collection-details">
																	<a href="<?php echo $context ?>/site/collections/games.php" title="Buscar Juegos">
																		<img src="../site/img/collection/games/19.jpg" alt="Juego" /> 
																	</a>
																</div>
																<br><br><br>
																<div class="hover-overlay">
																	<span class="col-name">
																		<a href="<?php echo $context ?>/site/collections/games.php">Juegos (SET)</a>
																	</span>
																	<div class="collection-action">
																		<a href="<?php echo $context ?>/site/collections/games.php">
																		<i class="fa fa-eye"></i> Ver Colecci&oacute;n</a>
																	</div>
																</div>
															</div>
														</div>

														<div class="home_collections_item">
															<div class="home_collections_item_inner">
																<div class="collection-details">
																	<a href="<?php echo $context ?>/site/collections/earrings.php" title="Buscar Aretes">
																		<img src="<?php echo $context ?>/site/img/collection/aretes/H1.jpg" width="100%" alt="Aretes" />
																	</a>
																</div>
																<br><br><br><br>
																<div class="hover-overlay">
																	<span class="col-name">
																		<a href="<?php echo $context ?>/site/collections/earrings.php">Aretes</a>
																	</span>
																	<div class="collection-action">
																		<a href="<?php echo $context ?>/site/collections/earrings.php">
																		<i class="fa fa-eye"></i> Ver Colecci&oacute;n</a>
																	</div>
																</div>
															</div>
														</div>

														<div class="home_collections_item">
															<div class="home_collections_item_inner">
																<div class="collection-details">
																	<a href="<?php echo $context ?>/site/collections/necklaces.php" title="Buscar Gargantillas"> 
																		<img src="../site/img/collection/necklances/8.jpg" alt="Gargantillas" />
																	</a>
																</div>
																<br><br><br>
																<div class="hover-overlay">
																	<span class="col-name">
																		<a href="<?php echo $context ?>/site/collections/necklaces.php">Gargantillas</a>
																	</span>
																	<div class="collection-action">
																		<a href="<?php echo $context ?>/site/collections/necklaces.php">
																		<i class="fa fa-eye"></i> Ver Colecci&oacute;n</a>
																	</div>
																</div>
															</div>
														</div>

														<div class="home_collections_item">
															<div class="home_collections_item_inner">
																<div class="collection-details">
																	<a href="<?php echo $context ?>/site/collections/rings.php" title="Buscar Anillos">
																		<img src="../site/img/collection/rings/A10.jpg" alt="Anillos" />
																	</a>
																</div>
																<br><br>
																<div class="hover-overlay">
																	<span class="col-name">
																		<a href="<?php echo $context ?>/site/collections/rings.php">Anillos</a>
																	</span>
																	<div class="collection-action">
																		<a href="<?php echo $context ?>/site/collections/rings.php">
																		<i class="fa fa-eye"></i> Ver Colecci&oacute;n</a>
																	</div>
																</div>
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="home-newproduct">
								<div class="container">
									<div class="group_home_products row">
										<div class="col-md-24">
											<div class="home_products">
												<h6 class="general-title">Nuevos Productos</h6>
												<div class="home_products_wrapper">
													<div id="home_products">
														<?php 
															foreach($nodeNuevo as $posicion=>$registro){	
																if($registro['oferta'] == 1 ){
																	$divOferta="
																					<div class='element no_full_width col-md-8 col-sm-8 not-animated'
																					data-animate='fadeInUp' data-delay='0'>
																				<ul class='row-container list-unstyled clearfix'>
																				<li class='row-left'>
																	<a onClick='previewProducto({$registro['idProducto']})'  data-target='#myModalFrame' data-toggle='modal'>
																						<img style='cursor: pointer;'
																						src='{$registro['imagen']}' class='img-responsive' alt='{$registro['titulo']}' />
																						<span class='sale_banner'> <span class='sale_text'>Oferta</span> </span> 
																					</a>
																				</li>
																				<li class='row-right parent-fly animMix'>
																				<div class='product-content-left'>
																					<a class='title-5'	href='#'>{$registro['titulo']}</a> 
																					<span class='shopify-product-reviews-badge' data-id='registro{$registro['idProducto']}'></span></div>
																					<div class='product-content-right'>
																					<div class='product-price'>
																					<span class='price_sale'>
																					<span class='money'>{$registro['precioAnterior']} </span></span>
																					<del class='price_compare'> 
																					<span class='money'>{$registro['precio']} </span></del></div>
																				</div>
																				<div class='list-mode-description'>{$registro['descripcion']}</div>
																				</li>
																			</ul>
																		</div>";
																	echo $divOferta;
																}else{
																	$divComercial="
																		<div class='element no_full_width col-md-8 col-sm-8 not-animated' data-animate='fadeInUp' data-delay='0'>
																			<ul class='row-container list-unstyled clearfix'>
																				<li class='row-left'>
																					<a onClick='previewProducto({$registro['idProducto']})'  data-target='#myModalFrame' data-toggle='modal'>
																						<img style='cursor: pointer;' src='{$registro['imagen']}' class='img-responsive' alt='{$registro['titulo']}' />
																					</a>
																				</li>
																				<li class='row-right parent-fly animMix'>
																					<div class='product-content-left'>
																						<a class='title-5' href='#'> {$registro['titulo']}</a>
																						<span class='shopify-product-reviews-badge' data-id='registro{$posicion}'></span>
																					</div>
																					<div class='product-content-right'>
																						<div class='product-price'>
																							<span class='price'> 
																								<span class='money'>{$registro['precio']} </span>
																							</span>
																						</div>
																					</div>
																					<div class='list-mode-description'>{$registro['descripcion']}</div>
																				</li>
																			</ul>
																		</div>";
																	echo $divComercial;
																}	
															}
														?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="home-banner-wrapper">
								<div class="container">
									<div id="home-banner" class="text-center clearfix"><img class="pulse img-banner-caption" src="img/collection/muneca3.png" alt="" />
										<div class="home-banner-caption">
											<p>Si deseas incrementa tus ingresos, somos la mejor opci&oacute;n pues manejamos diferentes rangos de descuento dependiendo tu monto de inversi&oacute;n, entendiendo que entre m&aacute;s inviertas mayor ser&aacute; el descuento.</p>
										</div>
										<div class="home-banner-action"><a href="<?php echo $context?>/site/pages/contact.php">Cont&aacute;ctenos</a></div>
									</div>
								</div>
							</div>

							<div class="home-blog">
								<div class="container">
									<div class="home-promotion-blog row">
										<h6 class="general-title">Noticias</h6>
										<div class="home-bottom_banner_wrapper col-md-12">
											<div id="home-bottom_banner" class="home-bottom_banner">
												<img src="<?php echo $context ?>/site/img/collection/laminado/collars.jpg" alt="" />
											</div>
										</div>

										<div class="home-blog-wrapper col-md-12">
											<div id="home_blog" class="home-blog">
												<div class="home-blog-item row">
													<div class="date col-md-4">
														<div class="date_inner">
															<p><small>Julio</small><span>08</span></p>
														</div>
													</div>
													<div class="home-blog-content col-md-20">
														<h4>Oferta del mes</h4>
														<ul class="list-inline">
															<li class="author"><i class="fa fa-user"></i> Fashion Gold</li>
															<!--li>/</li>
															<li class="comment"><span><i class="fa fa-pencil-square-o"></i> 1</span> Comentarios</li-->
														</ul>
														<div class="intro">Puedes invertir desde $1,200 MXN y obtendr&aacute;s un 20% de descuento y puedes obtener hasta un 55% de descuento.</div>
													</div>
												</div>
												<div class="home-blog-item row">
													<div class="date col-md-4">
														<div class="date_inner">
															<p><small>Julio</small><span>07</span></p>
														</div>
													</div>

													<div class="home-blog-content col-md-20">
														<h4>Informaci&oacute;n</h4>
														<ul class="list-inline">
															<li class="author"><i class="fa fa-user"></i> Fashion Gold</li>
															<!--li>/</li>
															<li class="comment"><span><i class="fa fa-pencil-square-o"></i> 1</span>Comentarios</li-->
														</ul>
														<div class="intro">
															<ol>
																<li>* Aceptamos devoluciones en un 30% de tu pr&oacute;xima compra</li>
																<li>* Contamos con m&aacute;s de 300 modelos diferentes entre aretes, arracadas, broqueles, gargantillas, pulseras y juegos</li>
																<li>* Modelos nuevos e innovadores cada 20 d&iacute;as</li>
																<li>* Enviamos a toda la rep&uacute;blica</li>
															</ol>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="home-feature">
								<div class="container">
									<div class="group_featured_products row">
										<div class="col-md-24">
											<div class="home_fp">
												<h6 class="general-title">Productos Destacados</h6>
													<div class="home_fp_wrapper">
														<div id="home_fp">
															<?php 
																foreach($nodeDestacado as $posicion=>$registro){
																	if($registro['oferta'] == 1 ){
																		$divDestacadoOferta="<div class='element no_full_width not-animated' data-animate='fadeInUp' data-delay='0'>
																								<ul class='row-container list-unstyled clearfix'>
																				<li class='row-left'>
																				<a onClick='previewProducto({$registro['idProducto']})'  data-target='#myModalFrame' data-toggle='modal'> 
																					<img style='cursor: pointer;'
																										src='{$registro['imagen']}' class='img-responsive'
																										alt='{$registro['titulo']}' /> <span class='sale_banner'> <span
																										class='sale_text'>Oferta</span> </span> </a>
																									</li>
																								
																									<li class='row-right parent-fly animMix'>
																									<div class='product-content-left'><a class='title-5'
																										href='#'>{$registro['titulo']}</a> <span
																										class='shopify-product-reviews-badge' data-id='registro{$registro['titulo']}'></span></div>
																									<div class='product-content-right'>
																									<div class='product-price'><span class='price_sale'><span class='money'>{$registro['precioAnterior']}
																									</span></span> <del class='price_compare'> <span class='money'>{$registro['precio']}
																									</span></del></div>				
																									</div>
																									<div class='list-mode-description'>{$registro['descripcion']}</div>
																								</ul>
																								</div>";
																		echo $divDestacadoOferta;
																	}else{
																		$divDestacadoComercial="<div class='element no_full_width not-animated' data-animate='fadeInUp'
																							data-delay='200'>
																						<ul class='row-container list-unstyled clearfix'>
																			<li class='row-left'>
																			<a onClick='previewProducto({$registro['idProducto']})'  data-target='#myModalFrame' data-toggle='modal'>
																				<img style='cursor: pointer;'
																								src='{$registro['imagen']}' class='img-responsive'
																								alt='{$registro['titulo']}' /> </a>
																													
																							</li>
																						
																							<li class='row-right parent-fly animMix'>
																							<div class='product-content-left'><a class='title-5'
																								href='#'>{$registro['titulo']}</a> <span
																								class='shopify-product-reviews-badge' data-id='resgitro{$registro['titulo']}'></span></div>
																							<div class='product-content-right'>
																							<div class='product-price'><span class='price'> <span class='money'>{$registro['precio']}</span> </span></div>
																							</div>
																							<div class='list-mode-description'>{$registro['descripcion']}</div>
																							</li>
																						</ul>
																						</div>";
																		echo $divDestacadoComercial;
																	}
																}
															?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="home-partners">
								<div class="container">
									<div class="partners-logo row">
										<div class="col-md-24">
											<div id="partners-container" class="clearfix">
												<h6 class="general-title">CONTÁCTENOS</h6>
												<div id="map"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>

		<?php include "../site/template/footer.php";?>

		<div class="newsletter-popup" style="display: none;">
			<form action="" method="post" name="mc-embedded-subscribe-form" target="_blank">
				<h3>Bienvenido  FashionGold</h3>
			</form>
				<!--<div class="group_input"><input class="form-control" type="email"-->
				<!--	name="EMAIL" placeholder="YOUR EMAIL" />--> <!--<button class="btn" type="submit"><i class="fa fa-paper-plane"></i></button>-->
				<!--</div>-->
				<!--<div id="popup-hide"><input type="checkbox" id="mc-popup-hide" value="1"-->
				<!--	checked="checked"> <label for="mc-popup-hide">No volver a ver este mensaje-->
				<!--</label></div>-->
			<li id="widget-social">
				<ul class="list-inline">
					<li>
						<a 	target="_blank" 
							href="https://www.facebook.com/pg/fashionGold5/about/?ref=page_internal"
							class="btooltip swing" 
							data-toggle="tooltip" 
							data-placement="bottom"
							title="Facebook">
							<i class="fa fa-facebook"></i>
							Facebook
						</a>
					</li>
					<li>
						<a 	target="_blank" 
							href="https://twitter.com/fashiongold2018/"
							class="btooltip swing" 
							data-toggle="tooltip" 
							data-placement="bottom"
							title="twitter">
							<i class="fa fa-twitter"></i>
							Twitter
						</a>
					</li>
					<li>
						<a 	target="_blank" 
							href="https://www.instagram.com/fashiongold2018/"
							class="btooltip swing" 
							data-toggle="tooltip" 
							data-placement="bottom"
							title="instagram">
							<i class="fa fa-instagram"></i>
							Instagram
						</a>
					</li>
				</ul>
			</li>
		</div>

		<!-- Modal -->
		<div class="container">
			<div class="modal fade" id="myModalFrame">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="background-color: #9D802E; color:#FFF;  border-top-left-radius: 5px; border-top-right-radius: 5px; ">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h4 class="modal-title" style="color:#FFF;">Detalle del Producto</h4>
						</div>
						<div class="modal-body">
							<iframe src="" 
									frameborder="0" 
									id="targetiframe"
									name="targetframe" 
									allowtransparency="true">
							</iframe> 
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal parte 2-->
		<script>
			function previewProducto(idProducto) {
				var src = '<?=$context?>/site/admin/mvc/view/producto/viewProducto.php?idproducto=' + idProducto+'&r='+Math.random();
				var height = $(this).attr('data-height') || '450px';
				var width = $(this).attr('data-width') || '100%';
				$("#targetiframe").attr({
					'src': src,
					'height': height,
					'width': width
				});
			}
		</script>

		<script src="http://fashiongold.com.mx/library/files/1/0908/7252/t/2/assets/cs.global.js" type="text/javascript"></script> 
		<script type="text/javascript">
			if (typeof Shopify.onCartShippingRatesUpdate === 'undefined') {
				document.write("\u003cscript src=\"\/\/cdn.shopify.com\/s\/assets\/themes_support\/api.jquery-249bc01571641fb7bf9bf82378ba6333e9abdcc34aad49eb9e4edb01557b7dac.js\" type=\"text\/javascript\"\u003e\u003c\/script\u003e");
			}    
		</script> 

		<script type="text/javascript">
			var map;
			$(document).ready(function() {
				prettyPrint();
				map = new GMaps({
					div: '#map',
					lat: 19.435202,
					lng: -99.134932,
					zoom: 17
				});

				map.addMarker({
					lat: 19.435202,
					lng: -99.134932,
					title: 'FashionGold',
					details: {
						database_id: 42,
						author: 'FashionGold'
					},
					infoWindow: {
						content: '<p>Calle Palma #2 Despacho 104 Edificio Burgos interior 4, Col. Centro, Ciudad de México</p>'
					},
					mouseover: function() {
						(this.infoWindow).open(this.map, this);
					},
					mouseout: function() {
						this.infoWindow.close();
					},
					click: function(e) {
						window.top.location.href = '<?php echo $context ?>/site/pages/contact.php';
					}
				});

			});
		</script>

		<script src="services/javascripts/currencies.js" type="text/javascript"></script>
		<script src="../library/files/1/0908/7252/t/2/assets/jquery.currencies.min.js%3F14058599523483859647" type="text/javascript"> </script>
		<script type="text/javascript">  
			jQuery('.currencies li').on(clickEv, function() {
				if(!$(this).hasClass('active')){
				jQuery('.currencies li').removeClass('active');
				var cls = jQuery(this).attr('class');
				jQuery('.' + cls).addClass('active');
				
				var selectedValue = jQuery(this).find('input[type=hidden]').val();
				jQuery('.currencies_src option[value='+selectedValue+']').attr('selected', true);
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
  
 	 	<!--Androll--> 
  		<script type="text/javascript">
			adroll_adv_id = "HTF7KIWJRBHHXL46WLUDBC";
			adroll_pix_id = "IE5CHDRTR5ABXH2P6QXAVM";
			(function () {
				var oldonload = window.onload;
				window.onload = function(){
					__adroll_loaded=true;
					var scr = document.createElement("script");
					var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
					scr.setAttribute('async', 'true');
					scr.type = "text/javascript";
					scr.src = host + "/j/roundtrip.js";
					((document.getElementsByTagName('head') || [null])[0] || document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
					if(oldonload){oldonload()}
				};
			}());
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
