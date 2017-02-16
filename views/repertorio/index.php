<?php
/* @var $this yii\web\View */
use app\models\Medico;
use yii\helpers\Url;

$id = \Yii::$app->user->getId();
$medico = Medico::find()->where(['user_id'=>$id])->one();

?>
<div class="jumbotron">
    <h3>Agregar nuevo conocimiento al repertorio actual</h3>
    <p>Toda la infomación proporcionada por los médicos se debe de validar con la finalidad de conservar la integridad del mismo.</p>

    <?php if($medico != null): ?><!-- cuando es medico -->
        <div class="row">
            <div class="col-md-3">
                <p><a class="btn btn-primary btn-lg btn-block" href="<?= Url::to(['/organo/create-m']) ?>" role="button">Agregar órgano</a></p>
            </div>
            <div class="col-md-3">
                <p><a class="btn btn-primary btn-lg btn-block" href="<?= Url::to(['/sintoma/create-m']) ?>"  role="button">Agregar síntoma</a></p>
            </div>
            <div class="col-md-3">
                <p><a class="btn btn-primary btn-lg btn-block" href="<?= Url::to(['/medicamento/create-m']) ?>" role="button">Agregar medicamento</a></p>
            </div>
            <div class="col-md-3">
                <p><a class="btn btn-primary btn-lg btn-block" href="<?= Url::to(['/tratamiento/create-m']) ?>" role="button">Crear tratamiento</a></p>
            </div>
        </div>
    <?php else:?><!-- cuando es administrador -->
        <div class="row">
            <div class="col-md-3">
                <p><a class="btn btn-primary btn-lg btn-block" href="<?= Url::to(['/organo/create']) ?>" role="button">Agregar órgano</a></p>
            </div>
            <div class="col-md-3">
                <p><a class="btn btn-primary btn-lg btn-block" href="<?= Url::to(['/sintoma/create']) ?>"  role="button">Agregar síntoma</a></p>
            </div>
            <div class="col-md-3">
                <p><a class="btn btn-primary btn-lg btn-block" href="<?= Url::to(['/medicamento/create']) ?>" role="button">Agregar medicamento</a></p>
            </div>
            <div class="col-md-3">
                <p><a class="btn btn-primary btn-lg btn-block" href="<?= Url::to(['/tratamiento/create']) ?>" role="button">Crear tratamiento</a></p>
            </div>
        </div>
    <?php endif; ?>
</div>
