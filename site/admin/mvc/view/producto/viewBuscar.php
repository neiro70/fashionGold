<?php
	session_start();
	$contexto= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$var =explode("/",$contexto);
	if (strpos($contexto, "localhost") !== false) {
		$contexto="http://" .$var[0]."/".$var[1];
	}else{
		$contexto="http://" .$var[0];
	}
	if(!isset($_SESSION['username'])){
		header("location:{$contexto}/site/admin/index.php");
	}
	$usuario=$_SESSION['username'];
	$idusuario=$_SESSION['idusuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

		<link href="<?=$contexto?>/site/admin/css/bootstrap3-dialog/css/bootstrap-dialog.css" rel="stylesheet" type="text/css" />


    <title>Fashion Gold Buscar producto</title>
    <link rel="icon" href="<?php echo $contexto ?>/rings.ico">

    <!-- Bootstrap Core CSS -->
    <link href="<?=$contexto?>/site/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
     <link href="<?=$contexto?>/site/admin/css/sb-admin.css" rel="stylesheet"> 
    <!-- Custom Fonts -->
    <link href="<?=$contexto?>/site/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
        <!-- Chosen -->
    <link href="<?=$contexto?>/site/admin/css/chosen.css" rel="stylesheet"> 
     
    <link href="<?=$contexto?>/site/admin/css/jquery.fileupload.css" rel="stylesheet">
    <link href="<?=$contexto?>/site/admin/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?=$contexto?>/site/admin/css/toastr.css" rel="stylesheet" type="text/css"/>
    <link href="<?=$contexto?>/site/admin/js/datepicker/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css"/>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/liibs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <img alt="fashion Gold" src="<?=$contexto?>/site/img/collection/logo.png" width="125px"  style="padding-top: 10px;">
                     
                
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $usuario; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?=$contexto?>/site/admin/logout.php"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#producto"><i class="fa fa-fw fa-book"></i> Producto <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="producto" class="collapse">
                            <li>
                                <a href="<?=$contexto?>/site/admin/mvc/view/producto/viewNuevo.php" ><i class="fa fa-fw fa-edit"></i> Registro</a>
                            </li>
                            <li>
                                <a href="<?=$contexto?>/site/admin/mvc/view/producto/viewBuscar.php"><i class="fa fa-fw fa-search"></i> Buscar</a>
                            </li>
                            <li>
                                <a href="<?=$contexto?>/site/admin/mvc/view/producto/viewBuscar.php"><i class="fa fa-fw fa-newspaper-o"></i> Noticias</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    
                        <h1 class="page-header">
                            Búsqueda de Producto
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Producto
                            </li>
                            <li class="active">
                                <i class="fa fa-search"></i> Buscar
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                           <div class="form-group">
                                <label>Tipo</label>
								<select id="idTipo" name="idTipo">
								   <option value="0">TODOS</option>
									<option value="1">OTRO</option>
									<option value="2">COLLAR</option>
									<option value="3">PULSERA</option>
									<option value="4">ANILLO</option>
									<option value="5">JUEGO</option>
									<option value="6">ARETE</option>
								</select>
                           		<button type="button" class="btn btn-success" 
	                           		style="cursor: pointer;" id="idBuscar" name="idBuscar">
	                           		<i class="fa fa-search" aria-hidden="true"></i>	                           		 
	                           		Buscar</button>
	                          </div>                            
                     </div>
                  </div>                  
                  
                  

                 </div>  
                 <div class="row">    
                  <div class="col-lg-12">
	                           <div class="form-group">
                        			<div class="panel panel-info">
                            			<div class="panel-heading">
			                                <h3 class="panel-title">Lista de Productos</h3>
			                            </div>
			                            <div class="panel-body table-responsive" >
			                           			<table id="example"  class="display" cellspacing="0" width="100%">
					        						<thead>
														<tr>
															<th>#</th>
															<th>TITULO</th>
															<th>CODIGO</th>
															<th>DESCRIPCIÓN</th>															
															<th>ESTATUS</th>
															<th>P.COMERCIAL</th>
															<th>P.OFERTA</th>
															<th>T.OFERTA</th>
															<th>TIPO</th>
															<th>ACCIÓN</th>						
														</tr>
														
														</thead>
					    							</table>
			                            </div>
                        			</div>
	                             </div>
                            </div>  
            
                  </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <div id="clock-loader" style="display: none;">				
		<div style="font-weight: bold; color: white; font-size: 12pt;">
			<img src="<?=$contexto?>/site/admin/img/ajax-loader.gif" alt="" border="0" /><br>Procesando...
		</div>	
	</div>	
    
    <!-- Modal -->
<div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


   
    <!-- Modal -->
<div class="modal fade" id="myModalFrame">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #428BCA; color:#FFF;  border-top-left-radius: 5px; border-top-right-radius: 5px; ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Vista del Producto</h4>
      </div>
      <div class="modal-body">
        <iframe src="" frameborder="0" id="targetiframe" style=" height:500px; width:100%;" name="targetframe" allowtransparency="true"></iframe> <!-- target iframe -->
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

      

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
	
	<script src="<?=$contexto?>/site/admin/css/bootstrap3-dialog/js/bootstrap-dialog.js"></script>
	<script src="<?=$contexto?>/site/admin/js/dataTables.tableTools.js"></script>
	<script src="<?=$contexto?>/site/admin/js/datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?=$contexto?>/site/admin/js/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
	<script src="<?=$contexto?>/site/admin/js/chosen.jquery.js"></script>
	
    <script type="text/javascript">
    $( document ).ready(function() {

    	$("#idTipo").chosen();
    	
		toastr.options = {
				"debug" : false,
				"positionClass" : "toast-top-full-width",
				"onclick" : null,
				"fadeIn" : 300,
				"fadeOut" : 1000,
				"timeOut" : 5000,
				"extendedTimeOut" : 1000,
			};


		$("#idBuscar").click(function(){
			buscar();});

		crearTablaBusqueda();
		
		$("#idBuscar").click();

	});

    function crearTablaBusqueda(){

    	
    	t=$('#example').dataTable({
    		"processing": true,    		
            "serverSide": false,
    		"ajax": "controller/ctrlBuscar.php?",    		
    		"bAutoWidth": false,
    		"bFilter" : true,	
    		"bLengthChange": true,
    		"paging" : true,
    		"iDisplayLength": 10,
    		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
    		"oLanguage" : {
    			"oPaginate" : {
    				"sPrevious" : "<i class='fa fa-arrow-left'></i>",
    				"sNext" : "<i class='fa fa-arrow-right'></i>"
    			},
    			"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    			"sLoadingRecords" : "Cargando datos...",
    			"sSearch" : "Buscar",
    			"sProcessing": "Procesando..." ,
    			"sEmptyTable" : "No existen registros para mostrar",
    			"sLengthMenu": "Mostrar _MENU_ registros"
    		},		    		
    		"aaSorting" : [[1, 'desc']],					
    		"columns": [    		    
       			{
    				
                    "visible": true,
                    "searchable": true			                
               	},
       			{
    				
                    "visible": true,
                    "searchable": true			                
               	},
       			{
    				
                    "visible": true,
                    "searchable": true			                
               	},
       			{
    				
                    "visible": true,
                    "searchable": true			                
               	},
       			{
    				
                    "visible": true,
                    "searchable": true			                
               	},
       			{
    				
                    "visible": true,
                    "searchable": true			                
               	},
       			{
    				
                    "visible": true,
                    "searchable": true			                
               	},
       			{
    				
                    "visible": true,
                    "searchable": true			                
               	},
       			{
    				
                    "visible": true,
                    "searchable": true			                
               	},
       			{
    				
                    "visible": true,
                    "searchable": true,
                    "width":'100px'			                
               	}

               	
           	]		           			       			        
        });



    }

    function editarProducto(idproducto){
    	parent.location.href="viewEditar.php?idproducto="+idproducto;
    }

    function eliminarProducto(idproducto){
        BootstrapDialog.show({
            title: 'Eliminar producto',
            message: '¿Esta seguro que quiere eliminar el producto?',
            buttons: [{
                label: 'Cancelar',
                cssClass:"btn-danger",
                action: function(dialog) {
                	dialog.close();
                }
            }, {
                label: 'OK',
                cssClass:"btn-success",
                action: function(dialog) {

                	var params="idproducto="+idproducto;
                	$.ajaxSetup ({ cache: false });
                	//ajax para eliminar producto
                	$.ajax('<?=$contexto?>/site/admin/mvc/view/producto/controller/ctrlBorrarProducto.php', {
                	  	  type: 'POST', 
                	  	  data:params,
                	  	   beforeSend: function( xhr ) {
                		       showloading();
                	  	  },
                	      success: function(data) {
								//alert(data);
                	    	
                	    	  if(data == 1 ){
                	    		  toastr.success("Exito al borrar producto!");
                	    		  reloadTable();
                	    		  
                		      }else{
                		    	  toastr.error('ERROR al borrar producto!');
                			     }
                	    	  
                	       	},
                	      error: function(jqXHR, textStatus, errorThrown) {
                	    	  toastr.error('ERRORS: ' + textStatus);
                	      },
                	      complete: function() {
                	          hideloading();                	          
                	          dialog.close();
                	      }
                	   });
                    
                }
            }]
        });
    } 


    function reloadTable(){
    	var params=	$('#idTipo').serialize(); 
    	showloading();
     	$("#example").DataTable().ajax.url( "controller/ctrlBuscar.php?"+params ).load();
     	hideloading();

    }

    function buscar(){
    	reloadTable();

    }


    function previewProducto(idproducto){

    	
    	    var src = "viewProducto.php?idproducto="+idproducto;
    	    var height = $(this).attr('data-height') || 250;
    	    var width = $(this).attr('data-width') || 400;
    	    
    	    $("#targetiframe").attr({'src':src,
    	                        'height': height,
    	                        'width': width});
    

    	
    }

    
    </script>

</body>

</html>
