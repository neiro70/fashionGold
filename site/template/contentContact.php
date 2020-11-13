<?php
    echo'
    <!--Start wrapper-->
    <div id="content-wrapper-parent">
        <div id="content-wrapper">
            <!-- Content -->
            <div id="content" class="clearfix">
                <section class="content">
                    <div id="breadcrumb" class="breadcrumb">
                        <div itemprop="breadcrumb" class="container">
                            <div style="line-height: 34px;">
                                <div class="col-md-24">
                                    <a href="'.$context.'" class="homepage-link" title="Inicio">Inicio</a>
                                    <span>/</span>
                                    <span class="page-title">Contactanos</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div id="collection-content">
                                <!-- Tags loading -->
                                <div id="tags-load" style="display: none;"><i class="fa fa-spinner fa-pulse fa-2x"></i></div>
                                <div id="page-header" class="col-sm-24"><p id="page-title" class="chopsFontTitle">Contactanos</p></div>
                                <div id="col-main" class="contact-page clearfix">
                                    <div class="group-contact clearfix">
                                        <div class="container">
                                            <div class="row">
                                                <div class="left-block col-md-12">
                                                    <form method="post" action="" id="emailForm" name="emailForm" class="contact-form" accept-charset="UTF-8">
                                                        <input type="hidden" value="contact" name="form_type" /><input type="hidden" name="utf8" value="" />
                                                        <ul id="contact-form" class="row list-unstyled">
                                                            <li class=""><h3>Tus sugerencias y comentarios</h3></li>
                                                            <li class=""><label class="control-label" for="name">Nombre</label> 
                                                                <input type="text" id="txtnombre" value="" class="form-control" name="txtnombre" />
                                                            </li>
                                                            <li class="clearfix"></li>
                                                            <li class="">
                                                                <label class="control-label" for="email">Email<span class="req">*</span></label>
                                                                <input type="email" id="txtemail" value="" class="form-control email" name="txtemail" />
                                                            </li>
                                                            <li class="clearfix"></li>
                                                            <li class="">
                                                                <label class="control-label" for="message">Mensaje <span class="req">*</span></label> 
                                                                <textarea name="textarea" class="jqte-test"></textarea>
                                                            </li>
                                                            <li class="clearfix"></li>
                                                            <li class="unpadding-top">
                                                                <button type="button" class="btn" id="sendEmail" name="sendEmail" style="background-color:#9d802e; color: #FFF;">Contactar</button>
                                                            </li>
                                                        </ul>
                                                    </form>
                                                </div>
                                                <div class="right-block contact-content col-md-12">
                                                    <h6 class="sb-title"><i class="fa fa-home"></i> Información del Sitio</h6>
                                                    <ul class="right-content">
                                                        <li class="title"><h6>Nos Ubicamos En</h6></li>
                                                        <li class="address">
                                                            <p>Calle Palma #2 Despacho 104 Edificio Burgos interior 4, Col. Centro, Ciudad de México</p>
                                                        </li>
                                                        <ul>
                                                            <li class="phone"><i class="fa fa-phone"></i> 55 12 32 97</li>
                                                            <li class="email"><i class="fa fa-envelope"></i>informesyventas@fashiongold.com.mx</li>
                                                        </ul>
                                                        <ul class="right-content">
                                                            <li class="title"><h6>Siguenos en:</h6></li>
                                                            <li class="facebook">
                                                                <a target="_blank" href="https://www.facebook.com/pg/fashionGold5/about/?ref=page_internal">
                                                                    <span class="fa-stack fa-lg btooltip" title="Facebook"> 
                                                                        <i class="fa fa-circle fa-stack-2x"></i> 
                                                                        <i class="fa fa-facebook fa-inverse fa-stack-1x"></i> 
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <!-- li class="twitter">
                                                                <a target="_blank" href="https://twitter.com/fashiongold2018/">
                                                                    <span class="fa-stack fa-lg btooltip" title="Twitter"> 
                                                                        <i class="fa fa-circle fa-stack-2x"></i> 
                                                                        <i class="fa fa-twitter fa-inverse fa-stack-1x"></i> 
                                                                    </span>
                                                                </a>
                                                            </!-->
                                                            <li class="instagram">
                                                                <a target="_blank" href="https://www.instagram.com/onlineshopfg/">
                                                                    <span class="fa-stack fa-lg btooltip" title="Instagram"> 
                                                                        <i class="fa fa-circle fa-stack-2x"></i> 
                                                                        <i class="fa fa-instagram fa-inverse fa-stack-1x"></i> 
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </ul>
                                                </div>
                                            </div>
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
    ';
?>