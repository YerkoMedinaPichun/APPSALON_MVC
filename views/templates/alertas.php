<?php  

    foreach($alertas as $key => $mensajes):
        foreach($mensajes as $mensaje):
            //No se sanitiza, porque el arreglo lo estamos generando
            //en el modelo, se sanitiza los datos del usuario, lo que escribe
            ?>
        <div class="alerta <?php echo $key;?>">
            <?php echo $mensaje;?>
        </div>
            <?php

        endforeach;
    endforeach;

?>