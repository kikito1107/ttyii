<?php

use app\models\Medicamento;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Medicamento */

$this->title = Yii::t('app', 'Agregar medicamento');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicamento-create">
    <div class="card">
        <div class="col-md-12">
            <h4><?= Html::encode($this->title) ?></h4>
            <hr>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        Recuerda que actualmente se tienen dados de alta todos los medicamentos
                        que se mencionan en el libro <b>"Un repertorio conciso de medicamentos homeopáticos.
                        Organizado alfabéticamente"</b>,
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'abreviatura')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'status')->hiddenInput(['value' => Medicamento::STATUS_INACTIVE])->label(false) ?>
                    <div class="row text-center">
                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Agregar') : Yii::t('app', 'Editar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <img src="<?= Url::home()?>img/img-medicamentos.jpg" class="img-responsive img-rounded">
                </div>
            </div>
        </div>
    </div>
</div>
