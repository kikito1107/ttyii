<?php

use kartik\file\FileInput;
use messaging\shared\presenters\MaterialDesignPresenter;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Medico */

$this->title = Yii::t('app', 'Editar', [
    'modelClass' => 'Medico',
]);
?>
<div class="medico-view">
    <?php if(isset($model->cumple)): ?> <span ng-init='cumple = "<?= $model->cumple ?>"'></span> <?php endif; ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="card">
        <div class="card-heading text-capitalize blue darken-3">
            <h5 class="white-text" style="margin: 3px 0" >
                Perfil médico
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Guardar '), ['class' => $model->isNewRecord ? 'btn btn-primary btn-lg' : 'btn btn-danger pull-right']) ?>
            </h5>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-3">
                    <?php if($model->image_Photo != null && $model->image_Photo !== ""):?>
                        <img src="<?= Url::base().'/img/homeo.png'?>" class="img-circle">
                    <?php else:?>
                        <?php if($model->genero == 1):?>
                            <img src="<?= Url::base().'/img/men.png'?>" class="img-circle">
                        <?php else:?>
                            <img src="<?= Url::base().'/img/woman.png'?>" class="img-circle">
                        <?php endif; ?>
                    <?php endif; ?>
                    <?= $form->field($model, 'imagePhoto')->widget(FileInput::className(), [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'showRemove' => false,
                            'showUpload' => false
                        ]
                    ]) ?>
                </div>

                <div class="col-md-8" style="border-left: 3px solid #00acc1;">
                    <div class="row">
                        <div class="col-md-12 ">
                            <h5 style="margin: 10px 0;" class="blue-text text-darken-3">Datos personales</h5>
                        </div>
                        <div class="col-md-12">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <?= $form->field($model, 'nombre')->textInput([['maxlength' => true]])?>
                            </div>
                            <div class="col-md-2">
                                <?= $form->field($model, 'paterno')->textInput([['maxlength' => true]])?>
                            </div>
                            <div class="col-md-2">
                                <?= $form->field($model, 'materno')->textInput([['maxlength' => true]])?>
                            </div>
                            <div class="col-md-3">
                                <?= $form->field($model, 'cumple')->textInput([
                                    'ng-model' => 'cumple',
                                    'uib-datepicker-popup' => 'dd/MM/yyyy',
                                    'is-open' => 'popup.opened',
                                    'ng-click' => 'open()',
                                    'close-text' => Yii::t('app', 'Cerrar'),
                                    'class' => ($model->cumple) ? 'ng-dirty fix-width-material-input form-control' : ''
                                ]) ?>
                            </div>

                            <div class="col-md-3">
                                <?= $form->field($model, 'genero')->radioList([1=>'Hombre', 2=>'Mujer']) ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                            <h5 style="margin: 10px 0;" class="blue-text text-darken-3">Datos de inicio de sesión</h5>
                        </div>
                        <div class="col-md-12">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($model, 'password')->passwordInput() ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                            <h5 style="margin: 10px 0;" class="blue-text text-darken-3">Datos contacto</h5>
                        </div>
                        <div class="col-md-12">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h5 style="margin: 10px 0;" class="blue-text text-darken-3">Datos académicos</h5>
                        </div>
                        <div class="col-md-12">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <?= $form->field($model, 'cedula')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($model, 'escuela')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($model, 'especialidad')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                            <h5 style="margin: 10px 0;" class="blue-text text-darken-3">Otros</h5>
                        </div>
                        <div class="col-md-12">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($model, 'descripcion')->textarea(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>