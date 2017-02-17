<?php

use app\models\Medicamento;
use app\models\Sintoma;
use app\models\Tratamiento;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tratamiento */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <?php $form = ActiveForm::begin(); ?>

    <!--<div class="col-md-6">
        < ?= /*$form->field($model,'organo_padre_id')
            ->dropDownList(ArrayHelper::map(Organo::find()->asArray()->all(), 'id', 'nombre'), [
                'prompt' => Yii::t( 'app', 'Seleccionar' ),
                'ng-model' => 'organo_padre'
            ])*/ ?>
    </div> -->
    <div class="col-md-4">
        <?= $form->field($model,'sintoma_id')
            ->dropDownList(ArrayHelper::map(Sintoma::find()->asArray()->all(), 'id', 'nombre'), [
                'prompt' => Yii::t( 'app', 'Seleccionar' ),
                'ng-model' => 'sintoma'
            ])?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model,'medicamento_id')
            ->dropDownList(ArrayHelper::map(Medicamento::find()->asArray()->all(), 'id', 'nombre'), [
                'prompt' => Yii::t( 'app', 'Seleccionar' ),
                'ng-model' => 'medicamento'
            ])?>
    </div>
    <div class="col-md-4 ">
        <?= $form->field($model, 'ponderacion')->dropDownList(Tratamiento::getPonderacion()) ?>
    </div>

    <?= $form->field($model, 'status')->hiddenInput(['value' => Tratamiento::STATUS_ACTIVE])->label(false) ?>

    <div class="col-md-12">
        <?= $form->field($model, 'descripcion')->textarea() ?>
    </div>

    <div class="col-md-12 text-center">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Agregar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>


    <?php ActiveForm::end(); ?>