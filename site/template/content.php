<?php
    $div = "";
    foreach($node as $posicion=>$registro){
        $div = $div."
            <li class='element no_full_width' data-alpha='{$registro['titulo']}' data-price='{$registro['precio']}'>
                <ul class='row-container list-unstyled clearfix'>
                    <li class='row-left'>
                        <a onClick='previewProducto({$registro['idProducto']})' data-target='#myModalFrame' data-toggle='modal' class='container_item'>
                            <img style='cursor: pointer;' src='".$context."/{$registro['imagen']}' class='img-responsive' alt='{$registro['titulo']}'/>";
                                if($registro['oferta'] == 1 ){	 
                                    $div =$div."
                                        <span class='sale_banner'><span class='sale_text'>Oferta</span></span>
                                    ";
                                }
                            $div =$div."
                        </a>
                    </li>
                    <li class='row-right parent-fly animMix'>
                        <div class='product-content-left'>
                            <a class='title-5' href='#' data-target='#myModalFrame'>{$registro['titulo']}</a>
                            <span class='shopify-product-reviews-badge' data-id='registro{$registro['idProducto']}'></span>
                        </div>
                        <div class='product-content-right'>		
                            <div class='product-price'>";
                                if($registro['oferta'] == 1 ){
                                    $div =$div."
                                        <span class='price_sale'><span class='money'>{$registro['precioAnterior']}</span></span>
                                        <del class='price_compare'><span class='money'>{$registro['precio']}</span></del>";
                                }else{
                                    $div =$div." 			
                                        <span class='price'> 
                                        <span class='money'>{$registro['precio']}</span></span> 
                                        <span class='price' style='color:#b18939'>
                                        <span class='money'>{$registro['precioMayoreo']}</span></span>";
                                        
                                }
                                $div = $div."
                            </div>
                        </div>
                        <div class='list-mode-description'>  {$registro['descripcion']} </div>
                    </li>
                </ul>
            </li>
        ";
    }

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
                                        <a href="'.$context.'" class="homepage-link" title="Back to the frontpage">Inicio</a>
                                        <span>/</span>
                                        <span class="page-title">'.$title.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div id="collection-content">
                                    <!-- Tags loading -->
                                    <div id="tags-load" style="display: none;"><i class="fa fa-spinner fa-pulse fa-2x"></i></div>
                                    <div id="page-header" class="col-sm-24"><p id="page-title" class="chopsFontTitle">'.$title.'</p></div>
                                    <div class="collection-warper col-sm-24 clearfix">
                                        <div class="collection-panner" align="center">
                                            <img src="'.$context.'/site/img/collection/'.$image.'" class="img-responsive" alt=""/>
                                        </div>
                                    </div>
                                    <div class="collection-main-content">
                                        <div id="col-main" class="collection collection-page col-xs-24 col-sm-24">
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
                                                <ul id="sandBox" class="list-unstyled">'
                                                    .$div.'
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
    ';
?>