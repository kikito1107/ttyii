<?php

use app\models\Medicamento;
use app\models\Organo;
use app\models\Sintoma;
use app\models\Tratamiento;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Tratamiento */

$this->title = Yii::t('app', 'Asignar tratamiento');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="col-md-12">
        <h4><?= Html::encode($this->title) ?></h4>
        <hr>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <p>
                    El tratamiento es el proceso en donde se involucra un síntoma de los diferentes tipos (Mental, particular o general),
                    a su vez existe uno o más medicamento que lo alivie. Se debe de recordar que la ponderación pueden ser las siguientes:
                    <ul>
                        <li>Muy efectiva – Valor 3</li>
                        <li>Efectiva – Valor 2</li>
                        <li>Poco efectiva – Valor 1</li>
                    </ul>
                    <label class="red-text">
                        Nunca olvide estos criterios para agregar nuevos tratamientos a la base de conocimiento que es el repertorio.
                        <br>Si tiene alguna observación o casa que resaltar existe un campo de llamado descripción en el cual podrá anotar.
                    </label>
                    <label class="blue-text">
                        Existen demasiados tratamientos, cualquier aporte es de gran ayuda para siempre dar mejores resultados.
                    </label>
                </p>
            </div>
        </div>
        <div class="row">
            <?php $form = ActiveForm::begin(); ?>
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

            <?= $form->field($model, 'status')->hiddenInput(['value' => Tratamiento::STATUS_INACTIVE])->label(false) ?>

            <div class="col-md-12">
                <?= $form->field($model, 'descripcion')->textarea() ?>
            </div>

            <div class="col-md-12 text-center">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Agregar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

        <?php ActiveForm::end(); ?>
</div>

