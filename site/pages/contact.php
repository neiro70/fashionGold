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
	$nodeCatalogo = array();
	$posCatalogo=1;    
	$sqlCatalogo="SELECT * FROM c01tipo";

		$conn=$db->getConexion();
	$resultCatalogo = $conn->query($sqlCatalogo);

	
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
    <!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
    <!--[if (gt IE 9)|!(IE)]><!-->
    <html lang="en" class="no-js">
    <!--<![endif]-->

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
        <link rel="canonical" href="contact.html" />
        <link href='../../fonts.googleapis.com/css%3Ffamily=Carrois+Gothic.css' rel='stylesheet' type='text/css'>
        <link href='../../fonts.googleapis.com/css%3Ffamily=Lato:100,300,400,700.css' rel='stylesheet' type='text/css'>
        <link href='../../fonts.googleapis.com/css%3Ffamily=Raleway:400,600,500,700.css' rel='stylesheet' type='text/css'>
        <link href='../../fonts.googleapis.com/css%3Ffamily=Belleza.css' rel='stylesheet' type='text/css'>
        <link href='../../fonts.googleapis.com/css%3Ffamily=Quicksand:300,400,700.css' rel='stylesheet' type='text/css'>
        <link href="<?php echo $context ?>/site/toast/toastr.css" rel="stylesheet" type="text/css">

        <link href='<?php echo $context ?>/site/css/font.css' rel='stylesheet' type='text/css'>

        <link rel="icon" href="<?php echo $context ?>/rings.ico">

        <title>Contactanos | Fashion Gold</title>

        <meta property="og:image" content="//cdn.shopify.com/s/files/1/0908/7252/t/2/assets/logo.png?14058599523483859647" />

        <link href="../../netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />



        <link href="../../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.fancybox-buttons.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />


        <link href="../../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.animate.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/application.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/swatch.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />

        <link href="../../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.owl.carousel.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.bxslider.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />

        <link href="../../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/bootstrap.min.3x.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />

        <link href="../../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.bootstrap.3x.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />

        <link href="../../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.global.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.style.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.media.3x.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />

        <script type="text/javascript" src="<?php echo $context ?>/site/js/jquery.1.8.3.min.js"></script>
        <script type="text/javascript" src="<?php echo $context ?>/site/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo $context ?>/site/js/jquery-scrolltofixed.js"></script>
        <script type="text/javascript" src="<?php echo $context ?>/site/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="<?php echo $context ?>/site/js/jquery.isotope.js"></script>
        <script type="text/javascript" src="<?php echo $context ?>/site/js/wow.js"></script>
        <script type="text/javascript" src="<?php echo $context ?>/site/js/classie.js"></script>
        <script type="text/javascript" src="<?php echo $context ?>/site/toast/toastr.min.js"></script>



    </head>

    <body itemscope itemtype="http://schema.org/WebPage" class="templatePage">

        <!-- Header -->
        <header id="top" class="fadeInDown clearfix">


            <div class="line"></div>

            <!-- Navigation -->
            <div class="container">
                <div class="top-navigation">

                    <ul class="list-inline">
                        <li class="top-logo"><a id="site-title" href="../index.php" title="Jewelry - Shopify theme"> <img class="img-responsive"
		src="../../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/logo.png%3F14058599523483859647"
		alt="Jewelry - Shopify theme" /> </a></li>

                        <li class="navigation">
                            <nav class="navbar" role="navigation">
                                <div class="clearfix">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle main
	navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span>
	<span class="icon-bar"></span></button>
                                    </div>

                                    <div class="is-mobile visible-xs">
                                        <ul class="list-inline">
                                            <li class="is-mobile-menu">
                                                <div class="btn-navbar" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar-group"> <span
			class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </span>
                                                </div>
                                            </li>


                                            <li class="is-mobile-login">
                                                <div class="btn-group">
                                                    <div class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i></div>
                                                    <ul class="customer dropdown-menu">

                                                        <li class="logout"><a href="https://site/account/login">Login</a></li>
                                                        <li class="account"><a href="https://site/account/register">Register</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </li>


                                            <li class="is-mobile-wl"><a href="wish-list.html"><i
			class="fa fa-heart"></i></a></li>





                                            <li class="is-mobile-cart"><a href="https://site/cart"><i
			class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="collapse navbar-collapse">
                                        <ul class="nav navbar-nav hoverMenuWrapper">
                                            <li class="nav-item active"><a href="<?php echo $context?>"> <span>Inicio</span> </a>
                                            </li>
                                            <li class="dropdown mega-menu"><a href="#" class="dropdown-toggle dropdown-link" data-toggle="dropdown"> <span>Cátalogos </span>
		<i class="fa fa-caret-down"></i> <i
			class="sub-dropdown1 visible-sm visible-md visible-lg"></i> <i   
			class="sub-dropdown visible-sm visible-md visible-lg"></i> </a>
							<div class="megamenu-container megamenu-container-1 dropdown-menu banner-bottom mega-col-4">
													<ul class="sub-mega-menu">
														<li>
															<ul>
																<li class="list-title">Productos</li>
																<?php 
																		$menu='';
																		foreach($nodeCatalogo as $posicion=>$registro){
																			$li="<li class='list-unstyled li-sub-mega'><a href='{$context}{$registro['url']}'>{$registro['descripcion']} </a></li>";
																			$menu=$menu.$li;
																		}

																		echo $menu;
																
																?>
															</ul>
														</li>

														<li>

															<ul>
																<li class="list-title">Destacados</li>
																<?php 
																		$menu='';
																		foreach($nodeCatalogo as $posicion=>$registro){
																			$li="<li class='list-unstyled li-sub-mega'><a href='{$context}{$registro['url']}'>{$registro['descripcion']} </a></li>";
																			$menu=$menu.$li;
																		}

																		echo $menu;
																
																?>
														</li>
													</ul>
												</div>
											</li>
                                            <li class="nav-item dropdown">
                                                <a href="#" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
                                                    <span>¿Sabias que?</span>

		<i class="fa fa-caret-down"></i> <i
			class="sub-dropdown1  visible-sm visible-md visible-lg"></i> <i
			class="sub-dropdown visible-sm visible-md visible-lg"></i> </a>
                                                <ul class="dropdown-menu">
                                                    <li class="">

                                                        <a tabindex="-1" href="blogs/sample-blog-with-grid-3-columns.html">
				<i class="fa fa-wrench"></i> 
				En construcción
			</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
												<a href="<?php echo $context ?>/site/pages/contact.php"> <span>Contactanos</span>
											</a></li>
                                            <li class="nav-item">
                                              <a target="_blank"
                                              href="https://www.facebook.com/pg/fashionGold5/about/?ref=page_internal"
                                              class="btooltip swing" data-toggle="tooltip" data-placement="bottom"
                                              title="Facebook"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="nav-item">
                                              <a target="_blank"
                                              href="https://twitter.com/fashiongold2018"
                                              class="btooltip swing" data-toggle="tooltip" data-placement="bottom"
                                              title="Twitter"><i class="fa fa-twitter"></i></a>
                                            </li>	
                                            <li class="nav-item">
                                              <a target="_blank"
                                              href="https://www.instagram.com/fashiongold2018/"
                                              class="btooltip swing" data-toggle="tooltip" data-placement="bottom"
                                              title="instagram"><i class="fa fa-instagram"></i></a>
                                            </li>	
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </li>


                        <li class="top-search hidden-xs"></li>


                        <li class="mobile-search visible-xs">
                            <form id="mobile-search" class="search-form" action="https://site/search" method="get"><input type="hidden" name="type" value="product" /> <input type="text" class="" name="q" value="" accesskey="4" autocomplete="off" placeholder="Escribe para buscar..." />

                                <button type="submit" class="search-submit" title="search"><i
		class="fa fa-search"></i></button>

                            </form>
                        </li>

                    </ul>

                </div>
            </div>
            <!--End Navigation-->




        </header>

        <div id="content-wrapper-parent">
            <div id="content-wrapper">
                <!-- Content -->
                <div id="content" class="clearfix">

                    <div id="breadcrumb" class="breadcrumb">
                        <div itemprop="breadcrumb" class="container">
                            <div class="row">
                                <div class="col-md-24"><a href="<?php echo $context ?>" class="homepage-link" title="Inicio">Inicio</a> <span>/</span>
                                    <span class="page-title">Contactanos</span></div>
                            </div>
                        </div>
                    </div>

                    <section class="content">

                        <div class="container">
                            <div class="row">
                                <div id="page-header" class="col-md-24">
                                    <p id="page-title" class='chopsFontTitle'>Contactanos</p>
                                </div>
                            </div>
                        </div>

                        <div id="col-main" class="contact-page clearfix">

                            <div class="group-contact clearfix">
                                <div class="container">
                                    <div class="row">

                                        <div class="left-block col-md-12">
                                            <form method="post" action="" id="emailForm" name="emailForm" class="contact-form" accept-charset="UTF-8"><input type="hidden" value="contact" name="form_type" /><input type="hidden" name="utf8" value="" />
                                                <ul id="contact-form" class="row list-unstyled">
                                                    <li class="">
                                                        <h3>Tus sugerencias y comentarios</h3>
                                                    </li>
                                                    <li class=""><label class="control-label" for="name">Nombre</label> <input type="text" id="txtnombre" value="" class="form-control" name="txtnombre" /></li>
                                                    <li class="clearfix"></li>
                                                    <li class=""><label class="control-label" for="email">Email <span
		class="req">*</span></label> <input type="email" id="txtemail" value="" class="form-control email" name="txtemail" /></li>
                                                    <li class="clearfix"></li>
                                                    <li class=""><label class="control-label" for="message">Mensaje <span
		class="req">*</span></label> <textarea id="txtmensaje" rows="5" class="form-control" name="txtmensaje"></textarea></li>
                                                    <li class="clearfix"></li>
                                                    <li class="unpadding-top">
                                                        <button type="button" class="btn" id="sendEmail" name="sendEmail">Contactar</button>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>


                                        <div class="right-block contact-content col-md-12">
                                            <h6 class="sb-title"><i class="fa fa-home"></i> Información del Sitio</h6>
                                            <ul class="right-content">
                                                <li class="title">
                                                    <h6>Nos Ubicamos En</h6>
                                                </li>
                                                <li class="address">
                                                    <p>Calle Palma #2 Despacho 104 Edificio Burgos interior 4, Col. Centro, Ciudad de México
                                                    </p>
                                                </li>
                                                <ul>
                                                    <li class="phone"><i class="fa fa-phone"></i> 55 12 32 97</li>
                                                    <li class="email"><i class="fa fa-envelope"></i>informesyventas@fashiongold.com.mx</li>
                                                </ul>
                                                <ul class="right-content">
                                                    <li class="title">
                                                        <h6>Siguenos en:</h6>
                                                    </li>
                                                    <li class="facebook">
                                                    <a target="_blank" href="https://www.facebook.com/pg/fashionGold5/about/?ref=page_internal">
                                                    <span class="fa-stack fa-lg btooltip" title="Facebook"> 
                                                        <i class="fa fa-circle fa-stack-2x"></i> 
                                                        <i class="fa fa-facebook fa-inverse fa-stack-1x"></i> 
                                                    </span></a>
                                                    </li>
                                                    <li class="twitter">
                                                    <a target="_blank" href="https://twitter.com/fashiongold2018/">
                                                    <span class="fa-stack fa-lg btooltip" title="Twitter"> 
                                                        <i class="fa fa-circle fa-stack-2x"></i> 
                                                        <i class="fa fa-twitter fa-inverse fa-stack-1x"></i> 
                                                    </span></a>
                                                    </li>
                                                    <li class="instagram">
                                                    <a target="_blank" href="https://www.instagram.com/fashiongold2018/">
                                                    <span class="fa-stack fa-lg btooltip" title="Instagram"> 
                                                        <i class="fa fa-circle fa-stack-2x"></i> 
                                                        <i class="fa fa-instagram fa-inverse fa-stack-1x"></i> 
                                                    </span></a>
                                                    </li>
                                                </ul>

                                        </div>



                                    </div>
                                </div>





                    </section>
                    </div>
                    </div>
                </div>

                <footer id="footer">
                    <div id="footer-content">
                        <!--<h6 class="general-title contact-footer-title">Newsletter</h6>-->

                        <div class="footer-content footer-content-top clearfix">
                            <div class="container">
                                <div class="footer-link-list col-md-12 text-center">
                                    <div class="group">
                                        <h5>Nosotros</h5>

                                        <ul class="list-unstyled list-styled">

                                            <li class="list-unstyled"><a href="<?php echo $context?>/site/pages/about.php">Quienes Somos</a></li>
                                            <li class="list-unstyled"><a href="<?php echo $context?>/site/pages/contact.php">Cont&aacute;ctenos</a></li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="footer-link-list col-md-12 text-center">
                                    <div class="group">
                                        <h5>Informaci&oacute;n</h5>

                                        <ul class="list-unstyled list-styled">
                                            <li class="list-unstyled"><a href="<?php echo $context?>/site/pages/startBussines.php">Incrementa tus ingresos</a></li>
                                            <li class="list-unstyled"><a href="<?php echo $context?>/site/pages/whatGold.php">Qu&eacute; es oro laminado</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="footer-content footer-content-bottom clearfix">
                                <div class="container">

                                    <div class="copyright col-md-12">&copy; 2018 Fashion Gold. <a href="<?php echo $context?>/site/pages/privacity.php">Políticas de Privacidad</a></div>



                                    <div id="widget-payment" class="col-md-12">
                                        <ul id="payments" class="list-inline animated">


                                            <li class="btooltip tada" data-toggle="tooltip" data-placement="top" title="Visa"><a href="#" class="icons visa"></a></li>
                                            <li class="btooltip tada" data-toggle="tooltip" data-placement="top" title="Mastercard"><a href="#" class="icons mastercard"></a></li>
                                            <li class="btooltip tada" data-toggle="tooltip" data-placement="top" title="American Express"><a href="#" class="icons amex"></a></li>
                                            <li class="btooltip tada" data-toggle="tooltip" data-placement="top" title="Paypal"><a href="#" class="icons paypal"></a></li>
                                            <li class="btooltip tada" data-toggle="tooltip" data-placement="top" title="Moneybookers"><a href="#" class="icons moneybookers"></a></li>

                                        </ul>
                                    </div>

                                </div>
                            </div>

                        </div>
                </footer>


                <div id="quick-shop-modal" class="modal" role="dialog" aria-hidden="true" tabindex="-1" data-width="800">
                    <div class="modal-dialog rotateInDownLeft">
                        <div class="modal-content">
                            <div class="modal-header"><i class="close fa fa-times btooltip" data-toggle="tooltip" data-placement="top" title="Close" data-dismiss="modal" aria-hidden="true"></i></div>
                            <div class="modal-body">
                                <div class="quick-shop-modal-bg"></div>
                                <div class="row">

                                    <div class="col-md-12 product-image">
                                        <div id="quick-shop-image" class="product-image-wrapper"></div>
                                    </div>

                                    <div class="col-md-12 product-information">

                                        <h1 id="quick-shop-title"></h1>

                                        <div id="quick-shop-infomation" class="description">
                                            <div id="quick-shop-description" class="text-left"></div>
                                        </div>

                                        <div id="quick-shop-container">

                                            <div id="quick-shop-relative" class="relative text-left">
                                                <ul class="list-unstyled">
                                                    <li class="control-group vendor"><span class="control-label">Vendor :</span>
                                                    </li>
                                                    <li class="control-group type"><span class="control-label">Type :</span>
                                                    </li>
                                                </ul>
                                            </div>

                                            <form action="https://site/cart/add" method="post" class="variants" id="quick-shop-product-actions" enctype="multipart/form-data">

                                                <div id="quick-shop-price-container" class="detail-price"></div>

                                                <div class="quantity-wrapper clearfix"><label class="wrapper-title">Quantity</label>
                                                    <div class="wrapper"><input type="text" id="qs-quantity" size="5" class="item-quantity" name="quantity" value="1" /> <span class="qty-group"> <span class="qty-wrapper"> <span class="qty-up"
	title="Increase" data-src="#qs-quantity"> <i class="fa fa-plus"></i> </span>

                                                        <span class="qty-down" title="Decrease" data-src="#qs-quantity"> <i
	class="fa fa-minus"></i> </span> </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div id="quick-shop-variants-container" class="variants-wrapper"></div>

                                                <div class="others-bottom"><input id="quick-shop-add" class="btn small add-to-cart" type="submit" name="add" value="Add to Cart" /></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function(e) {


                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-full-width",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }

                    });


                    $("#sendEmail").click(function() {



                        $.ajax({
                                url: 'email.php',
                                type: "POST",
                                data: $("#emailForm").serialize()
                            })
                            .done(function(data) {

                                toastr.success('¡Exito se envio correo!');
                            })
                            .fail(function(data) {

                                toastr.error('¡Error al enviar correo!');
                            })
                            .always(function(data) {
                                // alert( "complete" );
                            });


                    });
                </script>

    </body>

    </html>