<?php
/**
 * Created by PhpStorm.
 * User: saul
 * Date: 22/02/17
 * Time: 08:40
 */
?>
<div class="div-historial">
    <div class="card">
        <div class="card-heading">
            <h4>Historial clinico de <b class="text-capitalize"><?= $model->getFullName()?></b></h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 red lighten-2 white-text">
                    <h5>Datos personales</h5>
                </div>
<!--                --><?//= var_dump($sometria->estatura);exit;?>
                <div class="col-md-12">
                    <div class="col-md-4">
                        <p> <b>Alergias: </b> <span ><?= $model->alergias?></span></p>
                    </div>
                    <div class="col-md-4">
                        <p> <b>Estatura: </b> <span ><?= $sometria->estatura?></span></p>
                        <p> <b>Peso: </b> <span ><?= $sometria->peso?></span></p>
                        <p> <b>Indice de masa corporal: </b> <span >{{<?= $sometria->peso/($sometria->estatura*$sometria->estatura)?> |number:2}}</span></p>
                        <p> <b>Frecuencia cardíaca: </b> <span ><?= $sometria->frecCardi?></span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 red lighten-2 white-text">
                    <h5>Datos clinicos</h5>
                </div>
                <div class="col-md-12">
                    <p>Datos de la ultima consulta realizada</p>
                    <?= (sizeof($sometria) == 0)? 'No se tienen estos valores': 'valores disponibles' ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 red lighten-2 white-text">
                    <h5>Historial de ultimas consultas</h5>
                </div>
                <div class="col-md-12">
                    &nbsp;
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Diagnostico</th>
                                <th>Tratamientos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php if( sizeof($sometria) == 0):?>
                                    <td colspan="2">Por el momento no tiene consultas realizadas</td>
                                <?php else: ?>
                                    <td>Tratamiento realizado</td>
                                    <td>Diagnostico recomendado</td>
                                <?php endif; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
