<?php

use app\models\Medico;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */
?>
<div class="paciente-view">
    <?php if(isset($model->cumple)): ?> <span ng-init='cumple = "<?= $model->cumple ?>"'></span> <?php endif; ?>
    <?php if(isset($model->medico_id)): ?> <span ng-init='medico_id = "<?= $model->medico_id?>"'></span> <?php endif; ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="card" style="margin-bottom: 150px">
        <div class="card-heading text-capitalize blue darken-3">
            <h5 class="white-text" style="margin: 3px 0" >
                Información del Paciente
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
                            <h5 style="margin: 10px 0;" class="blue-text text-darken-3">Información medica</h5>
                        </div>
                        <div class="col-md-12">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <?= $form->field($model, 'nss')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($model, 'notificaciones')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <?= $form->field($model, 'alergias')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-4">
                                <p> <b>Estatura: </b> <br><span ><?= $model->alergias?></span></p>
                                <p> <b>Peso: </b> <br><span ><?= $model->alergias?></span></p>
                                <p> <b>Indice de masa corporal: </b> <br><span ><?= $model->alergias?></span></p>
                                <p> <b>Frecuencia cardíaca: </b> <br><span ><?= $model->alergias?></span></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                            <h5 style="margin: 10px 0;" class="blue-text text-darken-3">Médico de cabecera</h5>
                        </div>

                        <div class="col-md-12">
                            <p>
                                <?= $form->field($model,'medico_id')
                                    ->dropDownList(ArrayHelper::map(Medico::find()->asArray()->all(), 'id', 'nombre'), [
                                        'prompt' => Yii::t( 'app', 'Seleccionar' ),
                                        'ng-model' => 'medico_id'
                                    ])?>
                            </p>
                        </div>
                        <div class="col-md-12 text-ceter">
                            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear cita') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-danger']) ?>
                            <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-danger pull-right']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>