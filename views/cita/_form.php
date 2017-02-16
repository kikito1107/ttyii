<?php

use app\models\Paciente;
use kartik\date\DatePicker;
use messaging\shared\presenters\MaterialDesignPresenter;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Citas */
/* @var $form yii\widgets\ActiveForm */
$id = (int)$id;
$paciente =  Paciente::find()->where(['id' => $id])->one();

$paciente = $paciente->id;
$medico = 1;

?>

<div class="citas-form">
    <?php if(isset($model->dia)): ?> <span ng-init='dia = "<?= $model->dia ?>"'></span> <?php endif; ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paciente_id')->hiddenInput(['value' => $paciente])->label(false) ?>

    <?= $form->field($model, 'medico_id')->hiddenInput(['value' => $medico])->label(false) ?>

    <div class="row">
        <div class="col-md-5 col-xs-12">
            <div class="ui-datepicker dp-head-danger dp-table-danger shadow-clear fix-width-material-input">
                <?= $form->field($model, 'dia',
                    ['template' => MaterialDesignPresenter::getInputIconTemplate("fa-calendar")])->textInput([
                    'ng-model' => 'dia',
                    'uib-datepicker-popup' => 'dd/MM/yyyy',
                    'is-open' => 'popup.opened',
                    'ng-click' => 'open()',
                    'close-text' => Yii::t('app', 'Cerrar'),
                    'class' => ($model->dia) ? 'ng-dirty fix-width-material-input' : ''
                ]) ?>
            </div>
        </div>

        <div class="col-md-5">
            <?= $form->field($model, 'hora')->dropDownList(\app\models\Citas::getHours()) ?>
        </div>
    </div>


    <div class="row ">
        <div class="form-group col-md-offset-5">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear cita') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
