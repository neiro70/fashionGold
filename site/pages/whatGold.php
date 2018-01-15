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
    $title="Oro Laminado FashionGold | Fashion Gold";
?>
    <!doctype html>
    <html lang="en" class="no-js">

    <?php include "../../site/template/head.php";?>

    <body itemscope itemtype="http://schema.org/WebPage" class="templateCollection">

        <?php include "../../site/template/header.php";?>
        <?php include "../../site/template/contentWhatGold.php";?>
        <?php include "../../site/template/footer.php";?>

        <style>
            .foto {
                width: 80%;
                position: relative;
                margin: auto;
            }

            .foto img {
                width: 100%;
            }

            .foto p {
                position: absolute;
                bottom: 100px;
                left: 65px;
                /*width:100%;*/
                width: 400px;
                text-align: justify;
                /*color:rgba(243,243,243,.8);*/
                color: black;
                font-family: Verdana;
                font-size: 14px;
                font-style: italic;
                /*background-color:rgba(0,0,0,.7);*/
                padding: .5em 0;
            }
        </style>

    </body>

</html>