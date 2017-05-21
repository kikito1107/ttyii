<?php
/* @var $this yii\web\View */
use app\models\Medico;
use yii\helpers\Url;

$id = \Yii::$app->user->getId();
$medico = Medico::find()->where(['user_id'=>$id])->one();

?>
<div class="jumbotron">
    <h3>Agregar nuevo conocimiento al repertorio</h3>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <p class="text-justify">
                Recuerda que el sistema cuenta con una versión simplificada del libro <b>"Un repertorio conciso de medicamentos
                homeopáticos. Organizado alfabéticamente"</b>. En todo momento podrás aportar nuevos síntomas, medicamentos o
                tratamientos con la finalidad de cubrir la mayor cantidad de sintomas que presente una persona y poder ofrecer un
                tratamiento más efectivo en todo momento, así mismo estas ayudando a nuestro sistema a crecer.
            </p>
        </div>
        <div class="col-md-4 text-center col-md-offset-1">
            <img src="<?= Url::home()?>img/img-repertorio.jpg" class="img-responsive img-rounded">
        </div>
    </div>
    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>
    <div class="row">
        <div class="col-md-12">
            <?php if($medico != null): ?><!-- cuando es medico -->
            <div class="row">

                <div class="col-md-4">
                    <p><a class="btn btn-primary btn-lg btn-block" href="<?= Url::to(['/sintoma/create-m']) ?>"  role="button">Agregar síntoma</a></p>
                </div>
                <div class="col-md-4">
                    <p><a class="btn btn-primary btn-lg btn-block" href="<?= Url::to(['/medicamento/create-m']) ?>" role="button">Agregar medicamento</a></p>
                </div>
                <div class="col-md-4">
                    <p><a class="btn btn-primary btn-lg btn-block" href="<?= Url::to(['/tratamiento/create-m']) ?>" role="button">Crear tratamiento</a></p>
                </div>
            </div>

            <?php else:?><!-- cuando es administrador -->
            <div class="row">
                <div class="col-md-4">
                    <p><a class="btn btn-primary btn-lg btn-block" href="<?= Url::to(['/sintoma/create']) ?>"  role="button">Agregar síntoma</a></p>
                </div>
                <div class="col-md-4">
                    <p><a class="btn btn-primary btn-lg btn-block" href="<?= Url::to(['/medicamento/create']) ?>" role="button">Agregar medicamento</a></p>
                </div>
                <div class="col-md-4">
                    <p><a class="btn btn-primary btn-lg btn-block" href="<?= Url::to(['/tratamiento/create']) ?>" role="button">Crear tratamiento</a></p>
                </div>
            </div>
            <?php endif; ?>
            <p class="red-text darken-4">Recuerda que toda la nueva información proporcionada sera validada por la gente con el conocimiento necesario.</p>
        </div>
    </div>
</div>
