<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   session_destroy();
   $context= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
   $var =explode("/",$context);
   if (strpos($context, "localhost") !== false) {
       $context="http://" .$var[0]."/".$var[1];
   }else{
       $context="http://" .$var[0];
   }
   
   
   echo 'Saliendo de la session del sistema';
   echo("<script>location.href = '".$context."/site/admin';</script>");
  // header('Refresh: 2; URL = index.php');
?>
