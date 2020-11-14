<?php
    echo'
    <div id="content-wrapper-parent">
        <div id="content-wrapper">
            <!-- Content -->
            <div id="content" class="clearfix">
                <section class="content">
                    <div id="breadcrumb" class="breadcrumb">
                        <div itemprop="breadcrumb" class="container">
                            <div style="line-height: 34px;">
                                <div class="col-md-24">
                                    <a href="'.$context.'" class="homepage-link" title="Back to the frontpage">Inicio</a> <span>/</span>
                                    <span class="page-title">Empieza tu propio negocio</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div id="page-header">
                                <p id="page-title" class="chopsFontTitle">Empieza tu propio negocio </p>
                            </div>
                            <div id="col-main" class="col-md-24 normal-page clearfix">
                                <div class="page about-us">
                                    <p align="center">
                                        <img src="'.$context.'/site/img/collection/laminado/banners_oro.jpg" />
                                    </p>
                                    <br/>
                                    <ul>
                                        <li><i class="fa fa-check"></i>Si deseas emprender tu propio negocio somos la mejor opción pues manejamos diferentes rangos de descuento dependiendo tu monto de inversión, entendiendo que entre mas inviertas mayor será el descuento. </li>
                                        <li><i class="fa fa-check"></i>Consulta los descuentos para mayoristas en la sección de DESCUENTOS en el inicio de esta página</li>
                                        <li><i class="fa fa-check"></i>Aceptamos devoluciones en un 30% de tu próxima compra, (TIENES UN MES) para hacer cambios o devoluciones  a partir de tu fecha de compra</li>
                                        <li><i class="fa fa-check"></i>Contamos con más de 500 modelos diferentes entre aretes, arracadas, broqueles, gargantillas, pulseras, brazaletes, juego</li>
                                        <li><i class="fa fa-check"></i>Modelos nuevos e innovadores cada 20 días</li>
                                        <li><i class="fa fa-check"></i>Enviamos a toda la Republica</li>
                                    </ul>
                                    <div class="col-md-12">
                                        <form method="post" action="" id="emailForm" name="emailForm" class="contact-form" accept-charset="UTF-8"><input type="hidden" value="contact" name="form_type" /><input type="hidden" name="utf8" value="" />
                                            <ul id="contact-form" class="row list-unstyled">
                                                <li class="">
                                                    <h3>Contactanos</h3>
                                                </li>
                                                <li class=""><label class="control-label" for="name">Nombre</label> <input type="text" id="txtnombre" value="" class="form-control" name="txtnombre" /></li>
                                                <li class="clearfix"></li>
                                                <li class=""><label class="control-label" for="email">Email <span class="req">*</span></label> <input type="email" id="txtemail" value="" class="form-control email" name="txtemail" /></li>
                                                <li class="clearfix"></li>
                                                <li class=""><label class="control-label" for="message">Mensaje <span class="req">*</span></label> <textarea id="txtmensaje" rows="5" class="jqte-test" name="txtmensaje"></textarea></li>
                                                <li class="clearfix"></li>
                                                <li class="unpadding-top">
                                                    <button type="button" class="btn" id="sendEmail" name="sendEmail" style="background-color:#9d802e; color: #FFF;">Contactar</button>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    ';
?>