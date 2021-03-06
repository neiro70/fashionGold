<?php

	$contexto= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $var =explode("/",$contexto);
   
	if (strpos($contexto, "localhost") !== false) {
        $contexto="http://" .$var[0]."/".$var[1];
        
	}else{
        $contexto="http://" .$var[0];
	}


	header('Content-Type: text/html; charset=UTF-8');
	include("../../../mvc/util/MysqlDAO.php");
	
	//$usuario=$_SESSION['username'];
	//$idusuario=$_SESSION['idusuario'];
	$idProducto=trim($_GET["idproducto"]);
	$isEditar=isset($_GET['isEditar'])? trim($_GET['isEditar']): '0';

	
	$db = new MySQL (); 
	
	$sql="SELECT t01.idProducto,t01.idLinea, t01.txtCodigo,t01.txtTitulo,t01.dPrecioComercial,t01.dPrecioMayoreo,t01.dPrecioOferta,t01.txtDescripcion,t02.txtdescripcion AS tipo,t01.idStatus,t01.isOferta
		FROM t01producto t01,c01tipo t02 
		WHERE t02.idTipo=t01.idTipo AND t01.idProducto = {$idProducto} ";
	
	$conn=$db->getConexion();
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {

            $txtTitulo=mb_convert_encoding($row["txtTitulo"],'UTF-8','ISO-8859-1');
            $txtDescripcion=mb_convert_encoding($row["txtDescripcion"],'UTF-8','ISO-8859-1');
			$txtTipo=$row["tipo"];
			$isOferta=$row["isOferta"];
            $dPrecioComercial=$row["dPrecioComercial"];
            $dPrecioMayoreo=$row["dPrecioMayoreo"];
			$dPrecioOferta=$row["dPrecioOferta"];
			$txtCodigo=$row["txtCodigo"];
			$idLinea=$row["idLinea"];
	
		}
	
	}
	$db->closeSession();
	
	
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta http-equiv="Pragma" content="no-cache">
        <meta name="author" content="">

        <title>Fashion Gold Detalle de producto</title>
        <link rel="icon" href="<?php echo $contexto ?>/rings.ico">
        <!-- Bootstrap Core CSS -->
        <link href="<?=$contexto?>/site/admin/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?=$contexto?>/site/admin/css/sb-admin.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?=$contexto?>/site/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="<?=$contexto?>/site/admin/css/jquery.fileupload.css" rel="stylesheet">
        <link href="<?=$contexto?>/site/admin/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="<?=$contexto?>/site/admin/css/toastr.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script sr	$contexto="http://" .$var[0]."/".$var[1]."/";	
	c="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


        <style type="text/css">
            .portfolio-item {
                margin-bottom: 25px;
            }

            footer {
                margin: 50px 0;
            }
        </style>

    </head>

    <body>

        <div id="page-wrapper" style="margin-top: -100px;">
            <div class="container-fluid">
                <!-- Portfolio Item Row -->
                <div class="row" align='center'>
                    <div class="col-md-3">
                        <div id="divThumbnails" style="width:70%;">
                            <!-- div para cargar dinamicamente -->
                        </div>
                    </div>
                </div>
                <div class="row"  >    
                    <div class="col-md-3"  style="font-size:small;">
                        <ul>
                            <li><b>Linea:</b>
                                <?php echo $idLinea;?> </li>
                            <li><b>C&oacute;digo:</b>
                                <?php echo $txtCodigo;?> </li>
                            <li><b>Descripci&oacute;n:</b>
                                <?php echo $txtDescripcion;?> </li>
                            <li><b>Precio Menudeo:</b>
                                <?php  setlocale(LC_MONETARY, 'es_MX');  echo money_format('%n',$dPrecioComercial);?> MXN </li>
                            <li><b>Precio Mayoreo:</b>
                                <?php  setlocale(LC_MONETARY, 'es_MX');  echo money_format('%n',$dPrecioMayoreo);?> MXN </li>
                        </ul>

                    </div>
                </div>


            </div>
            <!-- /.row -->


        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


        <!-- /#wrapper -->
        <div id="clock-loader" style="display: none;">
            <div style="font-weight: bold; color: white; font-size: 12pt;">
                <img src="<?=$contexto?>/site/admin/img/ajax-loader.gif" alt="" border="0" /><br>Procesando...
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?=$contexto?>/site/admin/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?=$contexto?>/site/admin/js/bootstrap.min.js"></script>
        <script src="<?=$contexto?>/site/admin/js/toastr.min.js"></script>
        <script src="<?=$contexto?>/site/admin/js/jquery.blockUI.js"></script>
        <script src="<?=$contexto?>/site/admin/js/ajaxUtil.js"></script>
        <script src="<?=$contexto?>/site/admin/js/jquery.dataTables.min.js"></script>
        <script src="<?=$contexto?>/site/admin/js/dataTables.buttons.min.js"></script>
        <script src="<?=$contexto?>/site/admin/js/dataTables.tableTools.js"></script>
	    <script src="<?=$contexto?>/site/admin/js/jquery.elevatezoom.js" type="text/javascript"></script>	


        <script type="text/javascript">
            $(document).ready(function() {

                
                getThumbnails();

            });

            function getThumbnails() {

                var params = "idproducto=" + <?php echo $idProducto;?>;


                $.ajaxSetup({
                    cache: false
                });
                //iniciar el registro
                $.ajax('<?=$contexto?>/site/admin/mvc/view/producto/controller/ctrlGetThumbnails.php', {
                    type: 'GET',
                    data: params,
                    beforeSend: function(xhr) {
                        showloading();
                    },
                    success: function(data) {

                        var idimg = 0;

                        $.each(data, function(key, val) {
                            var div = "<div class='col-md-3'> " + val.thumbnail;
                            "</div>";
                            $("#divThumbnails").append(div);
                            idimg = val.idimg;
                          

                        });

                       // $("#zoom_01").attr("src", "small/controller/ctrlGetFile.php?idimg=" + idimg);
                        $("#zoom_01").attr("data-zoom-image", "controller/ctrlGetFile.php?idimg=" + idimg);
                       // $("#zoom_01").elevateZoom();
                      // $("#zoom_01").elevateZoom({constrainType:"height", constrainSize:274, zoomType: "lens", containLensZoom: true, gallery:'gallery_01', cursor: 'pointer', galleryActiveClass: "active"}); 

                       $("#zoom_01").elevateZoom({
                        zoomType : "lens",
                        lensShape : "round",
                        lensSize    : 200
                      });

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error('ERRORS: ' + textStatus);
                    },
                    complete: function() {
                        hideloading();

                    }
                });

            }

        </script>

    </body>

    </html>