<?php
	$txtnombre=$_POST['txtnombre'];
	$txtemail=$_POST['txtemail'];
	$txtmensaje=$_POST['textarea'];
	$txtmensaje="Escribe: {$txtnombre} {$txtemail} \r\n\n {$txtmensaje} ";

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: '.$txtemail . "\r\n";
	//$headers .= 'Cc: myboss@example.com' . "\r\n";

	$to="informesyventas@fashiongold.com.mx";
	$subject="Hablemos de negocios";

	if(mail($to,$subject,$txtmensaje ,$headers) )
		echo 'Exito';
	else{
		echo 'Error';
	}
?>
