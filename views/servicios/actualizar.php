<h1 class="nombre-pagina">Actualizar Servicio</h1>
<p class="descripcion-pagina">Modifica los valores del formulario</p>

<?php 
    include_once __DIR__ .'/../templates/barra.php';
    include_once __DIR__ .'/../templates/alertas.php';
?>
<!--
    quitamos el action del formulario
    action="/servicios/actualizar"

    ya que en nuestro public/index.php solo soporta
    /servicios/actualizar y en la url le estamos pasando un query string
    es decir estamos pasando un dato por url

    $router->post('/servicios/actualizar',[ServicioController::class,'actualizar']);

    con esto lo manda a la misma url pero respetando el id que hay en
    url
-->
<form method="POST" class="formulario">
    <?php include_once __DIR__ . '/formulario.php'; ?>
    <input type="submit" class="boton" value="Actualizar Servicio">
</form>