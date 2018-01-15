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
<html lang="en" class="no-js">

    <?php include "../../site/template/head.php";?>

    <body itemscope itemtype="http://schema.org/WebPage" class="templatePage">

        <?php include "../../site/template/header.php";?>
        <?php include "../../site/template/contentContact.php";?>
        <?php include "../../site/template/footer.php";?>

        <script>
            $(document).ready(function (e) {
                //textArea
                $('.jqte-test').jqte();
                // settings of status
                var jqteStatus = true;
                $(".status").click(function () {
                    jqteStatus = jqteStatus ? false : true;
                    $('.jqte-test').jqte({ "status": jqteStatus })
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

            $("#sendEmail").click(function () {
                $.ajax({
                    url: 'email.php',
                    type: "POST",
                    data: $("#emailForm").serialize()
                }).done(function (data) {
                    toastr.success('¡Exito se envio correo!');
                }).fail(function (data) {
                    toastr.error('¡Error al enviar correo!');
                }).always(function (data) {
                    // alert( "complete" );
                });
            });
        </script>

    </body>

</html>