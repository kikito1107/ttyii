<?php

use app\models\Citas;
use app\models\Paciente;
use kartik\date\DatePicker;
use messaging\shared\presenters\MaterialDesignPresenter;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Citas */
/* @var $form yii\widgets\ActiveForm */
$id = (int)$id;
$paciente =  Paciente::find()->where(['id' => $id])->one();?>

<div class="citas-form" ng-controller="MainController">
    <?php if(isset($model->dia)): ?> <span ng-init='dia = "<?= $model->dia ?>"'></span> <?php endif; ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paciente_id')->hiddenInput(['value' => $paciente->id])->label(false) ?>

    <?= $form->field($model, 'medico_id')->hiddenInput(['value' => $paciente->medico_id])->label(false) ?>

    <div class="row">
        <div class="col-md-5">
            <?= $form->field($model, 'dia')->textInput([
                'ng-model' => 'dia',
                'uib-datepicker-popup' => 'dd-MM-yyyy',
                'min-date' => 'dd-mm-yyyy',
                'is-open' => 'popup.opened',
                'ng-click' => 'open()',
                'close-text' => Yii::t('app', 'Cerrar'),
                'class' => ($model->dia) ? 'ng-dirty fix-width-material-input form-control' : ''
            ]) ?>
        </div>
        <span ng-init="dia"></span>
        <div class="col-md-5">
            <?= $form->field($model, 'hora')->dropDownList(Citas::getHours()) ?>
        </div>
    </div>
    <div class="row ">
        <div class="form-group col-md-offset-5">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear cita') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>