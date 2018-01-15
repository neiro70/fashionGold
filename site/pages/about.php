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
    $title="Quiénes Somos | Fashion Gold";
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
                    <section class="content">
                        <div id="breadcrumb" class="breadcrumb">
                            <div itemprop="breadcrumb" class="container">
                                <div class="row">
                                    <div class="col-md-24"><a href="<?php echo $context ?>" class="homepage-link" title="Back to the frontpage">Inicio</a> <span>/</span>
                                        <span class="page-title">Quiénes Somos</span></div>
                                </div>
                            </div>
                        </div>

                    


                        <div class="container">
                            <div class="row">
                                <div id="page-header">
                                    <p id="page-title" class='chopsFontTitle'>Quiénes Somos </p>
                                </div>

                                

                                <div id="col-main" class="col-md-24 normal-page clearfix">
                                    <div class="page about-us   ">
                                        <div class="col-md-24 ">
                                            <div class="home-slider-wrapper clearfix">
                                                <div class="camera_wrap" id="home-slider">
                                                    <div data-src="<?php echo $context ?>/site/img/collection/local4.jpeg"></div>
                                                    <div data-src="<?php echo $context ?>/site/img/collection/local6.jpeg"></div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6" >
                                            <img src="../img/collection/local2.jpeg"  />
                                        </div> 

                                        <div class="col-md-6">   
                                            <img src="../img/collection/local3.jpeg"  />
                                            
                                        </div>
                                        <br />
                                        <p>Somos una empresa compuesta por gente joven y emprendedora, con experiencia en el ramo joyero desde hace 10 años, dedicada a la venta de mayoreo y menudeo en joyería de oro laminado con baño de 14k. y 18k, rodio, acero inoxidable y cristal swarovski. Toda la joyería que manejamos es de excelente calidad y a precios inmejorables pues no tenemos intermediarios , trabajamos directamente con fabricantes.
                                        </p>
                                        <p>Saludos</p>
                                        <p><b> Fashion Gold</b></p>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

		<?php include "../../site/template/footer.php";?>

    </body>

</html>