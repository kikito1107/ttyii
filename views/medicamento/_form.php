<?php

use app\models\Medicamento;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Medicamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicamento-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'abreviatura')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'status')->hiddenInput(['value' => Medicamento::STATUS_INACTIVE])->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group text-center">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Agregar') : Yii::t('app', 'Editar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
<!--    --><?//= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'update_date')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'create_date')->textInput() ?>



    <?php ActiveForm::end(); ?>

</div>
