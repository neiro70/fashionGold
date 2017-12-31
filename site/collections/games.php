<?php

    include("../../site/admin/mvc/util/MysqlDAO.php");	
        $context= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        $var =explode("/",$context);
        $isLocal=true;
        if (strpos($context, "localhost") !== false) {
            $context="http://" .$var[0]."/".$var[1];
        }else{
            $context="http://" .$var[0];
            $isLocal=false;
        }

        $db = new MySQL ();
        
        $node = array();
        $nodeCatalogo = array();
        $pos=1;
        $posCatalogo=1;
        $idTipo=5;

        $sql="SELECT m01.idImagen,t01.idLinea,t01.txtCodigo,t01.idProducto,t01.isOferta, t01.txtTitulo,t01.dPrecioComercial,t01.dPrecioOferta,t01.txtDescripcion,c02.txtDescripcion AS estatus,c01.txtdescripcion as tipo,t01.idStatus
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
                
                if($isLocal){			
                    $txtDescripcion=mb_convert_encoding($row["txtDescripcion"],'UTF-8','ISO-8859-1');
                    $txtTitulo=mb_convert_encoding($row["txtTitulo"],'UTF-8','ISO-8859-1');
                    
                }else{
                    $txtDescripcion=$row["txtDescripcion"];
                    $txtTitulo=$row["txtTitulo"];
                }

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

?>

<!doctype html>
<html lang="en" class="no-js">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
        <link rel="icon" href="<?php echo $context ?>/rings.ico">
		<link rel="canonical" href="<?php echo $context ?>" />
        <link href='<?php echo $context ?>/fonts.googleapis.com/css%3Ffamily=Carrois+Gothic.css' rel='stylesheet' type='text/css'>
        <link href='<?php echo $context ?>/fonts.googleapis.com/css%3Ffamily=Lato:100,300,400,700.css' rel='stylesheet' type='text/css'>
        <link href='<?php echo $context ?>/fonts.googleapis.com/css%3Ffamily=Raleway:400,600,500,700.css' rel='stylesheet' type='text/css'>
        <link href='<?php echo $context ?>/fonts.googleapis.com/css%3Ffamily=Belleza.css' rel='stylesheet' type='text/css'>
        <link href='<?php echo $context ?>/fonts.googleapis.com/css%3Ffamily=Quicksand:300,400,700.css' rel='stylesheet' type='text/css'>
       
	    <meta name="description" content="" />
        <title>Juegos</title>
        <meta property="og:image" content="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/logo.png?14058599523483859647" />
        
		<link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.camera.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.fancybox-buttons.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.animate.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/application.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/swatch.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.owl.carousel.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.bxslider.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.global.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.style.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.media.3x.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
		<link href="https://hpneo.github.io/gmaps/prettify/prettify.css" rel="stylesheet" type="text/css" media="all" />
		<link href="https://hpneo.github.io/gmaps/styles.css" rel="stylesheet" type="text/css" media="all" />
		<link href='<?php echo $context ?>/site/css/font.css' rel='stylesheet' type='text/css'>
		<link href="<?php echo $context ?>/netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/bootstrap.min.3x.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.bootstrap.3x.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />

		<script src="<?=$context?>/site/admin/js/jquery.js"></script>	
		<script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery-1.9.1.min.js%3F14058599523483859647" type="text/javascript"></script>
		<script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.imagesloaded.min.js%3F14058599523483859647" type="text/javascript"></script>
		<script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/bootstrap.min.3x.js%3F14058599523483859647" type="text/javascript"></script>
		<script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.easing.1.3.js%3F14058599523483859647" type="text/javascript"></script>
		<script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.camera.min.js%3F14058599523483859647" type="text/javascript"></script>
		<script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.mobile.customized.min.js%3F14058599523483859647" type="text/javascript"></script>
		<script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cookies.js%3F14058599523483859647" type="text/javascript"></script>
		<script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/modernizr.js%3F14058599523483859647" type="text/javascript"></script>
		<script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.optionSelect.js%3F14058599523483859647" type="text/javascript"></script>
		<script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.customSelect.js%3F14058599523483859647" type="text/javascript"></script>
		<script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/application.js%3F14058599523483859647" type="text/javascript"></script>
		<script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.owl.carousel.min.js%3F14058599523483859647" type="text/javascript"></script>
		<script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.bxslider.js%3F14058599523483859647" type="text/javascript"></script>
		<script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/skrollr.min.js%3F14058599523483859647" type="text/javascript"></script>
		<script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.fancybox-buttons.js%3F14058599523483859647" type="text/javascript"></script>
		<script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.zoom.js%3F14058599523483859647" type="text/javascript"></script>
		<script src="services/javascripts/currencies.js" type="text/javascript"></script>
		<script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.currencies.min.js%3F14058599523483859647" type="text/javascript"></script>
		<script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.script.js%3F14058599523483859647" type="text/javascript"></script>

		<!-- Facebook Conversion Code for Themes -->
		<script>
			(function() {
				var _fbq = window._fbq || (window._fbq = []);
				if (!_fbq.loaded) {
					var fbds = document.createElement('script');
					fbds.async = true;
					fbds.src = '//connect.facebook.net/en_US/fbds.js';
					var s = document.getElementsByTagName('script')[0];
					s.parentNode.insertBefore(fbds, s);
					_fbq.loaded = true;
				}
			})();
			window._fbq = window._fbq || [];
			window._fbq.push(['track', '6016096938024', {'value':'0.00','currency':'USD'}]);
		</script>

		<noscript>
			<img height="1" width="1" alt="" style="display: none" src="../www.facebook.com/tr%3Fev=6016096938024&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" />
		</noscript>

		<script type="text/javascript">
			var Shopify = Shopify || {};
			Shopify.shop = "site";
			Shopify.theme = {"name":"jewelry","id":41982083,"theme_store_id":null,"role":"main"};
			Shopify.theme.handle = "null";
			Shopify.theme.style = {"id":null,"handle":null};
		</script>

		<script src="<?php echo $context ?>/cdn.shopify.com/s/javascripts/shopify_stats.js%3Fv=6" type="text/javascript" async="async"></script>
		<meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/9087252/digital_wallets/dialog" />

		<script type="text/javascript">
			window.ShopifyAnalytics = window.ShopifyAnalytics || {};
			window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
			window.ShopifyAnalytics.meta.currency = 'USD';
			var meta = {"page":{"pageType":"home"}};
			for (var attr in meta) {
				window.ShopifyAnalytics.meta[attr] = meta[attr];
			}	
		</script>

		<script type="text/javascript">window.ShopifyAnalytics.merchantGoogleAnalytics = function() {};</script>

		<script type="text/javascript" class="analytics">
			(function () {
				var customDocumentWrite = function(content) {
					var 
					= null;
					if (window.jQuery) {
						jquery = window.jQuery;
					} else if (window.Checkout && window.Checkout.$) {
						jquery = window.Checkout.$;
					}

					if (jquery) {jquery('body').append(content);}
				};

				var trekkie = window.ShopifyAnalytics.lib = window.trekkie = window.trekkie || [];
				if (trekkie.integrations) {
					return;
				}

				trekkie.methods = ['identify','page','ready','track','trackForm','trackLink'];
				trekkie.factory = function(method) {
					return function() {
						var args = Array.prototype.slice.call(arguments);
						args.unshift(method);
						trekkie.push(args);
						return trekkie;
					};
				};

				for (var i = 0; i < trekkie.methods.length; i++) {
					var key = trekkie.methods[i];
					trekkie[key] = trekkie.factory(key);
				}

				trekkie.load = function(config) {
					trekkie.config = config;
					var script = document.createElement('script');
					script.type = 'text/javascript';
					script.onerror = function(e) {(new Image()).src = '//v.shopify.com/internal_errors/track?error=trekkie_load';};
					script.async = true;
					script.src = 'https://cdn.shopify.com/s/javascripts/tricorder/trekkie.storefront.min.js?v=2017.03.29.1';
					var first = document.getElementsByTagName('script')[0];
					first.parentNode.insertBefore(script, first);
				};
				
				trekkie.load(
					{"Trekkie":{"appName":"storefront","development":false,"defaultAttributes":{"shopId":9087252,"isMerchantRequest":null,
					"themeId":41982083,"themeCityHash":14839528528689155135}},"Performance":{"navigationTimingApiMeasurementsEnabled":true,
					"navigationTimingApiMeasurementsSampleRate":0.1},"Session Attribution":{}}
				);

				var loaded = false;
				trekkie.ready(function() {
					if (loaded) return;
					loaded = true;
					window.ShopifyAnalytics.lib = window.trekkie;
					var originalDocumentWrite = document.write;
					document.write = customDocumentWrite;
					try { 
						window.ShopifyAnalytics.merchantGoogleAnalytics.call(this); 
					} catch(error) {};
					document.write = originalDocumentWrite;
					window.ShopifyAnalytics.lib.page(null,{"pageType":"home"});	
				});

				var eventsListenerScript = document.createElement('script');
				eventsListenerScript.async = true;
				eventsListenerScript.src = "//cdn.shopify.com/s/assets/shop_events_listener-9410288c486c406bc38edb97003bb123d375112c2b7e037d65afabae7c905e02.js";
				document.getElementsByTagName('head')[0].appendChild(eventsListenerScript);
			})();
		</script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjoJhxzdM2GNiubYHbXUTImb0466lfinY"></script>
		<script type="text/javascript" src="https://hpneo.github.io/gmaps/gmaps.js"></script>
		<script type="text/javascript" src="https://hpneo.github.io/gmaps/prettify/prettify.js"></script>
    
	</head>

    <body itemscope itemtype="http://schema.org/WebPage" class="templateCollection">

        <!-- Header -->
        <header id="top" class="fadeInDown clearfix">

			<div class="line"></div>

			<!-- Navigation -->
			<div class="container">
				<div class="top-navigation">

					<ul class="list-inline">
						<li class="top-logo">
							<a id="site-title" href="<?php echo $context?>" title="Fashion Gold">
								<img class="img-responsive"src="<?php echo $context ?>/site/img/collection/logo.png"alt="Fashion Gold" /> 
							</a>
						</li>

						<li class="navigation">

							<nav class="navbar" role="navigation">
								<div class="clearfix">
									<div class="navbar-header">
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
											<span class="sr-only">Toggle mainnavigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>

									<div class="is-mobile visible-xs">
										<ul class="list-inline">
											<li class="is-mobile-menu">
												<div class="btn-navbar" data-toggle="collapse" data-target=".navbar-collapse">
													<span class="icon-bar-group">
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
													</span>
												</div>
											</li>
											<li class="is-mobile-login">
												<div class="btn-group">
													<div class="dropdown-toggle" data-toggle="dropdown">
														<i class="fa fa-user"></i>
													</div>
													<ul class="customer dropdown-menu">
														<li class="logout"><a href="https://site/account/login">Login</a></li>
														<li class="account"><a href="https://site/account/register">Register</a></li>
													</ul>
												</div>
											</li>
											<li class="is-mobile-wl"><a href="pages/wish-list.html"><i class="fa fa-heart"></i></a></li>
											<li class="is-mobile-cart"><a href="https://site/cart"><i class="fa fa-shopping-cart"></i></a></li>
										</ul>
									</div>

									<div class="collapse navbar-collapse">
										<ul class="nav navbar-nav hoverMenuWrapper">
											<li class="nav-item active">
												<a href="<?php echo $context?>"> <span>Inicio</span> </a>
											</li>
											<li class="dropdown mega-menu">
												<a href="#" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
													<span>C&aacute;talogos</span>
													<i class="fa fa-caret-down"></i>
													<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
													<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
												</a>
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
												<a href="<?php echo $context ?>/site/pages/blogs/blogs.html" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
													<span>Blog</span>
													<i class="fa fa-caret-down"></i>
													<i class="sub-dropdown1  visible-sm visible-md visible-lg"></i> 
													<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
												</a>
												<ul class="dropdown-menu">
													<li class=""><a tabindex="-1" href="#"> <i class="fa fa-wrench"></i> En Construcci&oacute;n </a></li>
												</ul>
											</li>
											<li class="nav-item">
												<a href="<?php echo $context ?>/site/pages/contact.php">
													<span>Cont&aacute;ctenos</span>
												</a>
											</li>
											<li class="nav-item">
												<a target="_blank" href="https://www.facebook.com/pg/fashionGold5/about/?ref=page_internal" class="btooltip swing" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i> FACEBOOK</a>
											</li>
										</ul>
									</div>
								</div>
							</nav>
						</li>

						<li class="top-search hidden-xs"></li>

						<li class="mobile-search visible-xs">
							<form id="mobile-search" class="search-form" action="https://site/search" method="get">
								<input type="hidden" name="type" value="product" />
								<input type="text" class="" name="q" value="" accesskey="4" autocomplete="off" placeholder="Escribe para buscar..." />
								<button type="submit" class="search-submit" title="search"><i class="fa fa-search"></i></button>
							</form>
						</li>
					</ul>
				</div>
			</div>
			<!--End Navigation-->
					
			<script>
				function addaffix(scr) {
					if ($(window).innerWidth() >= 1024) {
						if (scr > $('#top').innerHeight()) {
							if (!$('#top').hasClass('affix')) {
								$('#top').addClass('affix').addClass('animated');
							}
						} else {
							if ($('#top').hasClass('affix')) {
								$('#top').prev().remove();
								$('#top').removeClass('affix').removeClass('animated');
							}
						}
					} else $('#top').removeClass('affix');
				}
				$(window).scroll(function() {
					var scrollTop = $(this).scrollTop();
					addaffix(scrollTop);
				});
				$(window).resize(function() {
					var scrollTop = $(this).scrollTop();
					addaffix(scrollTop);
				}); 
			</script>
	    </header>

		<!--Start wrapper-->
        <div id="content-wrapper-parent">
            <div id="content-wrapper">
                
				<!-- Content -->
				<div id="content" class="clearfix">
					<section class="content">

						<div id="breadcrumb" class="breadcrumb">
							<div itemprop="breadcrumb" class="container">
								<div class="row">
									<div class="col-md-24">
										<a href="<?php echo $context?>" class="homepage-link" title="Back to the frontpage">Inicio</a> 
										<span>/</span>
										<span class="page-title">Juegos</span>
									</div>
								</div>
							</div>
						</div>

                        <div class="container">
                            <div class="row">

                                <div id="collection-content">
                                    <!-- Tags loading -->
                                    <div id="tags-load" style="display: none;"><i class="fa fa-spinner fa-pulse fa-2x"></i></div>

                                    <div id="page-header" class="col-sm-24">
                                      <p id="page-title" class='chopsFontTitle'>Juegos</p>
                                    </div>

                                    <div class="collection-warper col-sm-24 clearfix">
                                        <div class="collection-panner" align="center"><img src="<?php echo $context ?>/site/img/collection/games/banner_joyas.jpg" class="img-responsive" alt="" /></div>
                                    </div>

                                    <div class="collection-main-content">
                                        <div id="col-main" class="collection collection-page col-xs-24 col-sm-24 ">
                                            <div class="container-nav clearfix">
                                                <div id="options" class="container-nav clearfix">
                                                    <ul class="list-inline text-right">

                                                        <li class="grid_list">
                                                            <ul class="list-inline option-set hidden-xs" data-option-key="layoutMode">
                                                                <li data-option-value="fitRows" id="goGrid" class="goAction btooltip active" data-toggle="tooltip" data-placement="top" title="Malla"><span></span></li>

                                                                <li data-option-value="straightDown" id="goList" class="goAction btooltip" data-toggle="tooltip" data-placement="top" title="Listado"><span></span></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

											<div id="sandBox-wrapper" class="group-product-item row collection-full">
												<ul id="sandBox" class="list-unstyled">
                                                    <?php
                                                        foreach($node as $posicion=>$registro)
                                                            {
                                                            $div = "<li class='element no_full_width' data-alpha='{$registro['titulo']}' data-price='{$registro['precio']}'>
                                                            <ul class='row-container list-unstyled clearfix'>
                                                                <li class='row-left'>
                                                            <a onClick='previewProducto({$registro['idProducto']})'  data-target='#myModalFrame' data-toggle='modal'
                                                                class='container_item'> <img style='cursor: pointer;'
                                                                        src='$context/{$registro['imagen']}'
                                                                        class='img-responsive' alt='{$registro['titulo']}' />";
                                                            
                                                                        if($registro['oferta']== 1 ){	 
                                                                            $div =$div."<span class='sale_banner'> 
                                                                                        <span class='sale_text'>Oferta</span> 
                                                                                </span>";
                                                                        }
                                                                
                                                                $div =$div."</a>
                                                            
                                                                </li>

                                                                <li class='row-right parent-fly animMix'>
                                                                    <div class='product-content-left'>
                                                                        <a class='title-5' href='#' data-target='#myModalFrame'>
                                                                            {$registro['titulo']} 
                                                                        </a>
                                                                        <span class='shopify-product-reviews-badge' data-id='registro$idProducto'></span></div>
                                                                <div class='product-content-right'>		
                                                                <div class='product-price'>";
                                                                            

                                                                if($registro['oferta'] == 1 ){	
                                                                        $div =$div."	<span class='price_sale'> 
                                                                                        <span class='money'>{$registro['precioAnterior']}</span> 
                                                                                </span>
                                                                                <del class='price_compare'> 
                                                                                    <span class='money'>{$registro['precio']} </span>
                                                                                </del>";
                                                                    }else{
                                                                        $div =$div." 			
                                                                        <span class='price'> 
                                                                            <span class='money'>{$registro['precio']}</span> 
                                                                        </span>";
                                                                
                                                                    }
                                                                
                                                                $div =$div."</div>
                                                                    
                                                                </div>
                                                                <div class='list-mode-description'> {$registro['descripcion']}</div>

                                                                </li>
                                                            </ul>
                                                            </li>";
                                                            
                                                            echo $div;
                                                            
                                                            }


                                                    ?>
												</ul>
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

		<footer id="footer">
			<div id="footer-content">

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
							<div class="copyright col-md-12">&copy; 2017 Fashion Gold .Todos los derechos reservados.</div>
							<div id="widget-payment" class="col-md-12">
								<ul id="payments" class="list-inline animated">
									<li class="btooltip tada" data-toggle="tooltip" data-placement="top" title="Visa"><a href="#" class="icons visa"></a></li>
									<li class="btooltip tada" data-toggle="tooltip" data-placement="top" title="Mastercard"><a href="#" class="icons mastercard"></a></li>
									<li class="btooltip tada" data-toggle="tooltip" data-placement="top" title="American Express"><a href="#" class="icons amex"></a></li>
									<li class="btooltip tada" data-toggle="tooltip" data-placement="top" title="Paypal"><a href="#" class="icons paypal"></a></li>
									<li class="btooltip tada" data-toggle="tooltip" data-placement="top" title="Moneybookers"><a href="index.html#;" class="icons moneybookers"></a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>
			</div>
		</footer>

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
		<script type="text/javascript">
			function previewProducto(idProducto) {
				var src = '<?=$context?>/site/admin/mvc/view/producto/viewProducto.php?idproducto=' + idProducto;
				var height = $(this).attr('data-height') || '450px';
				var width = $(this).attr('data-width') || '100%';
				
				$("#targetiframe").attr({
					'src': src,
					'height': height,
					'width': width
				});

			}
		</script>

		<script src="https://cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.global.js?14058599523483859647" type="text/javascript"></script> 
		<script type="text/javascript">
			if (typeof Shopify.onCartShippingRatesUpdate === 'undefined') {
				document.write("\u003cscript src=\"\/\/cdn.shopify.com\/s\/assets\/themes_support\/api.jquery-249bc01571641fb7bf9bf82378ba6333e9abdcc34aad49eb9e4edb01557b7dac.js\" type=\"text\/javascript\"\u003e\u003c\/script\u003e");
			}    
		</script>

		<script src="../services/javascripts/currencies.js" type="text/javascript"></script>
		<script src="../../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.currencies.min.js%3F14058599523483859647" type="text/javascript"></script>
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