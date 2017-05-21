<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Medicamento */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="col-md-12">
        <h5>Medicamento agregado de manera exitosa</h5>
        <hr>
    </div>

    <div class="card-body">
        <p>
            Muchas gracias por tu aportación al repertorio, se validara por el administrador para así poder hacer uso de
            esta información en futuras repertorizaciones.
            <br>
            El medicamento agregado fue: <b class="text-capitalize"><?= $this->title ?> -- <?= $model->abreviatura?> </b>
        </p>
        <p class="red-text">Se generó una notificación a las <b><?= $model->create_date ?></b> que será atendida a la brevedad. </p>
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <img src="<?= Url::home()?>img/img-validacion.png" class="img-responsive img-rounded">
            </div>
        </div>
    </div>
</div>

