<?php
  
  $context= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$var =explode("/",$context);
	if (strpos($context, "localhost") !== false) {
		$context="http://" .$var[0]."/".$var[1];
	}else{
		$context="http://" .$var[0];
	}

?>

<html>
    <head>
      <title>Test rendering of Chopin Script</title>
      <link href='<?php echo $context ?>/site/css/font.css' rel='stylesheet' type='text/css'>
    </head>
    <body>

       <p class="chopsFont"> Fashion Gold</p> 

    </body>
  </html>