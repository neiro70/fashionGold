<?php
 
	$context= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	if (strpos($context, "localhost") !== false) {
		$var =explode("/",$context);
		$context="http://" .$var[0]."/".$var[1];
	}
?>
<html>
<head>

<script language="Javascript" type="text/javascript">


//<![CDATA[
window.location.href="<?php echo $context ?>/site";     

//]]> End script hiding -->

</script>

</head>

</html>

