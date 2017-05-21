<?php
/**
 * Created by PhpStorm.
 * User: saul
 * Date: 18/05/17
 * Time: 11:34
 */
?>

<div class="card">
    <div class="card-heading bg-primary">
        <h5>Configurar cuenta como: <label class="text-capitalize"><?=$model->getFullName()?></label></h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <b>Habilitar o deshabilitar la cuenta</b>
                <p>Recuerda que tu información será conservada por un breve periodo como lo estimula la organización .......</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b>Reportar algún médico</b>
                <p>Si llegaste a tener algúm problema o situación desagradable, por favor asnola llegar para atenderla a la brevedad </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b>Reperotar falla en la página</b>
                <p>Durante tu instancia en la pagina as notado algún error o problema en procesar la información nos puedes informar, recuerda que estamos al tanto para darte
                siempre la mejor experiencia.</p>
                <textarea class="form-control"></textarea>
            </div>
        </div>
    </div>
</div>

