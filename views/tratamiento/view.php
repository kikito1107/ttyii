<?php

use app\models\Medicamento;
use app\models\Sintoma;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Tratamiento */

$this->title = 'Nuevo tratamiento';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="col-md-12">
        <h5>Tratamiento agregado de manera exitosa</h5>
        <hr>
    </div>

    <div class="card-body">
        <p>
            Muchas gracias por tu aportación al repertorio, se validara por el administrador para así poder hacer uso de
            esta información en futuras repertorizaciones.
            <br>
            Tu aportación de un nuevo tratamiento es:
            <ul>
                <li>Síntoma: <b><u><?= Sintoma::findOne(['id' => $model->sintoma_id])->nombre?></u></b></li>
                <li>Medicamento: <b><u><?= Medicamento::findOne(['id' => $model->medicamento_id])->nombre?></u></b></li>
                <li>Ponderación: <b><u><?= $model->ponderacion?></u></b></li>
            </ul>
        </p>
        <p class="red-text">Se generó una notificación a las <b><?= $model->create_date ?></b> que será atendida a la brevedad. </p>
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <img src="<?= Url::home()?>img/img-validacion.png" class="img-responsive img-rounded">
            </div>
        </div>
    </div>
</div>
