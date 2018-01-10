<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   session_destroy();
   
   echo 'Saliendo de la session del sistema';
   echo("<script>location.href = '".$context."/site/admin';</script>");
  // header('Refresh: 2; URL = index.php');
?>
