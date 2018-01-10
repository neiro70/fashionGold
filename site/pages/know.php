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
    $title="¿Sabias que?| Fashion Gold";
?>
    <!doctype html>
    <html lang="en" class="no-js">
    
    <?php include "../../site/template/head.php";?>

    <body itemscope itemtype="http://schema.org/WebPage" class="templateCollection">

        <?php include "../../site/template/header.php";?>

        <div id="content-wrapper-parent">
            <div id="content-wrapper">
                <!-- Content -->
                <div id="content" class="clearfix">

                    <div id="breadcrumb" class="breadcrumb">
                        <div itemprop="breadcrumb" class="container">
                            <div class="row">
                                <div class="col-md-24"><a href="<?php echo $context ?>" class="homepage-link" title="Back to the frontpage">Inicio</a> <span>/</span>
                                    <span class="page-title">¿Sabias que?</span></div>
                            </div>
                        </div>
                    </div>

                    <section class="content">


                        <div class="container">
                            <div class="row">
                                <div id="page-header">
                                    <p id="page-title" class='chopsFontTitle'>¿Sabias que?</p>
                                </div>

                                <div id="col-main" class="col-md-24 normal-page clearfix">
                                    <div class="page about-us"  id="link1">
                                        <div class="col-md-6" ><img src="../img/collection/image-not-found.png"/></div>
                                        <p><b> Significado de Pulsera en el tobillo.</b></p>
                                        <div style="text-align: justify;">
                                                No todas las mujeres utilizan pulseras tobilleras, lo cierto es que a simple vista representan sensualidad, ya que realza y le da un toque diferente al pie; son utilizadas sobre todo en &eacute;poca de verano, aunque hay quienes las usan permanentemente, pero &iquest;qu&eacute; significado tienen?<br /><br />En la India este accesorio es importante para la mujer y tienen que llevarlas durante el matrimonio; mientras que las viudas no pueden lucirlas.<br /><br />En el antiguo Egipto, se cre&iacute;a que llevar una cadena alrededor del tobillo atra&iacute;a la buena suerte y la fortuna;&nbsp; algunas personas que trabajaban en el campo, sol&iacute;an llevar tobilleras con colgante sonoro para alejar los insectos y evitar picaduras.<br /><br />En la cultura sumeria, las mujeres utilizaban estas joyas de plata u oro, como significado de la riqueza del marido.<br /><br />Como ver&aacute;n, en este aspecto hay historia que contar, pero lo importante es que a medida que han pasado los a&ntilde;os, este significado ha ido cambiando, ya que en la actualidad, tener una pulsera tobillera o esclava (como tambi&eacute;n se le dice), identifica a las mujeres como sexys y les da elegancia a esa parte del cuerpo.<br /><br />&iexcl;Atr&eacute;vete a lucir una!<br /><br />Ac&eacute;rcate a Fashion Gold d&oacute;nde encontrar&aacute;s incre&iacute;bles modelos.
                                        </div>                                        
                                    </div>
                                </div>

                                <div id="col-main" class="col-md-24 normal-page clearfix">
                                    <div class="page about-us" id="link2">
                                        <div class="col-md-18">
                                            <p><b> Origen Pulseras y collares.</b></p>
                                            <div style="text-align: justify;">
                                                &iquest;Sab&iacute;as que el origen de las&nbsp;pulseras&nbsp;y&nbsp;collares&nbsp;se remonta miles de a&ntilde;os atr&aacute;s? <br />Aunque no lo parezca, el uso de estos complementos es algo tan ancestral y profundo que ha quedado en nuestra cultura y que al d&iacute;a de hoy nos define por completo.<br /><br />Su origen siempre ha estado ligado a las antiguas civilizaciones del Neol&iacute;tico, de La Edad de Bronce o incluso del Antiguo Egipto.<br /><br />Con el paso del tiempo estos complementos han ido evolucionando en materiales y formas, llegando a convertirse en una manera de expresi&oacute;n y de identidad para cada uno de nosotr@s.<br /><br />Al parecer, su uso siempre sol&iacute;a ir orientado al misticismo, la religi&oacute;n o al poder social y econ&oacute;mico.<br /><br />Siempre han representado un sello de identidad para las personas que los pose&iacute;an y un objeto deseado por la mayor&iacute;a de clases sociales inferiores. Actualmente se han vuelto m&aacute;s comunes, s&iacute;, pero eso no quita que para nosotros dejen de ser aquello que nos identifica, que nos diferencia de los dem&aacute;s y que nos complementa en nuestro d&iacute;a a d&iacute;a.<br /><br />Fashion Gold tiene para ti y para tus clientes un amplio cat&aacute;logo<br /><br />Te invitamos a que visites nuestra sucursal, donde encontrar&aacute;s diferentes propuestas y estilos<br /><br />Ac&eacute;rcate a Fashion Gold.
                                            </div>
                                        </div>     
                                        <div class="col-md-6"><img src="../img/collection/image-not-found.png"/></div> 
                                    </div>
                                </div>

                                <div id="col-main" class="col-md-24 normal-page clearfix">
                                    <div class="page about-us" id="link3">
                                        <div class="col-md-6"><img src="../img/collection/image-not-found.png"/></div>
                                        <p><b> Porqué se usan aretes?</b></p>
                                        <div style="text-align: justify;">
                                            En las culturas occidentales el uso de aretes ha sido siglos patrimonio de las damas.<br /><br />Los aretes se refieren a las joyas que atraviesan el l&oacute;bulo de la oreja.<br /><br />En algunos pa&iacute;ses se llaman aros o pendientes, pero un arete puede que no tenga pendiente, ya que un pendiente es algo que cuelga y tambi&eacute;n puede referirse a una joya que cuelga de una cadena en el cuello.<br /><br />Los aretes, tambi&eacute;n, pueden darte suerte para la prosperidad.<br /><br />Esta costumbre o moda no es nueva. La moda de hoy en d&iacute;a es que, todos usen aretes y pendientes de todas las formas, tama&ntilde;os y colores y precios.<br /><br />En algunas culturas muy antiguas, como las de edad de bronce se han encontrado restos que indican que esos pobladores usaban los pendientes en la nariz, se perforaban el cart&iacute;lago central.<br /><br />Tambi&eacute;n los usaban los asirios tal como se podido apreciar cuando se encontraron sus pinturas y figuras representativas.<br /><br />En la cultura egipcia al realizar investigaciones y estudios en las tumbas de las princesas de las dinast&iacute;as XII YXIII y de faraones de la XX dinast&iacute;as, se han encontrado bellos adornos. De igual manera los usaban los fenicios, hebreos y varios pueblos orientales.<br /><br />Las griegas, tambi&eacute;n usaban pendientes y aretes de belleza y valor muy singular pues los hac&iacute;an de oro con colgantes de perlas y gemas.<br /><br />En la cultura Inca en Sudam&eacute;rica, estos utilizaban, enormes artes confeccionados en oro, plata o cobre y les hac&iacute;an incrustaciones con piedras preciosas, prueba de esto es que se han encontrado restos arqueol&oacute;gicos humanos que demuestran que estas personas llevaban inmensos aretes llamados orejeras.<br /><br />En estas culturas el personaje con mayor nivel y categor&iacute;a usaba el arete m&aacute;s grande.<br /><br />Por otro lado, en el &Aacute;frica casi todas las personas hombres y mujeres de diversas tribus usaban inmensos aretes fabricados manualmente con cer&aacute;mica, huesos, semillas y madera tallada.<br /><br />Algunas culturas utilizan los pendientes como amuleto protector, para impedir que los malos esp&iacute;ritus se introduzcan en el cuerpo a trav&eacute;s de los o&iacute;dos.<br /><br />En la &eacute;poca de los piratas y corsarios acostumbraban a llevar aretes pendientes, no como moda sino como signo de valent&iacute;a y virilidad, cada arete significaba una haza&ntilde;a realizada.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

		<?php include "../../site/template/footer.php";?>

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