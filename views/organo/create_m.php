<?php

use app\models\Organo;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Organo */

$this->title = Yii::t('app', 'Agregar órgano al sistema');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ver listado de organos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="organo-create">
    <div class="card">
        <div class="card-heading">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <div class="organo-form">

                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                        <!--            <p class="label bg-info">Recuerda agregar los organos conforme a lo establecido en el repertorio a utilizar para que la forma de asignación sea más facil</p>-->
                        <?= $form->field($model, 'status')->hiddenInput(['value' => Organo::STATUS_INACTIVE])->label(false) ?>
                        <br>
                        <p class="text-center">
                            &nbsp;
                            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Agregar') : Yii::t('app', 'Editar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </p>

                    </div>
                    <div class="text-center">

                    </div>
                </div>
                <!--    < ?//= $form->field($model, 'update_date')->textInput() ?>

                <!--    --< ?//= $form->field($model, 'create_date')->textInput() ?> -->



                <?php ActiveForm::end(); ?>

            </div>

        </div>
    </div>
</div>
