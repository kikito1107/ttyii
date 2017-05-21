<?php

use app\models\Organo;
use app\models\Sintoma;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Sintoma */

$this->title = Yii::t('app', 'Agregar nuevo síntoma');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sintoma-create">
    <div class="card">
        <div class="card-heading">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        Para tener un mejor orden al momento de agregar un nuevo síntoma no olvides que este debe de asociarse
                        a un órgano, esto ayudara bastante cuando una persona indiqué un dolor en alguna parte del cuerpo de
                        manera más exacta. <label class="blue-text">Recuerda que en la medicina homeopática un órgano no necesariamente
                        debe de ser tal cual uno, un órgano también se le puede llamar a alguna parte del cuerpo.</label>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model,'organo_padre')
                        ->dropDownList(ArrayHelper::map(Organo::find()->asArray()->all(), 'id', 'nombre'), [
                            'prompt' => Yii::t( 'app', 'Seleccionar' ),
                            'ng-model' => 'organo_padre'
                        ])?>
                    <?= $form->field($model,'status')->hiddenInput(['value' => Sintoma::STATUS_INACTIVE])->label(false) ?>
                    <div class="row text-center">
                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Agregar') : Yii::t('app', 'Editar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <img src="<?= Url::home()?>img/img-sintomas.jpg" class="img-responsive img-rounded">
                </div>
            </div>
        </div>
    </div>
</div>
