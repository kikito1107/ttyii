<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Medico */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group text-center">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-primary btn-lg' : 'btn btn-danger']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>




<!--    --><?//= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'paterno')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'materno')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'genero')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'cumple')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>



<!--    --><?//= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'image_Photo')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'status')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'user_type')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'update_date')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'create_date')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'cedula')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'escuela')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'especialidad')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>


