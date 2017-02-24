<?php
/* @var $this yii\web\View */
use app\models\Medico;
use yii\helpers\Url;

$medico = Medico::find()->where(['user_id' => \Yii::$app->user->getId()])->one();

?>
<div class="card">
    <div class="card-heading">
        <h4>Consultas</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <p>Al parecer hoy no tiene consultas pendientes</p>
            <a href="<?= Url::to(['/paciente', 'id' => $medico->id]) ?>" class="btn btn-primary">
                <?= Yii::t('app', 'Pacientes') ?>

            </a>
        </div>
    </div>
</div>
