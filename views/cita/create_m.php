<?php

use app\models\Paciente;
use messaging\shared\presenters\MaterialDesignPresenter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Citas */

$this->title = Yii::t('app', 'Generar cita');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Citas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-heading">
        <h4><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="card-body">
        <?php if(isset($model->dia)): ?> <span ng-init='dia = "<?= $model->dia ?>"'></span> <?php endif; ?>
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                <?= $form->field($model, 'paciente_id')->dropDownList(ArrayHelper::map(Paciente::find()->where(['medico_id'=>$id])->asArray()->all(), 'id',
                    function($model, $defaultValue) {
                        return $model['nombre'].' '.$model['paterno'].' '.$model['materno'];
                    }), [
                    'prompt' => Yii::t( 'app', 'Seleccionar' ),
                    'ng-model' => 'paciente_id'
                ]) ?>
            </div>
        </div>


        <?= $form->field($model, 'medico_id')->hiddenInput(['value' => $id])->label(false) ?>

        <div class="row">
            <div class="col-md-3 col-xs-12 col-md-offset-2">
                <div class="ui-datepicker dp-head-danger dp-table-danger shadow-clear fix-width-material-input">
                    <?= $form->field($model, 'dia',
                        ['template' => MaterialDesignPresenter::getInputIconTemplate("fa-calendar")])->textInput([
                        'ng-model' => 'dia',
                        'uib-datepicker-popup' => 'dd/MM/yyyy',
                        'is-open' => 'popup.opened',
                        'ng-click' => 'open()',
                        'close-text' => Yii::t('app', 'Cerrar'),
                        'class' => ($model->dia) ? 'ng-dirty fix-width-material-input' : ''
                    ]) ?>
                </div>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'hora')->dropDownList(\app\models\Citas::getHours()) ?>
            </div>
        </div>


        <div class="row ">
            <div class="form-group col-md-offset-5">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear cita') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>


        <?php ActiveForm::end(); ?>

    </div>

</div>
