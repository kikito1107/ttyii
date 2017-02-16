<?php

use app\models\Organo;
use app\models\Sintoma;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Sintoma */

$this->title = Yii::t('app', 'Agregar Síntoma');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Síntomas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sintoma-create">
    <div class="card">
        <div class="card-heading">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <div class="sintoma-form">

                <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">

                        <?= $form->field($model,'organo_padre')
                            ->dropDownList(ArrayHelper::map(Organo::find()->asArray()->all(), 'id', 'nombre'), [
                                'prompt' => Yii::t( 'app', 'Seleccionar' ),
                                'ng-model' => 'organo_padre'
                            ])?>
                        <?= $form->field($model,'status')->hiddenInput(['value' => Sintoma::STATUS_INACTIVE])->label(false) ?>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Agregar') : Yii::t('app', 'Editar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>

                <!--    < ?//= $form->field($model, 'organo')->textInput(['maxlength' => true]) ?>



                <!--    < ?//= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

                <!--    < ?//= $form->field($model, 'update_date')->textInput() ?>
                <!---->
                <!--    < ?//= $form->field($model, 'create_date')->textInput() ?> -->



                <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
