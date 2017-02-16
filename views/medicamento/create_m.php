<?php

use app\models\Medicamento;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Medicamento */

$this->title = Yii::t('app', 'Agregar medicamento');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Medicamentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicamento-create">
    <div class="card">
        <div class="card-heading">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <div class="medicamento-form">

                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'abreviatura')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'status')->hiddenInput(['value' => Medicamento::STATUS_ACTIVE])->label(false) ?>
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
    </div>
</div>
