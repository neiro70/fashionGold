<?php

	session_start();
	include("../../../mvc/util/MysqlDAO.php");
	
	$contexto= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$var =explode("/",$contexto);
	if (strpos($contexto, "localhost") !== false) {
		$contexto="http://" .$var[0]."/".$var[1];
	}else{
		$contexto="http://" .$var[0];
	}
	
	
	if(!isset($_SESSION['username'])){
		header("location:/{$contexto}/site/admin/index.php");
	}
	
	$usuario=$_SESSION['username'];
	$idusuario=$_SESSION['idusuario'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fashion Gold Registro de producto</title>
     <link rel="icon" href="<?php echo $contexto ?>/rings.ico">

    <!-- Bootstrap Core CSS -->
    <link href="<?=$contexto?>/site/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Chosen -->
     <link href="<?=$contexto?>/site/admin/css/chosen.css" rel="stylesheet"> 
    <!-- Custom CSS -->
     <link href="<?=$contexto?>/site/admin/css/sb-admin.css" rel="stylesheet"> 
    <!-- Custom Fonts -->
    <link href="<?=$contexto?>/site/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="<?=$contexto?>/site/admin/css/jquery.fileupload.css" rel="stylesheet">
    <link href="<?=$contexto?>/site/admin/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?=$contexto?>/site/admin/css/toastr.css" rel="stylesheet" type="text/css"/>
    
    <link href="<?=$contexto?>/site/admin/css/bootstrap3-dialog/css/bootstrap-dialog.css" rel="stylesheet" type="text/css" />
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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
                            Registro de Producto
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Producto
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Registro
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                <form id="formProducto" name="formProducto" role="form">
                    <div class="col-lg-6">
                            <div class="form-group">
                                <label>Linea</label>
                                <input  type="hidden" class="form-control" id="idProducto" name="idProducto">
                                <select id="idLinea" name="idLinea">
                                	<option value="L0">L0</option>
                                	<option value="L1">L1</option>
                                	<option value="L2">L2</option>
									<option value="L2J">L2J</option>
                                	<option value="L3">L3</option>
									<option value="L3J">L3J</option>
                                	<option value="L4">L4</option>
                                	<option value="L5">L5</option>
                                	<option value="L6">L6</option>
                                	<option value="L7">L7</option>
                                	<option value="L8">L8</option>
                                	<option value="L9">L9</option>
                                	<option value="L10">L10</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>1) Codigo</label>
                                <input  type="text"  class="form-control" id="idCodigo" name="idCodigo" >
                                
                            </div>                            
                            
                            <div class="form-group">
                                <label>2) Titulo Producto</label>
                                <input class="form-control" id="txtTitulo" name="txtTitulo">
                                <p class="help-block">Ejemplo 'ANILLO DE ORO LAMINADO BA�O 18K'.</p>
                            </div>
                            <div class="form-group">
                                <label>3) Descripci�n del Producto</label>
                               <textarea class="form-control" rows="3" id="txtDescripcion" name="txtDescripcion"></textarea>
                                <p class="help-block">Ejemplo 'Este anillo apilable de absoluta tendencia combina una superficie con ba�o de oro rosa, cristal pavo y una piedra rectangular para a�adir un toque inmediato de glamour a cualquier look. Ideal para llevar a diario y f�cil de combinar y mezclar con otras piezas de cualquier colecci�n personal de accesorios, es perfecto como regalo'.</p>
                            </div>

                    </div>
                    <div class="col-lg-6">  
                            <div class="form-group">
                                <label>4) Tipo de joya</label>
						          <select id="idTipo" name="idTipo" data-placeholder="Selecciona..." class="chosen-select" tabindex="2">
									<option value="1">OTRO</option>
									<option value="2">GARGANTILLA</option>
									<option value="3">Pulsera</option>
									<option value="4">ANILLO</option>
									<option value="5">JUEGO</option>
									<option value="6">Arete</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>5) Ver en secci�n Destacado</label>
						          <select id="isDestacado" name="isDestacado" data-placeholder="Selecciona..." class="chosen-select">
									<option value="0">NO</option>
									<option value="1">SI</option>
                                </select>
                            </div>
                             <div class="form-group">    
                                <label>6) Ver en secci�n Nuevo</label>
						          <select id="isNuevo" name="isNuevo" data-placeholder="Selecciona..." class="chosen-select">
						          	<option value="1">SI</option>
									<option value="0">NO</option>
									
                                </select>                                
                            </div>
                            
                            <div class="form-group">
                                <label>7) Precio Comercial</label>
                            </div>

							<div class="form-group input-group">
                            	
                                <span class="input-group-addon">$</span>
                                <input type="text" class="form-control" id="txtPrecio" name="txtPrecio" placeholder="Precio Comercial">
                             
                            </div>
                            

                             <div class="form-group">
                                <label>8) Tiene Oferta</label>
                                <select id="idOferta" name="idOferta">
                                		<option value="0">NO</option>
                                		<option value="1">SI</option>
                                </select>
                                
                            </div>  
                            <div class="form-group">
                                <label>9) Precio Oferta</label>
                            </div>                        

                            <div class="form-group input-group">
                               
                                <span class="input-group-addon">$</span>
                                <input type="text" class="form-control" id="txtPrecioOld" name="txtPrecioOld" placeholder="Precio Oferta" value="0">
                                
                            </div>
                             <div class="form-group">
                             <label>10) Subir imagen</label>
                             </div>
                              <div class="form-group">
                            	<span class="btn btn-default fileinput-button">
							                    <i class="glyphicon glyphicon-plus"></i>
							                    <span>Agregar imagen</span>
							                    <input type="file" name="fileImagen"  id="fileImagen" >
							    </span>   
                            	
                            </div>                              
                            
                                                 
					</div>
                </form>
                </div>
                <!-- /.row -->
                <div class="row">
                           <div class="col-lg-12">
	                           <div class="form-group">
                        			<div class="panel panel-info">
                            			<div class="panel-heading">
			                                <h3 class="panel-title">Detalle del producto</h3>
			                            </div>
			                            <div class="panel-body table-responsive" >
			                           			<table id="example"  class="display" cellspacing="0" width="100%">
					        						<thead>
														<tr>

															<th>Nombre</th>	
															<th>Imagen</th>		
															<th>Eliminar</th>	
																		
														</tr>
														
														</thead>
					    							</table>
			                            </div>
                        			</div>
	                             </div>
                            </div>  
                			<div class="col-lg-12">
                                 <div class="form-group pull-right">
                                                <button type="button" class="btn btn-warning" style="cursor: pointer;" id="idBuscar" 
                                 				name="idBuscar" data-toggle='modal' data-target='#myModalFrame'><i class='fa fa-search'></i> Buscar</button>
                                 
                                                <button type="button" class="btn btn-info" style="cursor: pointer;" id="idPreview" 
                                 				name="idPreview" data-toggle='modal' data-target='#myModalFrame'><i class='fa fa-eye'></i> Preview</button>
                           		          		<button type="button" class="btn btn-primary" style="cursor: pointer;" 
                           		          		id="idGuardar" name="idGuardar"><i class='fa fa-floppy-o'></i> Guardar</button>
<!--                           		          		<button type="button" class="btn btn-success" style="cursor: pointer;" -->
<!--                           		          		id="idFinalizar" name="idFinalizar"><i class='fa fa-check'></i> Finalizar</button>-->
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
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
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
      <div class="modal-header" style="background-color: #428BCA; color:#FFF;  border-tfacop-left-radius: 5px; border-top-right-radius: 5px; ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
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
	<script src="<?=$contexto?>/site/admin/js/chosen.jquery.js"></script>

	<script type="text/javascript">

	$( document ).ready(function() {

		$("#idTipo").chosen({width: "100%"});
		$("#idOferta").chosen({width: "100%"});
		$("#isDestacado").chosen({width: "100%"});
		$("#isNuevo").chosen({width: "100%"});
		$("#idLinea").chosen({width: "100%"});

		

		toastr.options = {
				"debug" : false,
				"positionClass" : "toast-top-full-width",
				"onclick" : null,
				"fadeIn" : 300,
				"fadeOut" : 1000,
				"timeOut" : 5000,
				"extendedTimeOut" : 1000,
			};



		  BootstrapDialog.show({
	            title: 'Registro de nuevo producto',
	            message: '�Esta seguro que quiere registar un nuevo producto?',
	            buttons: [{
	                label: 'No',
	                cssClass:"btn-danger",
	                action: function(dialog) {
		                parent.location.href="viewBuscar.php";
	                	dialog.close();
	                }
	            }, {
	                label: 'Registrar',
	                cssClass:"btn-success",
	                action: function(dialog) {
	            		//genera documento y estructura de carpetas
	            		creaDocumento();
	            		dialog.close();
	                    
	                }
	            }]
	        });

	});
	//oprimir boton buscar
	$("#idBuscar").click(function(){
		parent.location.href="<?=$contexto?>/site/admin/mvc/view/producto/viewBuscar.php";
	});

	//oprimir boton preview
	$("#idPreview").click(function(){
		previewProducto();
	});
	
	//oprimir boton guardar
	$("#idGuardar").click(function(){

		$.ajaxSetup ({ cache: false });	
		var params= $("#formProducto").serialize();
		
		   $.ajax('<?=$contexto?>/site/admin/mvc/view/producto/controller/ctrlGuardar.php', {
			   	  data:params,
			  	  type: 'POST', 
			  	   beforeSend: function( xhr ) {
		  	       showloading();
			  	  },
			      success: function(data) {
			    	  toastr.success(data);
			    	  //limipiar();
			       	},
			      error: function(jqXHR, textStatus, errorThrown) {
			    	  toastr.error('ERRORS: ' + textStatus);
			      },
			      complete: function() {
			          hideloading();
			      }
			   });
		

	});

	//oprimir boton Finalizar
	$("#idFinalizar").click(function(){


		 BootstrapDialog.show({
	            title: 'Finalizar Producto',
	            message: '�Esta seguro que quiere finalizar el producto? <br> !Recuerde que al finalizarlo estar�a listo para visualizarlo en el sitio!',
	            buttons: [{
	                label: 'No',
	                cssClass:"btn-danger",
	                action: function(dialog) {
		                  	dialog.close();
	                }
	            }, {
	                label: 'Finalizar',
	                cssClass:"btn-success",
	                action: function(dialog) {

						//guadra el documento con estatus finalizado
	                	$.ajaxSetup ({ cache: false });	
	            		var params= $("#formProducto").serialize()+"&finalizar=3";
	            		   $.ajax('<?=$contexto?>/site/admin/mvc/view/producto/controller/ctrlGuardar.php', {
	            			   	  data:params,
	            			  	  type: 'POST', 
	            			  	   beforeSend: function( xhr ) {
	            		  	       showloading();
	            			  	  },
	            			      success: function(data) {
	            			    	  toastr.success(data);
	            			    	  parent.location.href="viewBuscar.php";
	            			    	  
	            			       	},
	            			      error: function(jqXHR, textStatus, errorThrown) {
	            			    	  toastr.error('ERRORS: ' + textStatus);
	            			      },
	            			      complete: function() {
	            			          hideloading();
	            			      }
	            			   });
	                	
	                    
	                }
	            }]
	        });

		
	
		

	});

	// Variable to store your files
	var files;

	// Add eventsfac
	$('input[type=file]').on('change', 
			function prepareUpload(event){
	  
	  		files = event.target.files;
	  		uploadFiles(event,this.id);
	 
	});


	// Catch the form submit 	//oprimir boton Finalizar
	$("#idFinalizar").click(function(){


		 BootstrapDialog.show({
	            title: 'Finalizar Producto',
	            message: '��sta seguro que quiere finalizar el producto? <br> !Recuerde que al finalizarlo estar�a listo para facturar y no podra editarlo!',
	            buttons: [{
	                label: 'No',
	                cssClass:"btn-danger",
	                action: function(dialog) {
		                  	dialog.close();
	                }
	            }, {
	                label: 'Finalizar',
	                cssClass:"btn-success",
	                action: function(dialog) {

						//guadra el documento con estatus finalizado
	                	$.ajaxSetup ({ cache: false });	
	            		var params= $("#formProducto").serialize()+"&finalizar=1";
	            		   $.ajax('<?=$contexto?>/site/admin/mvc/view/producto/controller/ctrlGuardar.php', {
	            			   	  data:params,
	            			  	  type: 'POST', 
	            			  	   beforeSend: function( xhr ) {
	            		  	       showloading();
	            			  	  },
	            			      success: function(data) {
	            			    	  toastr.success(data);
	            			    	  parent.location.href="viewBuscar.php";
	            			    	  
	            			       	},
	            			      error: function(jqXHR, textStatus, errorThrown) {
	            			    	  toastr.error('ERRORS: ' + textStatus);
	            			      },
	            			      complete: function() {
	            			          hideloading();
	            			      }
	            			   });
	                	
	                    
	                }
	            }]
	        });

		
	
		

	});

	// Variable to store your files
	var files;





function uploadFiles(event,idInputFile)
	{
	  event.stopPropagation(); // Stop stuff happening
	    event.preventDefault(); // Totally stop stuff happening

	    // START A LOADING SPINNER HERE

	    // Create a formdata object and add the files
	    var data = new FormData();
		data.append('idProducto',$("#idProducto").val());

		//data.append('idProducto',246);
	    $.each(files, function(key, value)
	    {
	        data.append(key, value);
	    });

		/*if(idInputFile == 'fileImagen'){	
			data.append('idTipoImg',1);
		}else{
			data.append('idTipoImg',2);
		}*/
	    
	    $.ajaxSetup ({ cache: false });	
	    $.ajax({
	        url: '<?=$contexto?>/site/admin/mvc/view/producto/controller/ctrlUpload.php?files',
	        type: 'POST',
	        data: data,
	        cache: false,
	        dataType: 'json',
	        processData: false, // Don't process the files
	        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
		  	 beforeSend: function( xhr ) {
		  	     //  showloading();
			  	  },
	        success: function(data, textStatus, jqXHR)
	        {
							        
	            if( typeof data.error === 'undefined')
	            {
	                // Success so call function to process the form
	               toastr.success("Exito al subir archivo!");
	             
	            	 
	            }else{
	            
	            	toastr.error('Error al subir el archivo!');
	            }
	            
	        },
	        error: function(jqXHR, textStatus, errorThrown)
	        {
	            // Handle errors here
	            toastr.error('ERRORS: ' + textStatus);
	            // STOP LOADING SPINNER
	        },
		      complete: function() {
		         // hideloading();
		    	  reloadTable();
		          
		      }
	    });
	}

	

	
function creaDocumento() {
		$.ajaxSetup ({ cache: false });
		//iniciar el registro
		$.ajax('<?=$contexto?>/site/admin/mvc/view/producto/controller/ctrlCrear.php', {
		  	  type: 'POST', 
		  	   beforeSend: function( xhr ) {
	  	       showloading();
		  	  },
		      success: function(data) {

		    	  if(data != '0' ){
			      		$("#idProducto").val( $.trim(data));
			      		$("#idproductotmp").val($.trim(data));
			      		 crearTablaArchivos($.trim(data));
			      }else{
			    	  toastr.error('ERROR al generar doc!');
				     }
		    	  
		       	},
		      error: function(jqXHR, textStatus, errorThrown) {
		    	  toastr.error('ERRORS: ' + textStatus);
		      },
		      complete: function() {
		          hideloading();
		      }
		   });

	}




function reloadTable(){
	//showloading();
	//$("#example").DataTable().ajax.reload();
	var url= "controller/ctrlTableFiles.php?idProducto="+$("#idProducto").val()+"&k="+Math.floor((Math.random() * 1000) + 1);
	$("#example").DataTable().ajax.url(url).load();
	//hideloading();
}

function crearTablaArchivos(idproducto){

	//$('#example').dataTable().destroy();
	$('#example').dataTable({
		"processing": true,
        "serverSide": false,
		"ajax": "controller/ctrlTableFiles.php?idProducto="+idproducto+"&k="+Math.floor((Math.random() * 1000) + 1),
		"info" : false,
		"bAutoWidth": false,
		"retrieve": true,
		"cache": false,
		"bFilter" : false,	
		"bLengthChange": false,
		"paging" : false,
		"iDisplayLength": 7,
		"oLanguage" : {
			"oPaginate" : {
				"sPrevious" : "<i class='fa fa-arrow-left'></i>",
				"sNext" : "<i class='fa fa-arrow-right'></i>"
			},
			"sLoadingRecords" : "Cargando datos...",
			"sSearch" : "Buscar",
			"sProcessing": "Procesando..." ,
			"sEmptyTable" : "No existen registros para mostrar"
		},		    		
		"aaSorting" : [[1, 'desc']],					
		"columns": [
		    {
           		"width": "5%",
                "visible": true,
                "searchable": false			                
           	},
		    {
           		"width": "5%",
                "visible": true,
                "className": 'dt-body-center',
                "searchable": false			                
           	},		      
           	 {
           		"width": "5%",
                "visible": true,
                "className": 'dt-body-center',
                "searchable": false			                
           	}
           	
       	]		           			       			        
    });

}

function eliminarFile(idimg){

var params="idimg="+idimg;
$.ajaxSetup ({ cache: false });
//iniciar el registro
$.ajax('<?=$contexto?>/site/admin/mvc/view/producto/controller/ctrlBorrarFile.php', {
  	  type: 'POST', 
  	  data:params,
  	   beforeSend: function( xhr ) {
	       showloading();
  	  },
      success: function(data) {

    	  if(data != '0' ){
    		  toastr.success("Exito al borrar archivo!");
    		  
	      }else{
	    	  toastr.error('ERROR al borrar archivo!');
		     }
    	  
       	},
      error: function(jqXHR, textStatus, errorThrown) {
    	  toastr.error('ERRORS: ' + textStatus);
      },
      complete: function() {
          hideloading();
          reloadTable();
      }
   });
	
}


function previewProducto(){
    var src = "viewProducto.php?idproducto="+$("#idProducto").val();
    var height = $(this).attr('data-height') || 250;
    var width = $(this).attr('data-width') || 400;
    
    $("#targetiframe").attr({'src':src,
                        'height': height,
                        'width': width});
	
}



	</script>

</body>

</html>
