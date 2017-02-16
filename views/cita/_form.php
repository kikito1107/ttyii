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
<<<<<<< HEAD
$paciente = $paciente->id;
$medico = $model->medico_id;
=======
$model->paciente_id = $paciente->id;
$model->medico_id = 1;
var_dump($model->getErrors());
var_dump(time());
var_dump(date('d-M-y'));
var_dump(date('d-M-y', strtotime("3 Months")));

>>>>>>> 7424809218e6d80aef42bcfd48192d2e1a255629
?>

<div class="citas-form">

    <?php $form = ActiveForm::begin(); ?>

<<<<<<< HEAD
    <?= $form->field($model, 'paciente_id')->hiddenInput(['value' => $paciente])->label(false) ?>

    <?= $form->field($model, 'medico_id')->hiddenInput(['value' => $medico])->label(false) ?>
=======
    <?= $form->field($model, 'paciente_id')->hiddenInput(['value' => $id])->label(false) ?>

    <?= $form->field($model, 'medico_id')->hiddenInput(['value' => $id])->label(false) ?>
>>>>>>> 7424809218e6d80aef42bcfd48192d2e1a255629

    <div class="col-md-4 col-xs-12">
        <div class="ui-datepicker dp-head-danger dp-table-danger shadow-clear fix-width-material-input">
            <?= $form->field($model, 'dia',
                ['template' => MaterialDesignPresenter::getInputIconTemplate("fa-calendar")])->textInput([
                'ng-model' => 'birthday',
                'uib-datepicker-popup' => 'dd/MM/yyyy',
                'is-open' => 'popup.opened',
                'ng-click' => 'open()',
                'close-text' => Yii::t('app', 'Cerrar'),
                'class' => ($model->dia) ? 'ng-dirty fix-width-material-input' : ''
            ]) ?>
        </div>
        {{birthday}}
    </div>
<!--    <div class="col-md-8">-->
<!--        --><?php //echo '<label>Día de la cita</label>';
//        echo DatePicker::widget([
//            'name' => 'dia',
//            'model'=> 'dia',
//            'value' => date('d-M-Y'),
//            'pluginOptions' => [
//                'format' => 'dd-M-yyyy',
//                'todayHighlight' => true,
//                'languaje' => 'es'
//            ]
//        ]);?>
    </div>
    <div class="row">
<!--        --><?//= $form->field($model, 'dia')->widget(
//            DatePicker::className(), [
//            // inline too, not bad
////            'inline' => true,
//            // modify template for custom rendering
//            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
//            'clientOptions' => [
//                'autoclose' => true,
//                'format' => 'dd-M-y'
//            ]
//        ]);?>
    </div>

    <div class="col-md-4 col-md-offset-4">
    <?= $form->field($model, 'hora')->dropDownList(\app\models\Citas::getHours()) ?>
    </div>

    <div class="form-group col-md-offset-5">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <div class="col-md-4">
        <p class="text-danger"></p>
        <p class="text-warning"></p>
    </div>

    <?php ActiveForm::end(); ?>

</div>
