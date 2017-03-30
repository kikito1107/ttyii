<?php
/**
 * Created by PhpStorm.
 * User: saul
 * Date: 22/02/17
 * Time: 10:18
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="card" ng-controller="MainController">
    <?php if(isset($model->peso)): ?> <span ng-init='peso = "<?= $model->peso ?>"'></span> <?php endif; ?>
    <?php if(isset($model->estatura)): ?> <span ng-init='estatura = "<?= $model->estatura?>"'></span> <?php endif; ?>
    <div class="card-heading">
        <h4>Consulta de <b class="text-capitalize"><?= $paciente->getFullName()?></b></h4>
        <p class="pull-right">Hora y fecha de incio de la consulta <b><?= date('d-m-y H:m:s')?></b></p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <h5>Información general del pacinete</h5>
            </div>
        </div>
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'paciente_id')->hiddenInput(['value' => $paciente->id])->label(false) ?>
        <div class="row">
            <div class="col-md-2">
                <?= $form->field($model, 'peso')->textInput(['maxlength' => true, 'ng-model' => 'peso',])->label('Peso kg') ?>
                <?= $form->field($model, 'estatura')->textInput(['maxlength' => true, 'ng-model' => 'estatura',])->label('Estatura m') ?>
            </div>
            <div class="col-md-2">
                <b>índice de masa corporal (IMC)</b><br>
                {{ (peso/(estatura*estatura)) | number:2}}
            </div>
            <div class="col-md-8">
                <table class=" table-bordered table-hover">
                    <thead>
                        <tr class="teal white-text">
                            <th>IMC</th>
                            <th>Clasificación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-class="{true: 'green darken-1 white-text', false: ''}[peso/(estatura*estatura) < 18]">
                            <td>Menor a 18</td>
                            <td>Peso bajo. Necesario valorar signos de desnutrición</td>
                        </tr>
                        <tr ng-class="{true: 'green darken-1 white-text', false: ''}[peso/(estatura*estatura) < 24.9 && peso/(estatura*estatura) >18 ]">
                            <td>18 a 24.9</td>
                            <td>Normal</td>
                        </tr>
                        <tr ng-class="{true: 'red darken-1 white-text', false: ''}[peso/(estatura*estatura) < 26.9 && peso/(estatura*estatura) >25 ]">
                            <td>25 a 26.9</td>
                            <td>Sobrepeso</td>
                        </tr>
                        <tr ng-class="{true: 'red darken-1 white-text', false: ''}[peso/(estatura*estatura) < 29.9 && peso/(estatura*estatura) >27 ]">
                            <td>27 a 29.9</td>
                            <td>Obesidad grado I.
<!--                                Riesgo relativo alto para desarrollar enfermedades cardiovasculares-->
                            </td>
                        </tr>
                        <tr ng-class="{true: 'red darken-1 white-text', false: ''}[peso/(estatura*estatura) < 39.9 && peso/(estatura*estatura) >30 ]">
                            <td>30 a 39.9</td>
                            <td>Obesidad grado II.
<!--                                Riesgo relativo muy alto para el desarrollo de enfermedades cardiovasculares-->
                            </td>
                        </tr>
                        <tr ng-class="{true: 'red darken-1 white-text', false: ''}[peso/(estatura*estatura) >40.0]">
                            <td>Mayor a 40</td>
                            <td> Obesidad grado III Extrema o Mórbida.
<!--                                Riesgo relativo extremadamente alto para el desarrollo de enfermedades cardiovasculares-->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-2">
                <?= $form->field($model, 'temperatura')->textInput(['maxlength' => true])->label('Temperatura ºC') ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'frecCardi')->textInput(['maxlength' => true])->label('Frecuencia cardíaca fc') ?>
            </div>
            <div class="col-md-2" ng-show=" 2 == '<?= $paciente->genero ?>'">
                <?= $form->field($model, 'menstruacion')->radioList([1 =>'Si', 2=>'No'],['maxlength' => true]) ?>
            </div>
            <div >
                <?= $form->field($model, 'paciente_id')->hiddenInput(['value' => $paciente->id])->label(false) ?>
                <?= $form->field($model, 'medico_id')->hiddenInput(['value' => $paciente->medico_id])->label(false) ?>
            </div>
        </div>
        <div class="row text-center">
<!--            --><?//= Html::submitButton( Yii::t('app', 'Actualizar datos y seguir con la repertorización') , ['class' => 'btn btn-success ',]) ?>
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '<i class="fa fa-floppy-o"></i> Actualizar datos y seguir con la repertorización') : Yii::t('app', '<i class="fa fa-pencil-square-o"></i> Actualizar datos y seguir con la repertorización'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
