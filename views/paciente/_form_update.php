<?php

use kartik\date\DatePicker;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="paciente-form">
    <?php $form = ActiveForm::begin(); ?>
    <?php if(isset($model->password)): ?> <span ng-init='name = "<?= $model->password?>"'></span> <?php endif; ?>
    <span ng-init='name = "confirmPassword"'></span>

    <div class="panel panel-primary col-md-10">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <h4>Actualizar imagen</h4>
                    <div>
                        <?php if(isset($model->imagePhoto)): ?>
                        <img src="/img/<?= $model->imagePhoto?>" alt="imagen de registro" class="img-rounded" height="250" width="350">
                        <?php endif;?>
                        <img src="/img/registro.jpg" alt="imagen de registro" class="img-rounded" height="250" width="350">
                    </div>

                    <div class="row">
                        <div >
                        <?= $form->field($model, 'image_Photo')->widget(FileInput::className(), [
                                'options' => ['accept' => 'image/*'],
                                'pluginOptions' => [
                                    'showRemove' => false,
                                    'showUpload' => false
                                ]
                            ]) ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-offset-2 col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Actualiza tus datos básicos</h5>
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
                            <?= $form->field($model, 'direccion')->textInput() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'telefono')->textInput() ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'celular')->textInput() ?>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-6">
                             <?= $form->field($model, 'nss')->textInput() ?>
                         </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'alergias')->textInput() ?>
                    </div>





                    <div class="row">
                        <div class="col-md-12">
                            <h5>Actualiza tus datos de inicio de sesión</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'ng-model' => 'password']) ?>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group field-paciente-password" ng-class="{'required has-error':password != confirmPassword }">
                                <label class="control-la bel" for="paciente-password-confirm">Confirmar contraseña</label>
                                <input type="password" id="paciente-password-confirm" class="form-control" maxlength="15" ng-model="confirmPassword" required>
                                <div class="help-block" ng-show="password != confirmPassword">Las contraseñas no coinciden.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Registrarse') : Yii::t('app', 'Actualizar registro'), [
                        'class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary',
                        'ng-disabled' => 'password != confirmPassword ']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
