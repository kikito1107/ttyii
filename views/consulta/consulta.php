<?php
/* @var $this yii\web\View */
use app\models\Medico;
use yii\helpers\Url;

$medico = Medico::find()->where(['user_id' => \Yii::$app->user->getId()])->one();

?>
<div class="card">
    <div class="col-md-12">
        <h4>Consultas</h4>
        <hr class="blue darken-4">
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <p>Al parecer hoy no tiene consultas pendientes </p>
                <a href="<?= Url::to(['/paciente', 'id' => $medico->id]) ?>" class="btn btn-primary">
                    <?= Yii::t('app', 'Pacientes') ?>
                </a>
            </div>

            <div class="col-md-12">
                <h6>¿Quieres realizar la repertorización de algún paciente?</h6>
                <p class="blue-text">Selecciona a tu paciente y realiza una consulta rapida.</p>
            </div>
            <div class="col-md-12">

            </div>
        </div>
    </div>
</div>
