<?php

    $menu = '';
    foreach($nodeCatalogo as $posicion => $registro){
        $li = "<li class='list-unstyled li-sub-mega'><a href='{$context}{$registro['url']}'>{$registro['descripcion']} </a></li>";
        $menu = $menu.$li;
    }

    echo'
        <!-- Header -->	
        <header id="top" class="fadeInDown clearfix">
                    
            <div class="line"></div>
                
            <!-- Navigation -->
            <div class="container">
                <div class="top-navigation">

                    <ul class="list-inline">
                        <li class="top-logo">
                            <a id="site-title" href="'.$context.'" title="Fashion Gold">
                                <img class="img-responsive" src="'.$context.'/site/img/collection/logo.png"alt="Fashion Gold" /> 
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
                                                <a href="'.$context.'">
                                                    <span>Inicio</span>
                                                </a>
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
                                                                '.$menu.'
                                                        </ul>
                                                    </li>

                                                    <li>

                                                        <ul>
                                                            <li class="list-title">Destacados</li>
                                                            '.$menu.'
                                                    </li>
                                                </ul>
                                            </div>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a href="#" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
                                                    <span>¿Sabias que?</span>
                                                    <i class="fa fa-caret-down"></i>
                                                    <i class="sub-dropdown1  visible-sm visible-md visible-lg"></i> 
                                                    <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li class=""><a tabindex="-1" href="'.$context.'/site/pages/know.php#link1"> <i class="fa fa-comments-o"></i> Significado de Pulsera en el tobillo.</a></li>
                                                    <li class=""><a tabindex="-1" href="'.$context.'/site/pages/know.php#link2"> <i class="fa fa-comments-o"></i> Origen Pulseras y collares.</a></li>
                                                    <li class=""><a tabindex="-1" href="'.$context.'/site/pages/know.php#link3"> <i class="fa fa-comments-o"></i> ¿Porqué se usan aretes?</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a href="'.$context.'/site/pages/contact.php"> <span>Contactanos</span>
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

            <!--Desplega el menu en toda la pantalla-->
			<script>
				function addaffix(scr) {
					if ($(window).innerWidth() >= 1024) {
						if (scr > $("#top").innerHeight()) {
							if (!$("#top").hasClass("affix")) {
								$("#top").addClass("affix").addClass("animated");
							}
						} else {
							if ($("#top").hasClass("affix")) {
								$("#top").prev().remove();
								$("#top").removeClass("affix").removeClass("animated");
							}
						}
					} else $("#top").removeClass("affix");
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
    ';
?>