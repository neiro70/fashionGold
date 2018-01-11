<?php

    echo'
        <!-- Modal -->
        <div class="container">
            <div class="modal fade" id="myModalFrame">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #9D802E; color:#FFF;  border-top-left-radius: 5px; border-top-right-radius: 5px; ">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:#FFF;">Detalle del Producto</h4>
                        </div>
                        <div class="modal-body">
                            <iframe src="" frameborder="0" id="targetiframe" name="targetframe" allowtransparency="true">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal parte 2-->
        <script type="text/javascript">
            function previewProducto(idProducto) {
                var src = "'.$context.'/site/admin/mvc/view/producto/viewProducto.php?idproducto=" + idProducto;
                var height = $(this).attr("data-height") || "450px";
                var width = $(this).attr("data-width") || "100%";
        
                $("#targetiframe").attr({
                    "src": src,
                    "height": height,
                    "width": width
                });
            }
        </script>
    ';
?>