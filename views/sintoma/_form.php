<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sintoma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sintoma-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'organo_padre')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row text-center">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

<!--    --><?//= $form->field($model, 'organo')->textInput(['maxlength' => true]) ?>



<!--    --><?//= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'update_date')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'create_date')->textInput() ?>



    <?php ActiveForm::end(); ?>

</div>
