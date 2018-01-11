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
    $title="Contactanos | Fashion Gold";
?>

    <!doctype html>
    <!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
    <!--[if (gt IE 9)|!(IE)]><!-->
    <html lang="en" class="no-js">
    <!--<![endif]-->

    <?php include "../../site/template/head.php";?>

    <body itemscope itemtype="http://schema.org/WebPage" class="templatePage">

        <?php include "../../site/template/header.php";?>

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
                                                    <li class="">
                                                        <label class="control-label" for="message">Mensaje <span class="req">*</span></label> 
                                                        <textarea id="txtmensaje"  class="jqte-test"    name="txtmensaje"></textarea></li>
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

                <?php include "../../site/template/footer.php";?>


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

                        //textArea
                        $('.jqte-test').jqte();
                        // settings of status
                       var jqteStatus = true;
                        $(".status").click(function()
                        {
                            jqteStatus = jqteStatus ? false : true;
                            $('.jqte-test').jqte({"status" : jqteStatus})
                        });


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