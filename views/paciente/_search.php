<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PacienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paciente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['register/resend-mail'],
        'method' => 'post',
    ]); ?>

<!--    --><?//= $form->field($model, 'id') ?>
<!---->
<!--    --><?//= $form->field($model, 'user_id') ?>
<!---->
<!--    --><?//= $form->field($model, 'nombre') ?>
<!---->
<!--    --><?//= $form->field($model, 'paterno') ?>
<!---->
<!--    --><?//= $form->field($model, 'materno') ?>

    <?php // echo $form->field($model, 'genero') ?>

    <?php // echo $form->field($model, 'cumple') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'celular') ?>

    <?php  echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'image_Photo') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'user_type') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'nss') ?>

    <?php // echo $form->field($model, 'alergias') ?>

    <?php // echo $form->field($model, 'notificaciones') ?>

    <div class="form-group text-center">
        <?= Html::submitButton(Yii::t('app', 'Enviar correo'), ['class' => 'btn btn-success']) ?>
<!--        --><?//= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
