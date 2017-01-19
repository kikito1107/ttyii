<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="paciente-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-primary col-md-10">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <h4>Registro</h4>
                    <img src="/img/registro.jpg" alt="imagen de registro" class="img-rounded">
                </div>
                <div class="col-md-offset-2 col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Datos básicos</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'paterno')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'materno')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'genero')->radioList([1 => 'Hombre', 0 => 'Mujer']) ?>
                        </div>
                        <div class="col-md-8">
                            <?php echo '<label>Fecha de nacimiento</label>';
                            echo DatePicker::widget([
                                'name' => 'cumple',
                                'model'=> 'cumple',
                                'value' => date('d-M-Y', strtotime('+2 days')),
                                'pluginOptions' => [
                                    'format' => 'dd-M-yyyy',
                                    'todayHighlight' => true,
                                    'languaje' => 'en'
                                ]
                            ]);?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Datos de inicio de sesión</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group field-paciente-password required has-error">
                                <label class="control-label" for="paciente-password-confirm">Confirmar contraseña</label>
                                <input type="password" id="paciente-password-confirm" class="form-control" maxlength="15">
                                <div class="help-block">Las contraseñas no coinciden.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Registrarse') : Yii::t('app', 'Actualizar registro'), ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
