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
        <link rel="icon" href="<?php echo $context ?>/rings.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
        <link rel="canonical" href="rings.php" />
        <link href='<?php echo $context ?>/fonts.googleapis.com/css%3Ffamily=Carrois+Gothic.css' rel='stylesheet' type='text/css'>
        <link href='<?php echo $context ?>/fonts.googleapis.com/css%3Ffamily=Lato:100,300,400,700.css' rel='stylesheet' type='text/css'>
        <link href='<?php echo $context ?>/fonts.googleapis.com/css%3Ffamily=Raleway:400,600,500,700.css' rel='stylesheet' type='text/css'>
        <link href='<?php echo $context ?>/fonts.googleapis.com/css%3Ffamily=Quicksand:300,400,700.css' rel='stylesheet' type='text/css'>
        <meta name="description" content="" />
        <title>Aviso de Privacidad | Fashion Gold </title>
        <meta property="og:image" content="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/logo.png?14058599523483859647" />

        <link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.camera.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $context ?>/netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.fancybox-buttons.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.animate.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/application.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/swatch.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.owl.carousel.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.bxslider.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/bootstrap.min.3x.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.bootstrap.3x.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.global.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.style.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.media.3x.css%3F14058599523483859647.css" rel="stylesheet" type="text/css" media="all" />
        <link href='<?php echo $context ?>/site/css/font.css' rel='stylesheet' type='text/css'>

        <script src="<?=$context?>/site/admin/js/jquery.js"></script>
        <script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery-1.9.1.min.js%3F14058599523483859647" type="text/javascript"></script>
        <script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.imagesloaded.min.js%3F14058599523483859647" type="text/javascript"></script>
        <script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/bootstrap.min.3x.js%3F14058599523483859647" type="text/javascript"></script>
		<script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.easing.1.3.js%3F14058599523483859647" type="text/javascript"></script>
        <script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.camera.min.js%3F14058599523483859647" type="text/javascript"></script>
        <script	src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.mobile.customized.min.js%3F14058599523483859647" type="text/javascript"></script>
        <script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cookies.js%3F14058599523483859647" type="text/javascript"></script>
        <script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/modernizr.js%3F14058599523483859647" type="text/javascript"></script>
        <script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.optionSelect.js%3F14058599523483859647" type="text/javascript"></script>
        <script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.customSelect.js%3F14058599523483859647" type="text/javascript"></script>
        <script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/application.js%3F14058599523483859647" type="text/javascript"></script>
        <script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.owl.carousel.min.js%3F14058599523483859647" type="text/javascript"></script>
        <script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.bxslider.js%3F14058599523483859647" type="text/javascript"></script>
        <script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/skrollr.min.js%3F14058599523483859647" type="text/javascript"></script>
        <script src="https://cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.isotope.min.js?14058599523483859647" type="text/javascript"></script>
        <script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.fancybox-buttons.js%3F14058599523483859647" type="text/javascript"></script>
        <script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.zoom.js%3F14058599523483859647" type="text/javascript"></script>
        <script src="<?php echo $context ?>/services/javascripts/currencies.js" type="text/javascript"></script>
        <script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/jquery.currencies.min.js%3F14058599523483859647" type="text/javascript"></script>
        <script src="<?php echo $context ?>/cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.script.js%3F14058599523483859647" type="text/javascript"></script>
  
        <link rel="alternate" type="application/json+oembed" href="https://site/collections/rings.oembed">
        <link rel="alternate" type="application/atom+xml" title="Feed" href="https://site/collections/rings.atom" />
        <script type="text/javascript">
            //<![CDATA[
            var Shopify = Shopify || {};
            Shopify.shop = "site";
            Shopify.theme = {
                "name": "jewelry",
                "id": 41982083,
                "theme_store_id": null,
                "role": "main"
            };
            Shopify.theme.handle = "null";
            Shopify.theme.style = {
                "id": null,
                "handle": null
            };

            //]]>
        </script>
        <script id="__st">
            //<![CDATA[
            var __st = {
                "a": 9087252,
                "offset": -14400,
                "reqid": "83e85db6-519f-44c8-b874-116cd9899619",
                "pageurl": "site\/collections\/rings",
                "u": "9a13e414eb47",
                "p": "collection",
                "rtyp": "collection",
                "rid": 81695171
            };
            //]]>
        </script>
        <script src="../../cdn.shopify.com/s/javascripts/shopify_stats.js%3Fv=6" type="text/javascript" async="async"></script>
        <meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/9087252/digital_wallets/dialog" />

        <script type="text/javascript">
            window.ShopifyAnalytics = window.ShopifyAnalytics || {};
            window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
            window.ShopifyAnalytics.meta.currency = 'USD';
            var meta = {
                "page": {
                    "pageType": "collection",
                    "resourceType": "collection",
                    "resourceId": 81695171
                }
            };
            for (var attr in meta) {
                window.ShopifyAnalytics.meta[attr] = meta[attr];
            }
        </script>

        <script type="text/javascript">
            window.ShopifyAnalytics.merchantGoogleAnalytics = function() {

            };
        </script>

        <script type="text/javascript" class="analytics">
            (function() {
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
                trekkie.load({
                    "Trekkie": {
                        "appName": "storefront",
                        "development": false,
                        "defaultAttributes": {
                            "shopId": 9087252,
                            "isMerchantRequest": null,
                            "themeId": 41982083,
                            "themeCityHash": 14839528528689155135
                        }
                    },
                    "Performance": {
                        "navigationTimingApiMeasurementsEnabled": true,
                        "navigationTimingApiMeasurementsSampleRate": 0.1
                    },
                    "Session Attribution": {}
                });

                var loaded = false;
                trekkie.ready(function() {
                    if (loaded) return;
                    loaded = true;

                    window.ShopifyAnalytics.lib = window.trekkie;


                    var originalDocumentWrite = document.write;
                    document.write = customDocumentWrite;
                    try {
                        window.ShopifyAnalytics.merchantGoogleAnalytics.call(this);
                    } catch (error) {};
                    document.write = originalDocumentWrite;


                    window.ShopifyAnalytics.lib.page(
                        null, {
                            "pageType": "collection",
                            "resourceType": "collection",
                            "resourceId": 81695171
                        }
                    );


                    window.ShopifyAnalytics.lib.track(
                        "Viewed Product Category", {
                            "category": "Collection: rings",
                            "nonInteraction": true
                        }
                    );

                });


                var eventsListenerScript = document.createElement('script');
                eventsListenerScript.async = true;
                eventsListenerScript.src = "//cdn.shopify.com/s/assets/shop_events_listener-9410288c486c406bc38edb97003bb123d375112c2b7e037d65afabae7c905e02.js";
                document.getElementsByTagName('head')[0].appendChild(eventsListenerScript);

            })();
        </script>


    </head>

    <body itemscope itemtype="http://schema.org/WebPage" class="templateCollection">

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

                                                        <li class="logout"><a href="https://site/account/login">Inicio de
			sesi&oacute;n</a></li>
                                                        <li class="account"><a href="https://site/account/register">Register</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </li>


                                            <li class="is-mobile-wl"><a href="../pages/wish-list.html"><i
			class="fa fa-heart"></i></a></li>





                                            <li class="is-mobile-cart"><a href="https://site/cart"><i
			class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="collapse navbar-collapse">
                                        <ul class="nav navbar-nav hoverMenuWrapper">
                                            <li class="nav-item active"><a href="<?php echo $context?>"> <span>Inicio</span>
		</a></li>
                                            <li class="dropdown mega-menu"><a href="#" class="dropdown-toggle dropdown-link" data-toggle="dropdown"> <span>Cátalogos</span>
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
                                              <a href="#" data-toggle="dropdown">
                                                  <span>¿Sabias que?</span>

		<i class="fa fa-caret-down"></i> <i
			class="sub-dropdown1  visible-sm visible-md visible-lg"></i> <i
			class="sub-dropdown visible-sm visible-md visible-lg"></i> </a>
                                                <ul class="dropdown-menu">
                                                    <li class=""><a tabindex="-1" href="blogs/sample-blog-with-grid-3-columns.html"> <i
				class="fa fa-wrench"></i> En construcción </a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item"><a href="<?php echo $context ?>/site/pages/contact.php"> <span>Contactanos</span>
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
                            </nav>
                        </li>




                        <li class="top-search hidden-xs"></li>





                        <li class="mobile-search visible-xs">
                            <form id="mobile-search" class="search-form" action="https://site/search" method="get"><input type="hidden" name="type" value="product" /> <input type="text" class="" name="q" value="" accesskey="4" autocomplete="off" placeholder="Search something..." />

                                <button type="submit" class="search-submit" title="search"><i
		class="fa fa-search"></i></button>

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

        

        <div id="content-wrapper-parent">
            <div id="content-wrapper">
                <!-- Content -->
                <div id="content" class="clearfix">

                    <div id="breadcrumb" class="breadcrumb">
                        <div itemprop="breadcrumb" class="container">
                            <div class="row">
                                <div class="col-md-24"><a href="<?php echo $context ?>" class="homepage-link" title="Back to the frontpage">Inicio</a> <span>/</span>
                                    <span class="page-title">AVISO DE PRIVACIDAD</span></div>
                            </div>
                        </div>
                    </div>

                    <section class="content">


                        <div class="container">
                            <div class="row">
                                <div id="col-main" class="col-md-24 normal-page clearfix">
                                    <div class="page about-us   ">

                                        <div class="col-md-24" >
                                            <img src="../../cdn.shopify.com/s/files/1/0908/7252/t/2/assets/logo.png%3F14058599523483859647"  />
                                        </div> 
                                        <br />
                                        <p><b>Fashion Gold</b>, con domicilio en la Ciudad de México, es el responsable del uso y protección de sus datos
                                                personales, y al respecto le informamos lo siguiente:</p>
                                        <h3>
                                            ¿Para qué fines utilizaremos sus datos personales?
                                        </h3>
                                        <p> 
                                        Los datos personales que recabamos de usted, los utilizaremos para las siguientes finalidades que son
                                        necesarias para el servicio que solicita:
                                        </p>
                                        
                                        <ul>
                                        <li>* Envío de información comercial a solicitud del interesado.</li>
                                        <li>* Comunicación con el interesado.</li>
                                        </ul>
                                        
                                        <p>
                                        De manera adicional, utilizaremos su información personal para las siguientes finalidades que no son
                                        necesarias para el servicio solicitado, pero que nos permiten y facilitan brindarle una mejor atención:
                                        </p>
                                         
                                        <ul>
                                        <li>* Envío de información comercial de interés</li>
                                        </ul>
                                        <p> 
                                        En caso de que no desee que sus datos personales sean tratados para estos fines adicionales, desde este
                                        momento usted nos puede comunicar lo anterior, a través de la dirección
                                        <b>direcciongeneral@fashiongold.com.mx</b></p>


                                        <h3>¿Qué datos personales utilizaremos para estos fines?</h3>
                                        <p>Para llevar a cabo las finalidades descritas en el presente aviso de privacidad, utilizaremos los siguientes datos personales: Datos de contacto tales como nombre, teléfono, domicilio y formas de contacto electrónicas.</p>
                                        <p>Además de los datos personales mencionados anteriormente, para las finalidades informadas en el presente aviso de privacidad utilizaremos los siguientes datos personales considerados como sensibles, que requieren de especial protección: datos financieros, biométricos, digitales, de identificación, patrimoniales, académicos o laborales.</p>
                                        
                                        <h3>¿Con quién compartimos su información personal y para qué fines?</h3>
                                        <p>Le informamos que sus datos personales son compartidos dentro y fuera del país con las siguientes personas, empresas, organizaciones y autoridades distintas a nosotros, para los siguientes fines:</p>
                                        <p>Destinatario de los datos personales         País (opcional)                   Finalidad</p>
                                        <p>Autoridades                                                   México                                Si nos fuera solicitado en un proceso judicial bajo una orden.</p>
                                        <p>Socios de Negocios                                       México                                Proporcionarle un servicio que no dependa completamente de 
                                           Entidades Financieras                   </p>
                                        <p>                                 México                               Validar información de pagos entre los involucrados*</p>

                                        <p>Le informamos que para las transferencias indicadas con un asterisco (*) requerimos obtener su consentimiento. Si usted no manifiesta su negativa para dichas transferencias, entenderemos que nos lo ha otorgado [Ésto sólo aplica para consentimiento tácito].</p>
                                        <p>No autorizo que mis datos personales sean compartidos con los siguientes terceros (favor de notificarlo a <b>direcciongeneral@fashiongold.com.mx</b> )</p>
                                        
                                        <h3>¿Cómo puede acceder, rectificar o cancelar sus datos personales, u oponerse a su uso?</h3>

                                        <p>Usted tiene derecho a conocer qué datos personales tenemos de usted, para qué los utilizamos y las condiciones del uso que les damos (Acceso). Asimismo, es su derecho solicitar la corrección de su información personal en caso de que esté desactualizada, sea inexacta o incompleta (Rectificación); que la eliminemos de nuestros registros o bases de datos cuando considere que la misma no está siendo utilizada conforme a los principios, deberes y obligaciones previstas en la normativa (Cancelación); así como oponerse al uso de sus datos personales para fines específicos (Oposición). Estos derechos se conocen como derechos ARCO.</p>
                                        <p>Para el ejercicio de cualquiera de los derechos ARCO, usted deberá presentar la solicitud respectiva en formato digital firmado a direcciongeneral@fashiongold.com.mx
Para conocer el procedimiento y requisitos para el ejercicio de los derechos ARCO, usted podrá ponerse en contacto con nuestro Departamento de Privacidad, que dará trámite a las solicitudes para el ejercicio de estos derechos, y atenderá cualquier duda que pudiera tener respecto al tratamiento de su información. Los datos de contacto del Departamento de Privacidad son los siguientes: 
direcciongeneral@fashiongold.com.mx
                                        </p>
                                        
                                        <h3>¿Cómo puede revocar su consentimiento para el uso de sus datos personales?</h3>
                                        
                                        <p>Usted puede revocar el consentimiento que, en su caso, nos haya otorgado para el tratamiento de sus datos personales. Sin embargo, es importante que tenga en cuenta que no en todos los casos podremos atender su solicitud o concluir el uso de forma inmediata, ya que es posible que por alguna obligación legal requiramos seguir tratando sus datos personales. Asimismo, usted deberá considerar que para ciertos fines, la revocación de su consentimiento implicará que no le podamos seguir prestando el servicio que nos solicitó, o la conclusión de su relación con nosotros.</p>
                                        <p>Para revocar su consentimiento deberá presentar su solicitud en formato digital firmado a direcciongeneral@fashiongold.com.mx
Para conocer el procedimiento y requisitos para la revocación del consentimiento, usted podrá ponerse en contacto con nuestro Departamento de Privacidad.
</p>
                                        <h3>¿Cómo puede limitar el uso o divulgación de su información personal? </h3>

                                        <p>Con objeto de que usted pueda limitar el uso y divulgación de su información personal, le ofrecemos los siguientes medios:</p>
                                        <ul>
                                        <li>* Su inscripción en el Registro Público para Evitar Publicidad, que está a cargo de la Procuraduría Federal del Consumidor, con la finalidad de que sus datos personales no sean utilizados para recibir publicidad o promociones de empresas de bienes o servicios. Para mayor información sobre este registro, usted puede consultar el portal de Internet de la PROFECO, o bien ponerse en contacto directo con ésta.</li>
                                        </ul>
                                        <p>Su registro en el listado de exclusión, a fin de que sus datos personales no sean tratados para fines mercadotécnicos, publicitarios o de prospección comercial por nuestra parte. Para mayor información escríbanos  a direcciongeneral@fashiongold.com.mx</p>
                                        <ul>
                                        <li>* El uso de tecnologías de rastreo en nuestro portal de Internet
Le informamos que en nuestra página de Internet utilizamos cookies, web beacons y otras tecnologías a través de las cuales es posible monitorear su comportamiento como usuario de Internet, así como brindarle un mejor servicio y experiencia de usuario al navegar en nuestra página.
</li>
                                        </ul>

                                        <p>Los datos personales que obtenemos de estas tecnologías de rastreo son los siguientes: Formulario de Registro, mismos que utilizamos para ponernos en contacto con Usted.  </p>
                                        <p>Estas tecnologías podrán deshabilitarse siguiendo los siguientes pasos: solicitando la eliminación de sus datos en formato digital firmado a direcciongeneral@fashiongold.com.mx</p>
                                        
                                        <h3>¿Cómo puede conocer los cambios a este aviso de privacidad?</h3>
                                        <p>El presente aviso de privacidad puede sufrir modificaciones, cambios o actualizaciones derivadas de nuevos requerimientos legales; de nuestras propias necesidades por los productos; de nuestras prácticas de privacidad; de cambios en nuestro modelo de negocio, o por otras causas.</p>
                                        <p>Nos comprometemos a mantenerlo informado sobre los cambios que pueda sufrir el presente aviso de privacidad, a través de nuestro SITIO WEB.</p>
                                        <p>El procedimiento a través del cual se llevarán a cabo las notificaciones sobre cambios o actualizaciones al presente aviso de privacidad es el siguiente: Apartado en el Sitio Web.</p>

                                        <p><b> Fashion Gold</b></p>
                                       

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
                <!--<h6 class="general-title contact-footer-title">Newsletter</h6>-->

                <div class="footer-content footer-content-top clearfix">
                    <div class="container">
                        <div class="footer-link-list col-md-12 text-center">
                            <div class="group">
                                <h5>Nosotros</h5>

                                <ul class="list-unstyled list-styled">

                                    <li class="list-unstyled"><a href="<?php echo $context?>/site/pages/about.php">Quiénes Somos</a></li>
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

                            <div class="copyright col-md-12">&copy; 2018 Fashion Gold. <a href="<?php echo $context?>/site/pages/privacity.php">Políticas de Privacidad</a> </div>



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
        <script src="https://cdn.shopify.com/s/files/1/0908/7252/t/2/assets/cs.global.js?14058599523483859647" type="text/javascript"></script>
        <script type="text/javascript">
            //<![CDATA[    
            // Including api.jquery.js conditionnally.
            if (typeof Shopify.onCartShippingRatesUpdate === 'undefined') {
                document.write("\u003cscript src=\"\/\/cdn.shopify.com\/s\/assets\/themes_support\/api.jquery-249bc01571641fb7bf9bf82378ba6333e9abdcc34aad49eb9e4edb01557b7dac.js\" type=\"text\/javascript\"\u003e\u003c\/script\u003e");
            }
            //]]>
        </script>
        <script type="text/javascript">
            Shopify.updateCartInfo = function(cart, cart_summary_id, cart_count_id) {
                    if ((typeof cart_summary_id) === 'string') {
                        var cart_summary = jQuery(cart_summary_id);
                        if (cart_summary.length) {
                            // Start from scratch.
                            cart_summary.empty();
                            // Pull it all out.

                            jQuery.each(cart, function(key, value) {
                                    if (key === 'items') {


                                        if (value.length) {

                                            jQuery('<div class="items control-container"></div>').appendTo(cart_summary);
                                            var table = jQuery(cart_summary_id + ' div.items');

                                            jQuery.each(value, function(i, item) {
                                                    jQuery('<div class="row items-wrapper"><a class="cart-close" title="Remove" href="javascript:void(0);" onclick="Shopify.removeItem(' + item.variant_id + ')"><i class="fa fa-times"></i></a><div class="col-md-8 cart-left"><a class="cart-image" href="https://site/collections/' & #32;+&# 32; item.url & #32;+&# 32;
                                                        '"><img src="https://site/collections/' & #32;+&# 32; Shopify.resizeImage(item.image, & #32;'small')&# 32; + & #32;'" alt= ""
                                                            title = "" / > < /a></div > < div class = "col-md-16 cart-right" > < div class = "cart-title" > < a href = "https://site/collections/'&#32;+&#32;item.url&#32;+&#32;'" > ' + item.title + ' < /a></div > < div class = "cart-price" > ' + Shopify.formatMoney(item.price, "<span class='
                                                            money '>${{amount}}</span>") + ' < span class = "x" > x < /span>' + item.quantity + '</div > < /div></div > ').appendTo(table);
                                                        });

                                                    jQuery('<div class="subtotal"><span>Subtotal:</span><span class="cart-total-right">' + Shopify.formatMoney(cart.total_price, "<span class='money'>${{amount}}</span>") + '</span></div>').appendTo(cart_summary);
                                                    jQuery('<div class="action"><button class="btn" onclick="window.location=\'/checkout\'">CHECKOUT</button><a class="btn btn-1" href="https://site/cart\">View Cart</button></a></div>').appendTo(cart_summary);


                                                } else {
                                                    jQuery('<div class="empty text-center"><em>Your shopping cart is empty.. <a href="all.html" class="btn">Continue Shopping</a></em></div>').appendTo(cart_summary);
                                                }
                                            }
                                        });
                                }
                            }
                            // Update cart count.
                            if ((typeof cart_count_id) === 'string') {
                                if (cart.item_count == 0) {
                                    jQuery('#' + cart_count_id).html('your cart is empty');
                                } else if (cart.item_count == 1) {
                                    jQuery('#' + cart_count_id).html('1 item in your cart');
                                } else {
                                    jQuery('#' + cart_count_id).html(cart.item_count + ' items in your cart');
                                }
                            }

                            /* Update cart info */
                            updateCartDesc(cart);
                        };

                        function updateCartDesc(data) {
                            var $cartLinkText = $('.cart-link .icon:first .number');
                            switch (data.item_count) {
                                case 0:
                                    $cartLinkText.html('0');
                                    break;
                                case 1:
                                    $cartLinkText.html('1');
                                    break;
                                default:
                                    $cartLinkText.html(data.item_count);
                                    break;
                            }
                            var $cartPrice = '<span class="total"> - ' + Shopify.formatMoney(data.total_price, "<span class='money'>${{amount}}</span>") + '</span>';

                            /* Update currency */
                            currenciesCallbackSpecial('#umbrella span.money');

                        }

                        Shopify.onCartUpdate = function(cart) {
                            Shopify.updateCartInfo(cart, '#cart-info #cart-content', 'shopping-cart');
                        };

                        $(window).load(function() {
                            // Let's get the cart and show what's in it in the cart box.	
                            Shopify.getCart(function(cart) {

                                Shopify.updateCartInfo(cart, '#cart-info #cart-content');
                            });
                        });
        </script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {

                        $('#quick-shop-modal').on('hidden.bs.modal', function() {
                            $('.zoomContainer').css('z-index', '1');
                            $('#top').removeClass('z-idx');
                        })

                        $('#quick-shop-modal').on('shown.bs.modal', function() {
                            $('#top').addClass('z-idx');
                            $('.modal-dialog').addClass("animated");
                            imagesLoaded('#quick-shop-modal', function() {

                                updateScrollThumbsQS();

                                $("#gallery_main_qs").show().owlCarousel({
                                    navigation: true,
                                    pagination: false,
                                    items: 4,
                                    itemsDesktop: [1199, 4],
                                    itemsDesktopSmall: [979, 3],
                                    itemsTablet: [768, 3],
                                    itemsMobile: [479, 2],
                                    scrollPerPage: true,
                                    navigationText: ['<span class="btooltip" title="Previous"></span>', '<span class="btooltip" title="Next"></span>']
                                });

                                var delayLoadingQS = '';
                                delayLoadingQS = setInterval(function() {

                                    quickShopModalBackground.hide();
                                    $('.zoomContainer').css('z-index', '2000');
                                    $('#quick-shop-modal .modal-body').resize();

                                    clearInterval(delayLoadingQS);
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

                        $('body').on(clickEv, '.quick_shop:not(.unavailable)', function(event) {
                                    var quickShopImage = $('#quick-shop-image');

                                    var $this = $(this);
                                    var product_json = $this.find('.product-json').html();

                                    // Grab product data
                                    var selectedProduct = JSON.parse(product_json);
                                    var selectedProductID = selectedProduct.id;
                                    // Update add button
                                    quickShopAddButton.data('product-id', selectedProductID);

                                    // Update image
                                    quickShopImage.empty();
                                    quickShopImage.html('<a class="main-image"><img class="img-zoom img-responsive image-fly" src="https://site/collections/' + & #32;Shopify.resizeImage(selectedProduct.featured_image,"grande")+'" data-zoom-image= "'+ selectedProduct.featured_image +'"
                                            alt = "" / > < /a>');

                                            var qs_images_size = "";
                                            if (selectedProduct.images.length < 4) qs_images_size = "small-thumbs";

                                            quickShopImage.append('<div id="gallery_main_qs" class="product-image-thumb scroll scroll-mini ' + qs_images_size + '"></div>');

                                            var qs_images = selectedProduct.images; $.each(qs_images, function(index, value) {
                                                if (index)
                                                    quickShopImage.find('#gallery_main_qs').append('<a class="image-thumb" href="https://site/collections/' + value + '" alt="" data-image="' + Shopify.resizeImage(value, 'grande') + '" data-zoom-image="' + Shopify.resizeImage(value, 'original') + '"><img src="https://site/collections/' + & #32;Shopify.resizeImage(value,"compact") +'" alt= "" / > < /a>');
                                                        else
                                                            quickShopImage.find('#gallery_main_qs').append('<a class="image-thumb active" href="https://site/collections/' + value + '" alt="" data-image="' + Shopify.resizeImage(value, 'grande') + '" data-zoom-image="' + Shopify.resizeImage(value, 'original') + '"><img src="https://site/collections/' + & #32;Shopify.resizeImage(value,"compact") +'" alt= "" / > < /a>');
                                                            });

                                                // Update title
                                                quickShopTitle.html('<span href="/products/' + selectedProduct.handle + '">' + selectedProduct.title + '</span>');

                                                // Update description
                                                var desc = selectedProduct.description.substr(0, 370) + "...";
                                                quickShopDescription.html(desc);

                                                // Update relative
                                                quickShopRelative.find('a').remove();

                                                quickShopRelative.find('.vendor .control-label').after('<a href="https://site/collections/vendors?q=' + selectedProduct.vendor.replace('&#32;', & #32;'+')+'"> '+selectedProduct.vendor+'</a>');
        quickShopRelative.find('.type .control-label').after('<a href= "https://site/collections/types?q='+selectedProduct.type.replace('&#32;',&#32;'+')+'" > '+selectedProduct.type+' < /a>');

                                                    // Generate variants
                                                    var productVariants = selectedProduct.variants;
                                                    var productVariantsCount = productVariants.length;

                                                    quickShopPriceContainer.html(''); quickShopVariantsContainer.html(''); quickShopAddToCartButton.removeAttr('disabled').fadeTo(200, 1);

                                                    if (productVariantsCount > 1) {

                                                        // Reveal variants container
                                                        quickShopVariantsContainer.show();

                                                        // Build variants element
                                                        var quickShopVariantElement = $('<select>', {
                                                            'id': ('#quick-shop-variants-' + selectedProductID),
                                                            'name': 'id'
                                                        });
                                                        var quickShopVariantOptions = '';

                                                        for (var i = 0; i < productVariantsCount; i++) {
                                                            quickShopVariantOptions += '<option value="' + productVariants[i].id + '">' + productVariants[i].title + '</option>'
                                                        };

                                                        // Add variants element to page
                                                        quickShopVariantElement.append(quickShopVariantOptions);
                                                        quickShopVariantsContainer.append(quickShopVariantElement);

                                                        // Bind variants to OptionSelect JS
                                                        new Shopify.OptionSelectors(('#quick-shop-variants-' + selectedProductID), {
                                                            product: selectedProduct,
                                                            onVariantSelected: selectOptionCallback
                                                        });

                                                        // Add label if only one product option and it isn't 'Title'.
                                                        if (selectedProduct.options.length == 1 && selectedProduct.options[0] != 'Title') {
                                                            $('#quick-shop-product-actions .selector-wrapper:eq(0)').prepend('<label>' + selectedProduct.options[0] + '</label>');
                                                        }

                                                        // Auto-select first available variant on page load.
                                                        var found_one_in_stock = false;
                                                        for (var i = 0; i < selectedProduct.variants.length; i++) {

                                                            var variant = selectedProduct.variants[i];
                                                            if (variant.available && found_one_in_stock == false) {

                                                                found_one_in_stock = true;
                                                                for (var j = 0; j < variant.options.length; j++) {

                                                                    $('.single-option-selector:eq(' + j + ')').val(variant.options[j]).trigger('change');

                                                                }
                                                            }
                                                        }

                                                        $('#quick-shop-variants-container .single-option-selector').customStyle();

                                                    } else { // If product only has a single variant

                                                        // Hide unnecessary variants container
                                                        quickShopVariantsContainer.hide();

                                                        // Build variants element
                                                        var quickShopVariantElement = $('<select>', {
                                                            'id': ('#quick-shop-variants-' + selectedProductID),
                                                            'name': 'id'
                                                        });
                                                        var quickShopVariantOptions = '';

                                                        for (var i = 0; i < productVariantsCount; i++) {
                                                            quickShopVariantOptions += '<option value="' + productVariants[i].id + '">' + productVariants[i].title + '</option>'
                                                        };

                                                        // Add variants element to page
                                                        quickShopVariantElement.append(quickShopVariantOptions);
                                                        quickShopVariantsContainer.append(quickShopVariantElement);


                                                        // Update the add button to include correct variant id
                                                        quickShopAddToCartButton.data('variant-id', productVariants[0].id);

                                                        // Determine if product is on sale
                                                        if (productVariants[0].compare_at_price > 0 && productVariants[0].compare_at_price > productVariants[0].price) {
                                                            quickShopPriceContainer.html('<del class="price_compare">' + Shopify.formatMoney(productVariants[0].compare_at_price, "<span class='money'>${{amount}}</span>") + '</del>' + '<span class="price_sale">' + Shopify.formatMoney(productVariants[0].price, "<span class='money'>${{amount}}</span>") + '</span>');
                                                        } else {
                                                            quickShopPriceContainer.html('<span class="price">' + Shopify.formatMoney(productVariants[0].price, "<span class='money'>${{amount}}</span>") + '</span>');
                                                        }

                                                    } // END of (productVariantsCount > 1)


                                                    // Update currency
                                                    currenciesCallbackSpecial('#quick-shop-modal span.money');


                                                });

                                                /* selectOptionCallback
      ===================================== */
                                                var selectOptionCallback = function(variant, selector) {

                                                    // selected a valid and in stock variant
                                                    if (variant && (variant.inventory_quantity > 0 || (variant.inventory_quantity <= 0 && variant.inventory_policy == 'continue'))) {

                                                        quickShopAddToCartButton.data('variant-id', variant.id);


                                                        quickShopAddToCartButton.removeAttr('disabled').fadeTo(200, 1);

                                                        // determine if variant is on sale
                                                        if (variant.compare_at_price > 0 && variant.compare_at_price > variant.price) {
                                                            quickShopPriceContainer.html('</del>' + '<span class="price_sale">' + Shopify.formatMoney(variant.price, "<span class='money'>${{amount}}</span>") + '</span><span class="dash">/</span><del class="price_compare">' + Shopify.formatMoney(variant.compare_at_price, "<span class='money'>${{amount}}</span>"));
                                                        } else {
                                                            quickShopPriceContainer.html('<span class="price">' + Shopify.formatMoney(variant.price, "<span class='money'>${{amount}}</span>") + '</span>');
                                                        };

                                                        // selected an invalid or out of stock variant 
                                                    } else {
                                                        // variant doesn't exist
                                                        quickShopAddToCartButton.attr('disabled', 'disabled').fadeTo(200, 0.5);
                                                        var message = variant ? "Sold Out" : "Unavailable";
                                                        quickShopPriceContainer.html('<span class="unavailable">' + message + '</span>');

                                                    }


                                                    // Update currency
                                                    currenciesCallbackSpecial('#quick-shop-modal span.money');

                                                }

                                            });
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

            var shopCurrency = '',
                defaultCurrency = '',
                cookieCurrency = '';
            currenciesCallback();

            function currenciesCallback() {

                Currency.format = 'money_format';


                shopCurrency = 'USD';

                /* Sometimes merchants change their shop currency, let's tell our JavaScript file */
                Currency.money_with_currency_format[shopCurrency] = "${{amount}} USD";
                Currency.money_format[shopCurrency] = "${{amount}}";

                /* Default currency */
                defaultCurrency = 'USD' || shopCurrency;

                /* Cookie currency */
                cookieCurrency = Currency.cookie.read();

                /* Fix for customer account pages */
                jQuery('span.money span.money').each(function() {
                    jQuery(this).parents('span.money').removeClass('money');
                });

                /* Saving the current price */
                jQuery('span.money').each(function() {
                    jQuery(this).attr('data-currency-USD', jQuery(this).html());
                });

                // If there's no cookie.
                if (cookieCurrency == null) {
                    if (shopCurrency !== defaultCurrency) {
                        Currency.convertAll(shopCurrency, defaultCurrency);
                        jQuery('.currency_code').html(defaultCurrency);
                    } else {
                        Currency.currentCurrency = defaultCurrency;
                    }
                    Currency.cookie.write(defaultCurrency);
                }
                // If the cookie value does not correspond to any value in the currency dropdown.
                else if (jQuery('[name=currencies]').size() && jQuery('[name=currencies] option[value=' + cookieCurrency + ']').size() === 0) {
                    Currency.currentCurrency = shopCurrency;
                    Currency.cookie.write(shopCurrency);
                } else if (cookieCurrency === shopCurrency) {
                    Currency.currentCurrency = shopCurrency;
                } else {
                    Currency.convertAll(shopCurrency, cookieCurrency);

                    jQuery('#currencies li').removeClass('active');
                    jQuery('#currencies #currency-' + cookieCurrency).addClass('active');
                    jQuery('.currency_code').html(cookieCurrency);
                }

                jQuery('[name=currencies]').val(Currency.currentCurrency).change(function() {
                    var newCurrency = jQuery(this).val();
                    Currency.convertAll(Currency.currentCurrency, newCurrency);
                    jQuery('.currency_code').html(Currency.currentCurrency);
                    jQuery(this).parents('#currency').removeClass('open');

                    location.reload();
                });


                $('.currencies li').removeClass('active');
                $('.currencies .currency-' + Currency.cookie.read()).addClass('active');
            }

            function currenciesCallbackSpecial(id) {
                /* Saving the current price */
                jQuery(id).each(function() {
                    jQuery(this).attr('data-currency-USD', jQuery(this).html());
                });

                /* Update currency */
                Currency.convertAll(shopCurrency, Currency.cookie.read(), id, 'money_format');
            }
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
            (function() {
                var oldonload = window.onload;
                window.onload = function() {
                    __adroll_loaded = true;
                    var scr = document.createElement("script");
                    var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
                    scr.setAttribute('async', 'true');
                    scr.type = "text/javascript";
                    scr.src = host + "/j/roundtrip.js";
                    ((document.getElementsByTagName('head') || [null])[0] ||
                        document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
                    if (oldonload) {
                        oldonload()
                    }
                };
            }());
        </script>
        <!-- Google Code -->
        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {

                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),

                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)

            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');



            ga('create', 'UA-55571446-8', 'auto');

            ga('require', 'displayfeatures');

            ga('set', 'dimension1', 'sf_jewelry');

            ga('set', 'dimension2', 'jewelry_store');

            ga('send', 'pageview');
        </script>

    </body>

    </html>