<?php
/**
 * Created by PhpStorm.
 * User: saul
 * Date: 22/02/17
 * Time: 10:18
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="card">
    <div class="card-heading">
        <h4>Consulta de <b class="text-capitalize"><?= $paciente->getFullName()?></b></h4>
        <p class="pull-right">Hora y fecha de incio de la consulta <b><?= date('d-m-y H:m:s')?></b></p>
    </div>

    <div class="card-body">
        <div class="row">
            <h5>Información general del pacinete</h5>
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'paciente_id')->hiddenInput(['value' => $paciente->id])->label(false) ?>
            <div class="col-md-2 ">
                <?= $form->field($model, 'estatura')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'peso')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'temperatura')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2">

                <?= $form->field($model, 'frecCardi')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-2" ng-show=" 2 == '<?= $paciente->genero ?>'">
                <?= $form->field($model, 'menstruacion')->radioList([1 =>'Si', 2=>'No'],['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row text-center">
            <?= Html::submitButton( Yii::t('app', 'Actualizar datos y seguir con la repertorización') , ['class' => 'btn btn-success ',]) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
