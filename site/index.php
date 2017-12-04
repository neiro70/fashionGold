<?php

include("../site/admin/mvc/util/MysqlDAO.php");

	$context= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$var =explode("/",$context);
	if (strpos($context, "localhost") !== false) {
		$context="http://" .$var[0]."/".$var[1];
	}else{
		$context="http://" .$var[0];
	}


$db = new MySQL ();

$nodeNuevo = array();
$nodeDestacado = array();
$posNuevo=1;
$posDestacado=1;



$sql="SELECT m01.idImagen,t01.txtCodigo,t01.idProducto,t01.isOferta, t01.txtTitulo,t01.dPrecioComercial,
		t01.dPrecioOferta,t01.txtDescripcion,c02.txtDescripcion AS estatus,
		c01.txtdescripcion as tipo,t01.idStatus,t01.isNuevo,t01.isDestacado
		FROM t01producto t01 
		INNER JOIN c02estatus c02 ON c02.idEstatus=t01.idStatus 
		INNER JOIN c01tipo c01 ON c01.idtipo = t01.idTipo 
		LEFT JOIN t02imagen m01 ON m01.idProducto = t01.idProducto 
		WHERE 1=1 OR isNuevo=1 OR isDestacado=1 ";




$conn=$db->getConexion();
$result = $conn->query($sql);
setlocale(LC_MONETARY, 'es_MX');
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {

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
			$nodeNuevo[$posNuevo++]=array('descripcion'=>$txtDescripcion,'precio'=>$dPrecioComercial,'titulo'=>"$txtCodigo - $txtTitulo",'imagen'=>$imagen,'oferta'=> $isOferta,'precioAnterior'=>$dPrecioOferta,'idProducto'=>$idProducto);
		}
		if($isDestacado=="1"){
			$nodeDestacado[$posDestacado++]=array('descripcion'=>$txtDescripcion,'precio'=>$dPrecioComercial,'titulo'=>"$txtCodigo - $txtTitulo",'imagen'=>$imagen,'oferta'=> $isOferta,'precioAnterior'=>$dPrecioOferta,'idProducto'=>$idProducto);

		}
			


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

<meta charset="ISO-8859-1">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="viewport"
	content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<link rel="icon" href="<?php echo $context ?>/rings.ico">
<link rel="canonical" href="<?php echo $context ?>" />
<link
	href='<?php echo $context ?>/fonts.googleapis.com/css%3Ffamily=Carrois+Gothic.css'
	rel='stylesheet' type='text/css'>
<link
	href='<?php echo $context ?>/fonts.googleapis.com/css%3Ffamily=Lato:100,300,400,700.css'
	rel='stylesheet' type='text/css'>
<link
	href='<?php echo $context ?>/fonts.googleapis.com/css%3Ffamily=Raleway:400,600,500,700.css'
	rel='stylesheet' type='text/css'>
<link
	href='<?php echo $context ?>/fonts.googleapis.com/css%3Ffamily=Belleza.css'
	rel='stylesheet' type='text/css'>
<link
	href='<?php echo $context ?>/fonts.googleapis.com/css%3Ffamily=Quicksand:300,400,700.css'
	rel='stylesheet' type='text/css'>

<meta name="description" content="" />



<title>Fashion Gold</title>






<meta property="og:image"
	content="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/logo.png?14058599523483859647" />









<link
	href="<?php echo $context ?>/netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"
	rel="stylesheet" type="text/css" media="all" />

<link
	href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.camera.css%3F14058599523483859647.css"
	rel="stylesheet" type="text/css" media="all" />



<link
	href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.fancybox-buttons.css%3F14058599523483859647.css"
	rel="stylesheet" type="text/css" media="all" />


<link
	href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.animate.css%3F14058599523483859647.css"
	rel="stylesheet" type="text/css" media="all" />
<link
	href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/application.css%3F14058599523483859647.css"
	rel="stylesheet" type="text/css" media="all" />
<link
	href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/swatch.css%3F14058599523483859647.css"
	rel="stylesheet" type="text/css" media="all" />

<link
	href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.owl.carousel.css%3F14058599523483859647.css"
	rel="stylesheet" type="text/css" media="all" />
<link
	href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.bxslider.css%3F14058599523483859647.css"
	rel="stylesheet" type="text/css" media="all" />

<link
	href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/bootstrap.min.3x.css%3F14058599523483859647.css"
	rel="stylesheet" type="text/css" media="all" />

<link
	href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.bootstrap.3x.css%3F14058599523483859647.css"
	rel="stylesheet" type="text/css" media="all" />

<link
	href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.global.css%3F14058599523483859647.css"
	rel="stylesheet" type="text/css" media="all" />
<link
	href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.style.css%3F14058599523483859647.css"
	rel="stylesheet" type="text/css" media="all" />
<link
	href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.media.3x.css%3F14058599523483859647.css"
	rel="stylesheet" type="text/css" media="all" />
<link
	href="https://hpneo.github.io/gmaps/prettify/prettify.css"
	rel="stylesheet" type="text/css" media="all" />
<link
	href="https://hpneo.github.io/gmaps/styles.css"
	rel="stylesheet" type="text/css" media="all" />
	
	
	
	
	


<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery-1.9.1.min.js%3F14058599523483859647"
	type="text/javascript"></script>
<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.imagesloaded.min.js%3F14058599523483859647"
	type="text/javascript"></script>

<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/bootstrap.min.3x.js%3F14058599523483859647"
	type="text/javascript"></script>


<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.easing.1.3.js%3F14058599523483859647"
	type="text/javascript"></script>
<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.camera.min.js%3F14058599523483859647"
	type="text/javascript"></script>
<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.mobile.customized.min.js%3F14058599523483859647"
	type="text/javascript"></script>




<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cookies.js%3F14058599523483859647"
	type="text/javascript"></script>
<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/modernizr.js%3F14058599523483859647"
	type="text/javascript"></script>
<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.optionSelect.js%3F14058599523483859647"
	type="text/javascript"></script>
<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.customSelect.js%3F14058599523483859647"
	type="text/javascript"></script>
<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/application.js%3F14058599523483859647"
	type="text/javascript"></script>
<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.owl.carousel.min.js%3F14058599523483859647"
	type="text/javascript"></script>
<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.bxslider.js%3F14058599523483859647"
	type="text/javascript"></script>
<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/skrollr.min.js%3F14058599523483859647"
	type="text/javascript"></script>





<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.fancybox-buttons.js%3F14058599523483859647"
	type="text/javascript"></script>


<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.zoom.js%3F14058599523483859647"
	type="text/javascript"></script>

<script src="services/javascripts/currencies.js" type="text/javascript"></script>
<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.currencies.min.js%3F14058599523483859647"
	type="text/javascript"></script>
<script
	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.script.js%3F14058599523483859647"
	type="text/javascript"></script>
<!-- Facebook Conversion Code for Themes -->
<script>(function() {
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



<noscript><img height="1" width="1" alt="" style="display: none"
	src="../www.facebook.com/tr%3Fev=6016096938024&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>


<script type="text/javascript">
//<![CDATA[
      var Shopify = Shopify || {};
      Shopify.shop = "site";
      Shopify.theme = {"name":"jewelry","id":41982083,"theme_store_id":null,"role":"main"};
      Shopify.theme.handle = "null";
      Shopify.theme.style = {"id":null,"handle":null};

//]]>
</script>

  <script
	src="<?php echo $context ?>/cdn.shopify.com/s/javascripts/shopify_stats.js%3Fv=6"
	type="text/javascript" async="async"></script>
<meta id="shopify-digital-wallet" name="shopify-digital-wallet"
	content="/9087252/digital_wallets/dialog" />

<script type="text/javascript">
        
      window.ShopifyAnalytics = window.ShopifyAnalytics || {};
      window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
      window.ShopifyAnalytics.meta.currency = 'USD';
      var meta = {"page":{"pageType":"home"}};
      for (var attr in meta) {
        window.ShopifyAnalytics.meta[attr] = meta[attr];
      }
    
      </script>

<script type="text/javascript">
        window.ShopifyAnalytics.merchantGoogleAnalytics = function() {
          
        };
      </script>

<script type="text/javascript" class="analytics">
        
        

        (function () {
          var customDocumentWrite = function(content) {
            var jquery = null;

            if (window.jQuery) {
              jquery = window.jQuery;
            } else if (window.Checkout && window.Checkout.$) {
              jquery = window.Checkout.$;
            }

            if (jquery) {
              jquery('body').append(content);
            }
          };

          var trekkie = window.ShopifyAnalytics.lib = window.trekkie = window.trekkie || [];
          if (trekkie.integrations) {
            return;
          }
          trekkie.methods = [
            'identify',
            'page',
            'ready',
            'track',
            'trackForm',
            'trackLink'
          ];
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
            script.onerror = function(e) {
              (new Image()).src = '//v.shopify.com/internal_errors/track?error=trekkie_load';
            };
            script.async = true;
            script.src = 'https://cdn.shopify.com/s/javascripts/tricorder/trekkie.storefront.min.js?v=2017.03.29.1';
            var first = document.getElementsByTagName('script')[0];
            first.parentNode.insertBefore(script, first);
          };
          trekkie.load(
            {"Trekkie":{"appName":"storefront","development":false,"defaultAttributes":{"shopId":9087252,"isMerchantRequest":null,"themeId":41982083,"themeCityHash":14839528528689155135}},"Performance":{"navigationTimingApiMeasurementsEnabled":true,"navigationTimingApiMeasurementsSampleRate":0.1},"Session Attribution":{}}
          );

          var loaded = false;
          trekkie.ready(function() {
            if (loaded) return;
            loaded = true;

            window.ShopifyAnalytics.lib = window.trekkie;
            

            var originalDocumentWrite = document.write;
            document.write = customDocumentWrite;
            try { window.ShopifyAnalytics.merchantGoogleAnalytics.call(this); } catch(error) {};
            document.write = originalDocumentWrite;

            
        window.ShopifyAnalytics.lib.page(
          null,
          {"pageType":"home"}
        );
      
            
          });

          
      var eventsListenerScript = document.createElement('script');
      eventsListenerScript.async = true;
      eventsListenerScript.src = "//cdn.shopify.com/s/assets/shop_events_listener-9410288c486c406bc38edb97003bb123d375112c2b7e037d65afabae7c905e02.js";
      document.getElementsByTagName('head')[0].appendChild(eventsListenerScript);
    
        })();
      </script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjoJhxzdM2GNiubYHbXUTImb0466lfinY"></script>
<script type="text/javascript" src="https://hpneo.github.io/gmaps/gmaps.js"></script>
<script type="text/javascript" src="https://hpneo.github.io/gmaps/prettify/prettify.js	"></script>


</head>

<body itemscope itemtype="http://schema.org/WebPage"
	class="templateIndex">

<!-- Header -->
<header id="top" class="fadeInDown clearfix">






<div class="line"></div>

<!-- Navigation -->
<div class="container">
<div class="top-navigation">

<ul class="list-inline">
	<li class="top-logo"><a id="site-title" href="<?php echo $context?>"
		title="Fashion Gold"> <img class="img-responsive"
		src="../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/logo.png%3F14058599523483859647"
		alt="Fashion Gold" /> </a></li>

	<li class="navigation"><nav class="navbar" role="navigation">
	<div class="clearfix">
	<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse"
		data-target=".navbar-collapse"><span class="sr-only">Toggle main
	navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span>
	<span class="icon-bar"></span></button>
	</div>

	<div class="is-mobile visible-xs">
	<ul class="list-inline">
		<li class="is-mobile-menu">
		<div class="btn-navbar" data-toggle="collapse"
			data-target=".navbar-collapse"><span class="icon-bar-group"> <span
			class="icon-bar"></span> <span class="icon-bar"></span> <span
			class="icon-bar"></span> </span></div>
		</li>


		<li class="is-mobile-login">
		<div class="btn-group">
		<div class="dropdown-toggle" data-toggle="dropdown"><i
			class="fa fa-user"></i></div>
		<ul class="customer dropdown-menu">

			<li class="logout"><a href="https://site/account/login">Login</a></li>
			<li class="account"><a href="https://site/account/register">Register</a>
			</li>

		</ul>
		</div>
		</li>


		<li class="is-mobile-wl"><a href="pages/wish-list.html"><i
			class="fa fa-heart"></i></a></li>





		<li class="is-mobile-cart"><a href="https://site/cart"><i
			class="fa fa-shopping-cart"></i></a></li>
	</ul>
	</div>

	<div class="collapse navbar-collapse">
	<ul class="nav navbar-nav hoverMenuWrapper">
		<li class="nav-item active"><a href="#"> <span>Inicio</span> </a></li>
		<li class="dropdown mega-menu"><a href="#"
			class="dropdown-toggle dropdown-link" data-toggle="dropdown"> <span>C&aacute;talogos</span>
		<i class="fa fa-caret-down"></i> <i
			class="sub-dropdown1 visible-sm visible-md visible-lg"></i> <i
			class="sub-dropdown visible-sm visible-md visible-lg"></i> </a>
		<div
			class="megamenu-container megamenu-container-1 dropdown-menu banner-bottom mega-col-4">
		<ul class="sub-mega-menu">
			<li>
			<ul>
				<li class="list-title">Nuevos</li>
				<li class="list-unstyled li-sub-mega"><a
					href="<?php echo $context ?>/site/collections/rings.php">Anillos </a></li>
				<li class="list-unstyled li-sub-mega"><a
					href="<?php echo $context ?>/site/collections/bracelets.php">Pulseras<span
					class="megamenu-label new-label">Oferta</span> </a></li>
				<li class="list-unstyled li-sub-mega"><a
					href="<?php echo $context ?>/site/collections/necklaces.php">Gargantillas
				</a></li>
				<li class="list-unstyled li-sub-mega"><a
					href="<?php echo $context ?>/site/collections/earrings.php">Aretes
				<span class="megamenu-label hot-label">Nuevos</span> </a></li>
				<li class="list-unstyled li-sub-mega"><a
					href="<?php echo $context ?>/site/collections/bracelets.php">Pulseras<span
					class="megamenu-label feature-label">Nuevo</span> </a></li>
			</ul>
			</li>

			<li>
			<ul>
				<li class="list-title">Productos</li>
				<li class="list-unstyled li-sub-mega"><a
					href="<?php echo $context ?>/site/collections/rings.php">Anillos </a></li>
				<li class="list-unstyled li-sub-mega"><a
					href="<?php echo $context ?>/site/collections/bracelets.php">Pulseras<span
					class="megamenu-label li-sub-mega">Oferta</span> </a></li>
				<li class="list-unstyled li-sub-mega"><a
					href="<?php echo $context ?>/site/collections/necklaces.php">Gargantillas
				</a></li>
			</ul>
			</li>
			<li>

			<ul>
				<li class="list-title">Destacados</li>
				<li class="list-unstyled li-sub-mega"><a
					href="<?php echo $context ?>/site/collections/rings.php">Anillos </a></li>
				<li class="list-unstyled li-sub-mega"><a
					href="<?php echo $context ?>/site/collections/bracelets.php">Pulseras<span
					class="megamenu-label li-sub-mega">Oferta</span> </a></li>
				<li class="list-unstyled li-sub-mega"><a
					href="<?php echo $context ?>/site/collections/necklaces.php">Gargantillas
				</a></li>
			</ul>
			</li>
			<li>
			<ul>
				<li class="list-title">Ofertas</li>
				<li class="list-unstyled li-sub-mega"><a
					href="<?php echo $context ?>/site/collections/rings.php">Anillos </a></li>
				<li class="list-unstyled li-sub-mega"><a
					href="<?php echo $context ?>/site/collections/bracelets.php">Pulseras<span
					class="megamenu-label li-sub-mega">Oferta</span> </a></li>

				<li class="list-unstyled li-sub-mega"><a
					href="<?php echo $context ?>/site/collections/necklaces.php">Gargantillas
				</a></li>

			</ul>
			</li>
		</ul>
		</div>
		</li>
		<li class="nav-item dropdown"><a
			href="<?php echo $context ?>/site/pages/blogs/blogs.html"
			class="dropdown-toggle dropdown-link" data-toggle="dropdown"> <span>Blog</span>

		<i class="fa fa-caret-down"></i> <i
			class="sub-dropdown1  visible-sm visible-md visible-lg"></i> <i
			class="sub-dropdown visible-sm visible-md visible-lg"></i> </a>
		<ul class="dropdown-menu">
			<li class=""><a tabindex="-1"
				href="#"> <i
				class="fa fa-wrench"></i> En Construcci&oacute;n </a></li>
		</ul>
		</li>
		<li class="nav-item"><a
			href="<?php echo $context ?>/site/pages/contact.php"> <span>Cont&aacute;ctenos</span>
		</a></li>
   
    <li class="nav-item">
        <a target="_blank"
          href="https://www.facebook.com/pg/fashionGold5/about/?ref=page_internal"
          class="btooltip swing" data-toggle="tooltip" data-placement="bottom"
          title="Facebook"><i class="fa fa-facebook"></i> FACEBOOK</a>
    </li>

    
	</ul>

	</div>
	</div>
	</nav></li>


	<li class="top-search hidden-xs"></li>


	<!-- 
      <li class="umbrella hidden-xs">			
        <div id="umbrella" class="list-inline unmargin">
          <div class="cart-link">
            <a href="https://site/cart" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
              <i class="sub-dropdown1"></i>
              <i class="sub-dropdown"></i>              
              <div class="num-items-in-cart">
                <span class="icon">
                  Cart
                  <span class="number">0</span>
                </span>
              </div>
            </a>

            
            <div id="cart-info" class="dropdown-menu">
              <div id="cart-content">
                <div class="loading">
                  <img src="../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/loader.gif%3F14058599523483859647" alt="" />
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </li>-->



	<li class="mobile-search visible-xs">
	<form id="mobile-search" class="search-form"
		action="https://site/search" method="get"><input type="hidden"
		name="type" value="product" /> <input type="text" class="" name="q"
		value="" accesskey="4" autocomplete="off"
		placeholder="Escribe para buscar..." />

	<button type="submit" class="search-submit" title="search"><i
		class="fa fa-search"></i></button>

	</form>
	</li>

</ul>

</div>
</div>
<!--End Navigation-->


<script>
  function addaffix(scr){
    if($(window).innerWidth() >= 1024){
      if(scr > $('#top').innerHeight()){
        if(!$('#top').hasClass('affix')){
          $('#top').addClass('affix').addClass('animated');
        }
      }
      else{
        if($('#top').hasClass('affix')){
          $('#top').prev().remove();
          $('#top').removeClass('affix').removeClass('animated');
        }
      }
    }
    else $('#top').removeClass('affix');
  }
  $(window).scroll(function() {
    var scrollTop = $(this).scrollTop();
    addaffix(scrollTop);
  });
  $( window ).resize(function() {
    var scrollTop = $(this).scrollTop();
	addaffix(scrollTop);
  });
</script>

</header>

<div id="content-wrapper-parent">
<div id="content-wrapper">



<div class="home-slider-wrapper clearfix">



<div class="camera_wrap" id="home-slider">
 <!-- div	data-src="//cdn.shopify.com/s/files/1/0908/7252/t/2/assets/slide-image-1.jpg?14058599523483859647" -->
 <div	data-src="<?php echo $context ?>/site/img/collection/navidad.jpg">


  <div class="camera_caption camera_title_1 fadeIn moveFromLeft"><a
	href="<?php echo $context ?>/site/collections/general.php"
	style="color: #010101;">&#161;Bienvenido!</a></div>



<div class="camera_caption camera_caption_1 fadeIn"
	style="color: #010101;">La joya ideal para ti</div>



<!--       <div class="camera_caption camera_image-caption_1 moveFromLeft">-->
<!--          <img src="../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/slide-image-caption-1.png" alt="image_caption" />-->
<!--        </div>   -->





<div class="camera_cta_1"><a
	href="<?php echo $context ?>/site/collections/general.php" class="btn">Nuestros
C&aacute;talogos</a></div>


</div>
<div data-src="<?php echo $context ?>/site/img/collection/navidad.jpg">

<div class="camera_caption camera_title_1 fadeIn moveFromLeft"><a
	href="<?php echo $context ?>/site/collections/general.php"
	style="color: #010101;">  &#161;FashionGold te desea una excelente navidad &#33; </a></div>
<!--
<div class="camera_caption camera_title_2 moveFromLeft"><a
	href="<?php echo $context ?>/site/collections/sample-collection-with-left-slidebar.html"
	style="color: #666666;">Joyas</a></div>
<div class="camera_caption camera_image-caption_2 moveFromLeft"><img
	src="../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/slide-image-caption-2.png%3F14058599523483859647"
	alt="image_caption" /></div>-->





<div class="camera_cta_2"><a
	href="<?php echo $context ?>/site/collections/general.php" class="btn">Ver
c&aacute;talogo</a></div>


</div>
<!-- div data-src="//cdn.shopify.com/s/files/1/0908/7252/t/2/assets/slide-image-3.jpg?14058599523483859647" -->
  <div	data-src="<?php echo $context ?>/site/img/collection/navidad.jpg">



<div class="camera_caption camera_title_1 fadeIn moveFromLeft"><a
	href="<?php echo $context ?>/site/collections/bracelets.php"
	style="color: #010101;">&#33; Te invitamos a ver nuestros c&aacute;talogos !</a></div>

<!-- <div class="camera_caption camera_image-caption_3 moveFromLeft"><img
	src="../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/slide-image-caption-3.png%3F14058599523483859647"
	alt="image_caption" /></div>-->
<div class="camera_cta_1">
<a
	href="<?php echo $context ?>/site/collections/general.php" class="btn">Ver
C&aacute;talogo</a></div>


</div>








</div>


</div>



<!-- Content -->
<div id="content" class="clearfix"><section class="content">


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
<div class="collection-details"><a
	href="<?php echo $context ?>/site/collections/bracelets.php"
	title="Buscar Pulseras"> <img
	src="../site/img/collection/bracelets/20.jpg" alt="Puleras" /> </a></div>
<br>
<br>
<br>
<br>
<div class="hover-overlay"><span class="col-name"><a
	href="<?php echo $context ?>/site/collections/bracelets.php">Pulseras</a></span>
<div class="collection-action"><a
	href="<?php echo $context ?>/site/collections/bracelets.php"> <i
	class="fa fa-eye"></i> Ver Colecci&oacute;n</a></div>
</div>
</div>
</div>




<div class="home_collections_item">
<div class="home_collections_item_inner">
<div class="collection-details"><a
	href="<?php echo $context ?>/site/collections/games.php"
	title="Buscar Juegos"> <img src="../site/img/collection/games/19.jpg"
	alt="Juego" /> </a></div>
<br>
<br>
<br>
<div class="hover-overlay"><span class="col-name"><a
	href="<?php echo $context ?>/site/collections/games.php">Juegos</a></span>
<div class="collection-action"><a
	href="<?php echo $context ?>/site/collections/games.php"> <i
	class="fa fa-eye"></i> Ver Colecci&oacute;n</a></div>
</div>
</div>
</div>


<div class="home_collections_item">
<div class="home_collections_item_inner">
<div class="collection-details"><a
	href="<?php echo $context ?>/site/collections/earrings.php"
	title="Buscar Aretes"> <img
	src="<?php echo $context ?>/site/img/collection/aretes/H1.jpg"
	width="100%" alt="Aretes" /> </a></div>
<br>
<br>
<br>
<br>
<div class="hover-overlay"><span class="col-name"><a
	href="<?php echo $context ?>/site/collections/earrings.php">Aretes</a></span>
<div class="collection-action"><a
	href="<?php echo $context ?>/site/collections/earrings.php"> <i
	class="fa fa-eye"></i> Ver Colecci&oacute;n</a></div>
</div>
</div>
</div>



<div class="home_collections_item">
<div class="home_collections_item_inner">
<div class="collection-details"><a
	href="<?php echo $context ?>/site/collections/necklaces.php"
	title="Buscar Gargantillas"> <img
	src="../site/img/collection/necklances/8.jpg" alt="Gargantillas" /> </a></div>
<br>
<br>
<br>
<div class="hover-overlay"><span class="col-name"><a
	href="<?php echo $context ?>/site/collections/necklaces.php">Gargantillas</a></span>
<div class="collection-action"><a
	href="<?php echo $context ?>/site/collections/necklaces.php"> <i
	class="fa fa-eye"></i> Ver Colecci&oacute;n</a></div>
</div>
</div>
</div>





<div class="home_collections_item">
<div class="home_collections_item_inner">
<div class="collection-details"><a
	href="<?php echo $context ?>/site/collections/rings.php"
	title="Buscar Anillos"> <img src="../site/img/collection/rings/A10.jpg"
	alt="Anillos" /> </a></div>
<br>
<br>
<div class="hover-overlay"><span class="col-name"><a
	href="<?php echo $context ?>/site/collections/rings.php">Anillos</a></span>
<div class="collection-action"><a
	href="<?php echo $context ?>/site/collections/rings.php"> <i
	class="fa fa-eye"></i> Ver Colecci&oacute;n</a></div>
</div>
</div>
</div>








</div>
</div>
</div>
<script>
          $(document).ready(function() {
            $('.collection-details').hover(
              function() {
                $(this).parent().addClass("collection-hovered");
              },
              function() {
              $(this).parent().removeClass("collection-hovered");
              });
          });
          
        </script></div>
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
<div id="home_products"><?php 

foreach($nodeNuevo as $posicion=>$registro)
	{
		
		if($registro['oferta'] == 1 ){
			$divOferta="
				<div class='element no_full_width col-md-8 col-sm-8 not-animated'
						data-animate='fadeInUp' data-delay='0'>
					<ul class='row-container list-unstyled clearfix'>
					<li class='row-left'>
          <a onClick='previewProducto({$registro['idProducto']})'  data-target='#quick-shop-modal' data-toggle='modal'
              class='container_item'> <img style='cursor: pointer;'
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
		
			$divComercial="<div class='element no_full_width col-md-8 col-sm-8 not-animated'
								data-animate='fadeInUp' data-delay='0'>
							<ul class='row-container list-unstyled clearfix'>
								<li class='row-left'>
                  <a onClick='previewProducto({$registro['idProducto']})'  data-target='#quick-shop-modal' data-toggle='modal'
                    class='container_item'> <img style='cursor: pointer;' src='{$registro['imagen']}' class='img-responsive' 
										alt='{$registro['titulo']}' />
									 </a>

								</li>
								<li class='row-right parent-fly animMix'>
									<div class='product-content-left'>
										<a class='title-5' href='#'> {$registro['titulo']}</a>
										<span class='shopify-product-reviews-badge' data-id='registro{$posicion}'></span></div>
										<div class='product-content-right'>
										<div class='product-price'>
										<span class='price'> 
										<span class='money'>{$registro['precio']} </span> </span></div>
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

<!-- Modal -->

<div id="quick-shop-modal" class="modal" role="dialog"	aria-hidden="true" tabindex="-1" data-width="800">
<div class="modal-dialog rotateInDownLeft">
<div class="modal-content">
    <div class="modal-header"><i class="close fa fa-times btooltip"	data-toggle="tooltip" data-placement="top" title="Cerrar"
      data-dismiss="modal" aria-hidden="true"></i>
    </div>
<div class="modal-body">
  <div class="quick-shop-modal-bg"></div>
    <div class="row">
      <div class="col-md-24 product-image">					
           <iframe src="" frameborder="0" id="targetiframe" style=" height:400px; width:100%;" name="targetframe" allowtransparency="true"></iframe> <!-- target iframe -->
      </div>
  </div>
</div>
</div>
</div>
</div>




<div class="home-banner-wrapper">

<div class="container">
<div id="home-banner" class="text-center clearfix"><img
	class="pulse img-banner-caption"
	src="https://cdn.shopify.com/s/files/1/0908/7252/t/2/assets/home_banner_image_text.png?14058599523483859647"
	alt="" />
<div class="home-banner-caption">
<p>Si deseas incrementa tus ingresos, somos la mejor opci&oacute;n pues
manejamos diferentes rangos de descuento dependiendo tu monto de
inversi&oacute;n, entendiendo que entre m&aacute;s inviertas mayor ser&aacute; el descuento.
</p>
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
	<img
		src="<?php echo $context ?>/site/img/collection/laminado/collars.jpg"
		alt="" />
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
<h4><a
	href="blogs/blogs/47648387-sample-blog-post-with-left-slidebar.html">Oferta
del mes</a></h4>
<ul class="list-inline">
	<li class="author"><i class="fa fa-user"></i> Ivette Camacho</li>
	<li>/</li>
	<li class="comment"><a
		href="blogs/blogs/47648387-sample-blog-post-with-left-slidebar.html#comments">
	<span><i class="fa fa-pencil-square-o"></i> 1</span> Comentarios </a></li>
</ul>
<div class="intro">Puedes invertir desde $1,200 MXN y obtendr&aacute;s un 20%
de descuento y puedes obtener hasta un 55% de descuento.</div>
</div>
</div>

<div class="home-blog-item row">
<div class="date col-md-4">
<div class="date_inner">
<p><small>Julio</small><span>07</span></p>
</div>
</div>
<div class="home-blog-content col-md-20">
<h4><a href="blogs/blogs/44831939-vel-illum-qui-dolorem-eum-fugiat.html">Informaci&oacute;n</a></h4>
<ul class="list-inline">
	<li class="author"><i class="fa fa-user"></i> Ivette Camacho</li>
	<li>/</li>
	<li class="comment"><a
		href="blogs/blogs/44831939-vel-illum-qui-dolorem-eum-fugiat.html#comments">
	<span><i class="fa fa-pencil-square-o"></i> 1</span> Comentarios </a></li>
</ul>
<div class="intro">

<ol>
	<li>* Aceptamos devoluciones en un 30% de tu pr&oacute;xima compra</li>
	<li>* Contamos con m&aacute;s de 300 modelos diferentes entre aretes,
	arracadas, broqueles, gargantillas, pulseras y juegos</li>
	<li>* Modelos nuevos e innovadores cada 20 d&iacute;as</li>
	<li>* Enviamos a toda la rep&uacute;blica</li>
</ol>

</div>
</div>
</div>
<!--  <div class="home-blog-item row">--> <!--            <div class="date col-md-4">-->
<!--              <div class="date_inner">--> <!--                <p><small>June</small><span>30</span></p>-->
<!--              </div>--> <!--            </div>--> <!--            <div class="home-blog-content col-md-20">-->
<!--              <h4><a href="blogs/blogs/44831811-sample-blog-post-full-width.html">sample blog post full width</a></h4>-->
<!--              <ul class="list-inline">--> <!--                <li class="author"><i class="fa fa-user"></i> Jin Alkaid</li>-->
<!--                <li>/</li>--> <!--                <li class="comment">-->
<!--                  <a href="blogs/blogs/44831811-sample-blog-post-full-width.html#comments">-->
<!--                    <span><i class="fa fa-pencil-square-o"></i> 0</span> Comments-->
<!--                  </a>--> <!--                </li>--> <!--              </ul>-->
<!--              <div class="intro">Shoe street style leather tote oversized sweatshirt A.P.C. Prada Saffiano crop slipper denim shorts spearmint....</div>-->
<!--            </div>--> <!--          </div>--></div>
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
foreach($nodeDestacado as $posicion=>$registro)
	{
		
		if($registro['oferta'] == 1 ){
			$divDestacadoOferta="<div class='element no_full_width not-animated' data-animate='fadeInUp'
										data-delay='0'>
									<ul class='row-container list-unstyled clearfix'>
                    <li class='row-left'>
                    <a onClick='previewProducto({$registro['idProducto']})'  data-target='#quick-shop-modal' data-toggle='modal'
                      class='container_item'> <img style='cursor: pointer;'
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
                <a onClick='previewProducto({$registro['idProducto']})'  data-target='#quick-shop-modal' data-toggle='modal'
                  class='container_item'> <img style='cursor: pointer;'
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




<div class="home-partners">
<div class="container">
<div class="partners-logo row">

<div class="col-md-24">
<div id="partners-container" class="clearfix">
<h6 class="general-title">Proveedores</h6>
<div class="home-bottom_banner_wrapper col-md-24">
  <div id="body">
    <div class="row">
      <div class="span11">
        <div class="popin">
          <div id="map"></div>
        </div>
      </div>
      </div>
   	</div>
      
<!---->
<!--<div class="logo not-animated text-center" data-animate="bounceIn"-->
<!--	data-delay="150"><a class="animated"-->
<!--	href="https://site/collections/vendors?q=Vendor%201"> <img-->
<!--	class="pulse"-->
<!--	src="https://cdn.shopify.com/s/files/1/0908/7252/t/2/assets/partners_logo_1.png?14058599523483859647"-->
<!--	alt="" /> </a></div>-->
<!---->
<!--<div class="logo not-animated text-center" data-animate="bounceIn"-->
<!--	data-delay="300"><a class="animated" Product with right sidebar-->
<!--	href="https://site/collections/vendors?q=Vendor%202"> <img-->
<!--	class="pulse"-->
<!--	src="https://cdn.shopify.com/s/files/1/0908/7252/t/2/assets/partners_logo_2.png?14058599523483859647"-->
<!--	alt="" /> </a></div>-->
<!---->
<!--<div class="logo not-animated text-center" data-animate="bounceIn"-->
<!--	data-delay="450"><a class="animated"-->
<!--	href="https://site/collections/vendors?q=Vendor%203"> <img-->
<!--	class="pulse"-->
<!--	src="https://cdn.shopify.com/s/files/1/0908/7252/t/2/assets/partners_logo_3.png?14058599523483859647"-->
<!--	alt="" /> </a></div>-->
<!---->
<!--<div class="logo not-animated text-center" data-animate="bounceIn"-->
<!--	data-delay="600"><a class="animated"-->
<!--	href="https://site/collections/vendors?q=Vendor%204"> <img-->
<!--	class="pulse"-->
<!--	src="https://cdn.shopify.com/s/files/1/0908/7252/t/2/assets/partners_logo_4.png?14058599523483859647"-->
<!--	alt="" /> </a></div>-->
<!---->
<!--<div class="logo not-animated text-center" data-animate="bounceIn"-->
<!--	data-delay="750"><a class="animated"-->
<!--	href="https://site/collections/vendors?q=Vendor%201"> <img-->
<!--	class="pulse"-->
<!--	src="https://cdn.shopify.com/s/files/1/0908/7252/t/2/assets/partners_logo_5.png?14058599523483859647"-->
<!--	alt="" /> </a></div>-->
<!---->
<!--<div class="logo not-animated text-center" data-animate="bounceIn"-->
<!--	data-delay="900"><a class="animated"-->
<!--	href="https://site/collections/vendors?q=Vendor%202"> <img-->
<!--	class="pulse"-->
<!--	src="https://cdn.shopify.com/s/files/1/0908/7252/t/2/assets/partners_logo_6.png?14058599523483859647"-->
<!--	alt="" /> </a></div>-->
<!---->
<!--<div class="logo not-animated text-center" data-animate="bounceIn"-->
<!--	data-delay="1050"><a class="animated"-->
<!--	href="https://site/collections/vendors?q=Vendor%203"> <img-->
<!--	class="pulse"-->
<!--	src="https://cdn.shopify.com/s/files/1/0908/7252/t/2/assets/partners_logo_7.png?14058599523483859647"-->
<!--	alt="" /> </a></div>-->
<!---->
<!--</div>-->

</div>
</div>

</div>
</div>
</div>


</div>



</section></div>
</div>
</div>

<footer id="footer">
<div id="footer-content"><!--<h6 class="general-title contact-footer-title">Newsletter</h6>-->

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

<div class="copyright col-md-12">&copy; 2017 <a href="index.html">FashionGold</a>.
Todos los derechos reservados.</div>



<div id="widget-payment" class="col-md-12">
<ul id="payments" class="list-inline animated">


	<li class="btooltip tada" data-toggle="tooltip" data-placement="top"
		title="Visa"><a href="#" class="icons visa"></a></li>
	<li class="btooltip tada" data-toggle="tooltip" data-placement="top"
		title="Mastercard"><a href="#" class="icons mastercard"></a></li>
	<li class="btooltip tada" data-toggle="tooltip" data-placement="top"
		title="American Express"><a href="#" class="icons amex"></a></li>
	<li class="btooltip tada" data-toggle="tooltip" data-placement="top"
		title="Paypal"><a href="#" class="icons paypal"></a></li>
	<li class="btooltip tada" data-toggle="tooltip" data-placement="top"
		title="Moneybookers"><a href="index.html#;" class="icons moneybookers"></a></li>

</ul>
</div>

</div>
</div>

</div>
</footer>



<div class="newsletter-popup" style="display: none;">
<form action="" method="post" name="mc-embedded-subscribe-form"
	target="_blank">

<h3>Bienvenido FashionGold</h3>

<p class="tagline">Gracias por visitar nuestro sitio</p>

<!--<div class="group_input"><input class="form-control" type="email"-->
<!--	name="EMAIL" placeholder="YOUR EMAIL" />--> <!--<button class="btn" type="submit"><i class="fa fa-paper-plane"></i></button>-->
<!--</div>--></form>
<!--<div id="popup-hide"><input type="checkbox" id="mc-popup-hide" value="1"-->
<!--	checked="checked"> <label for="mc-popup-hide">No volver a ver este mensaje-->
<!--</label></div>-->

<li id="widget-social">
	<ul class="list-inline">

		<li><a target="_blank"
			href="https://www.facebook.com/pg/fashionGold5/about/?ref=page_internal"
			class="btooltip swing" data-toggle="tooltip" data-placement="bottom"
			title="Facebook"><i class="fa fa-facebook"></i> FACEBOOK</a></li>

	</ul>
	</li>

</div>





<script
	src="https://cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.global.js?14058599523483859647"
	type="text/javascript"></script> <script type="text/javascript">
    //<![CDATA[    
    // Including api.jquery.js conditionnally.
    if (typeof Shopify.onCartShippingRatesUpdate === 'undefined') {
      document.write("\u003cscript src=\"\/\/cdn.shopify.com\/s\/assets\/themes_support\/api.jquery-249bc01571641fb7bf9bf82378ba6333e9abdcc34aad49eb9e4edb01557b7dac.js\" type=\"text\/javascript\"\u003e\u003c\/script\u003e");
    }    
    //]]>
  </script> 

 <script type="text/javascript">
    var map;
    $(document).ready(function(){
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
          content: '<p>Calle Palma #2 Despacho 104 Edificio Burgos interior 4, Col. Centro, Ciudad de M?xico</p>'
        },
        mouseover: function(){
            (this.infoWindow).open(this.map, this);
        },
        mouseout: function(){
            this.infoWindow.close();
        },
        click: function(e){
      		window.top.location.href='<?php echo $context ?>/site/pages/contact.php';
        }
      });

    });

function previewProducto(idProducto){
    var src = '<?=$context?>/site/admin/mvc/view/producto/viewProducto.php?idproducto='+idProducto;
    var height = $(this).attr('data-height') || 250;
    var width = $(this).attr('data-width') || 400;
  
    $("#targetiframe").attr({'src':src,
                        'height': height,
                        'width': width});
	
}  
  </script>
<script type="text/javascript">
  
  jQuery(document).ready(function($) {
    
    
    $('#quick-shop-modal').on('hidden.bs.modal', function () {
      $('.zoomContainer').css('z-index', '1');
      $('#top').removeClass('z-idx');
    })
    
    $('#quick-shop-modal').on( 'shown.bs.modal', function () {
      $('#top').addClass('z-idx');
      $('.modal-dialog').addClass("fadeIn");
      imagesLoaded( '#quick-shop-modal', function() {
        
        updateScrollThumbsQS();
        
        $("#gallery_main_qs").show().owlCarousel({
          navigation : true,
          pagination: false,
          items: 4,
          itemsDesktop : [1199,4],
          itemsDesktopSmall : [979,3],
          itemsTablet: [768,3],
          itemsMobile : [479,2],
          scrollPerPage: true,
          navigationText: ['<span class="btooltip" title="Anterior"></span>', '<span class="btooltip" title="Siguiente"></span>']
        });
        
        var delayLoadingQS = '';       
        delayLoadingQS = setInterval(function(){            
          
          quickShopModalBackground.hide();
          $('.zoomContainer').css('z-index', '2000');
          $('#quick-shop-modal .modal-body').resize(); 
          
          clearInterval( delayLoadingQS );            
        }, 500);
      });
      
    });
    
    var quickShopModal = $('#quick-shop-modal');
    var quickShopContainer = $('#quick-shop-container');
    var quickShopImage = $('#quick-shop-image');
    var quickShopTitle = $('#quick-shop-title');
    var quickShopDescription = $('#quick-shop-description');
    var quickShopRelative = $('#quick-shop-relative');
    var quickShopVariantsContainer = $('#quick-shop-variants-container');
    var quickShopPriceContainer = $('#quick-shop-price-container');
    var quickShopAddButton = $('#quick-shop-add');
    var quickShopAddToCartButton = $('#quick-shop-add');
    var quickShopProductActions = $('#quick-shop-product-actions');
    var quickShopModalBackground = $('#quick-shop-modal .quick-shop-modal-bg');
      
           });
</script> <script src="services/javascripts/currencies.js"
	type="text/javascript"></script> <script
	src="../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.currencies.min.js%3F14058599523483859647"
	type="text/javascript"></script> <script type="text/javascript">
  
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
  
 
</script> <script>
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
  </script> <!--Androll--> <script type="text/javascript">
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
   ((document.getElementsByTagName('head') || [null])[0] ||
    document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
   if(oldonload){oldonload()}};
}());
</script> <!-- Google Code --> <script>

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
