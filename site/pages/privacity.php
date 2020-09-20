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
    $title="Aviso de Privacidad | Fashion Gold";
?>
    <!doctype html>
    <!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
    <!--[if (gt IE 9)|!(IE)]><!-->
    <html lang="en" class="no-js">
    <!--<![endif]-->

    <?php include "../../site/template/head.php";?>

    <body itemscope itemtype="http://schema.org/WebPage" class="templateCollection">

        <?php include "../../site/template/header.php";?>

        <div id="content-wrapper-parent">
            <div id="content-wrapper">
                <!-- Content -->
                <div id="content" class="clearfix">
                    <section class="content">
                        <div id="breadcrumb" class="breadcrumb">
                            <div itemprop="breadcrumb" class="container">
                            <div style="line-height: 34px;">
                                    <div class="col-md-24"><a href="<?php echo $context ?>" class="homepage-link" title="Back to the frontpage">Inicio</a> <span>/</span>
                                        <span class="page-title">AVISO DE PRIVACIDAD</span></div>
                                </div>
                            </div>
                        </div>

                    


                        <div class="container">
                            <div class="row">
                                <div id="col-main" class="col-md-24 normal-page clearfix">
                                    <div class="page about-us   ">

                                        <div class="col-md-24 text-center" >
                                            <img src="../img/collection/logo_negro.jpg"  />
                                        </div> 
                                        <br />
                                        <p><b>Fashion Gold</b>, con domicilio en la Ciudad de México, es el responsable del uso y protección de sus datos
                                                personales, y al respecto le informamos lo siguiente:</p>
                                        <h3>
                                            ¿Para qué fines utilizaremos sus datos personales?
                                        </h3>
                                        <p> 
                                        Los datos personales que recabamos de usted, los utilizaremos para las siguientes finalidades que son
                                        necesarias para el servicio que solicita:
                                        </p>
                                        
                                        <ul>
                                        <li>* Envío de información comercial a solicitud del interesado.</li>
                                        <li>* Comunicación con el interesado.</li>
                                        </ul>
                                        
                                        <p>
                                        De manera adicional, utilizaremos su información personal para las siguientes finalidades que no son
                                        necesarias para el servicio solicitado, pero que nos permiten y facilitan brindarle una mejor atención:
                                        </p>
                                         
                                        <ul>
                                        <li>* Envío de información comercial de interés</li>
                                        </ul>
                                        <p> 
                                        En caso de que no desee que sus datos personales sean tratados para estos fines adicionales, desde este
                                        momento usted nos puede comunicar lo anterior, a través de la dirección
                                        <b>direcciongeneral@fashiongold.com.mx</b></p>


                                        <h3>¿Qué datos personales utilizaremos para estos fines?</h3>
                                        <p>Para llevar a cabo las finalidades descritas en el presente aviso de privacidad, utilizaremos los siguientes datos personales: Datos de contacto tales como nombre, teléfono, domicilio y formas de contacto electrónicas.</p>
                                        <p>Además de los datos personales mencionados anteriormente, para las finalidades informadas en el presente aviso de privacidad utilizaremos los siguientes datos personales considerados como sensibles, que requieren de especial protección: datos financieros, biométricos, digitales, de identificación, patrimoniales, académicos o laborales.</p>
                                        
                                        <h3>¿Con quién compartimos su información personal y para qué fines?</h3>
                                        <p>Le informamos que sus datos personales son compartidos dentro y fuera del país con las siguientes personas, empresas, organizaciones y autoridades distintas a nosotros, para los siguientes fines:</p>
                                        <p>Destinatario de los datos personales         País (opcional)                   Finalidad</p>
                                        <p>Autoridades                                                   México                                Si nos fuera solicitado en un proceso judicial bajo una orden.</p>
                                        <p>Socios de Negocios                                       México                                Proporcionarle un servicio que no dependa completamente de 
                                           Entidades Financieras                   </p>
                                        <p>                                 México                               Validar información de pagos entre los involucrados*</p>

                                        <p>Le informamos que para las transferencias indicadas con un asterisco (*) requerimos obtener su consentimiento. Si usted no manifiesta su negativa para dichas transferencias, entenderemos que nos lo ha otorgado [Ésto sólo aplica para consentimiento tácito].</p>
                                        <p>No autorizo que mis datos personales sean compartidos con los siguientes terceros (favor de notificarlo a <b>direcciongeneral@fashiongold.com.mx</b> )</p>
                                        
                                        <h3>¿Cómo puede acceder, rectificar o cancelar sus datos personales, u oponerse a su uso?</h3>

                                        <p>Usted tiene derecho a conocer qué datos personales tenemos de usted, para qué los utilizamos y las condiciones del uso que les damos (Acceso). Asimismo, es su derecho solicitar la corrección de su información personal en caso de que esté desactualizada, sea inexacta o incompleta (Rectificación); que la eliminemos de nuestros registros o bases de datos cuando considere que la misma no está siendo utilizada conforme a los principios, deberes y obligaciones previstas en la normativa (Cancelación); así como oponerse al uso de sus datos personales para fines específicos (Oposición). Estos derechos se conocen como derechos ARCO.</p>
                                        <p>Para el ejercicio de cualquiera de los derechos ARCO, usted deberá presentar la solicitud respectiva en formato digital firmado a direcciongeneral@fashiongold.com.mx
Para conocer el procedimiento y requisitos para el ejercicio de los derechos ARCO, usted podrá ponerse en contacto con nuestro Departamento de Privacidad, que dará trámite a las solicitudes para el ejercicio de estos derechos, y atenderá cualquier duda que pudiera tener respecto al tratamiento de su información. Los datos de contacto del Departamento de Privacidad son los siguientes: 
direcciongeneral@fashiongold.com.mx
                                        </p>
                                        
                                        <h3>¿Cómo puede revocar su consentimiento para el uso de sus datos personales?</h3>
                                        
                                        <p>Usted puede revocar el consentimiento que, en su caso, nos haya otorgado para el tratamiento de sus datos personales. Sin embargo, es importante que tenga en cuenta que no en todos los casos podremos atender su solicitud o concluir el uso de forma inmediata, ya que es posible que por alguna obligación legal requiramos seguir tratando sus datos personales. Asimismo, usted deberá considerar que para ciertos fines, la revocación de su consentimiento implicará que no le podamos seguir prestando el servicio que nos solicitó, o la conclusión de su relación con nosotros.</p>
                                        <p>Para revocar su consentimiento deberá presentar su solicitud en formato digital firmado a direcciongeneral@fashiongold.com.mx
Para conocer el procedimiento y requisitos para la revocación del consentimiento, usted podrá ponerse en contacto con nuestro Departamento de Privacidad.
</p>
                                        <h3>¿Cómo puede limitar el uso o divulgación de su información personal? </h3>

                                        <p>Con objeto de que usted pueda limitar el uso y divulgación de su información personal, le ofrecemos los siguientes medios:</p>
                                        <ul>
                                        <li>* Su inscripción en el Registro Público para Evitar Publicidad, que está a cargo de la Procuraduría Federal del Consumidor, con la finalidad de que sus datos personales no sean utilizados para recibir publicidad o promociones de empresas de bienes o servicios. Para mayor información sobre este registro, usted puede consultar el portal de Internet de la PROFECO, o bien ponerse en contacto directo con ésta.</li>
                                        </ul>
                                        <p>Su registro en el listado de exclusión, a fin de que sus datos personales no sean tratados para fines mercadotécnicos, publicitarios o de prospección comercial por nuestra parte. Para mayor información escríbanos  a direcciongeneral@fashiongold.com.mx</p>
                                        <ul>
                                        <li>* El uso de tecnologías de rastreo en nuestro portal de Internet
Le informamos que en nuestra página de Internet utilizamos cookies, web beacons y otras tecnologías a través de las cuales es posible monitorear su comportamiento como usuario de Internet, así como brindarle un mejor servicio y experiencia de usuario al navegar en nuestra página.
</li>
                                        </ul>

                                        <p>Los datos personales que obtenemos de estas tecnologías de rastreo son los siguientes: Formulario de Registro, mismos que utilizamos para ponernos en contacto con Usted.  </p>
                                        <p>Estas tecnologías podrán deshabilitarse siguiendo los siguientes pasos: solicitando la eliminación de sus datos en formato digital firmado a direcciongeneral@fashiongold.com.mx</p>
                                        
                                        <h3>¿Cómo puede conocer los cambios a este aviso de privacidad?</h3>
                                        <p>El presente aviso de privacidad puede sufrir modificaciones, cambios o actualizaciones derivadas de nuevos requerimientos legales; de nuestras propias necesidades por los productos; de nuestras prácticas de privacidad; de cambios en nuestro modelo de negocio, o por otras causas.</p>
                                        <p>Nos comprometemos a mantenerlo informado sobre los cambios que pueda sufrir el presente aviso de privacidad, a través de nuestro SITIO WEB.</p>
                                        <p>El procedimiento a través del cual se llevarán a cabo las notificaciones sobre cambios o actualizaciones al presente aviso de privacidad es el siguiente: Apartado en el Sitio Web.</p>

                                        <p><b> Fashion Gold</b></p>
                                       

                                    </div>
                                </div>



                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

		<?php include "../../site/template/footer.php";?>

    </body>

</html>