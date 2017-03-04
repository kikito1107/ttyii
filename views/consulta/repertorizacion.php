<?php
/**
 * Created by PhpStorm.
 * User: saul
 * Date: 24/02/17
 * Time: 08:26
 */
use app\models\Medicamento;
use app\models\Sintoma;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$sintomas = Sintoma::find()->all();
$medicamentos = Medicamento::find()->all();
?>
<div class="card" ng-controller="RoutesController">
    <div class="card-heading">
        <h5><b class="teal-text">Consulta del paciente:</b> <span class="text-capitalize"><?= $paciente->getFullName()?></span></h5>
    </div>
    <hr class="teal">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">
        <h6>
            Que tipo de repertorización se llevara a cabo
            <a href="" ng-click="comun = true;experta = false" class="btn btn-primary">Consulta tradicional</a>
            <a href="" ng-click="experta = true;comun = false" class="btn btn-danger">Repertorización </a>
        </h6>
        <hr>
        <div ng-show="comun == true" >
            <div class="row">
                <div class="col-md-6">
                    <h6>Seleccione los sintomas que presenta el paciente</h6>
                    <div class="col-md-7">
                        <?= $form->field($model, 'sintoma')->dropDownList(ArrayHelper::map(Sintoma::find()->asArray()->all(), 'id', 'nombre'), [
                            'prompt' => Yii::t( 'app', 'Seleccionar' ),
                            'ng-model' =>'sintoma'])->label('Síntomas') ?>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger mv " ng-disabled="!sintoma" ng-click="setElement()"><?= Yii::t('app','Agregar')?></button>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6>Seleccione el o los medicamentos a suministrar</h6>
                    <div class="col-md-7">
                        <?= $form->field($model, 'medicamento')->dropDownList(ArrayHelper::map(Medicamento::find()->asArray()->all(), 'id', 'nombre'), [
                            'prompt' => Yii::t( 'app', 'Seleccionar' ),
                            'ng-model' =>'medicamento'])->label('Medicamentos') ?>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger mv " ng-disabled="!medicamento" ng-click="setElementM()"><?= Yii::t('app','Agregar')?></button>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <ol>
                        <li ng-repeat="(index, check) in sintomasCollection">
                            <?php foreach ($sintomas as $sintoma): ?>
                                <p ng-show="check.sintoma == '<?= $sintoma->id?>'"
                                >
                                    <?= $sintoma->nombre ?>
                                    <span class="glyphicon glyphicon-remove" ng-click="deleteCorrida(index)" style="margin-left: 10px;">
                                </p>
                            <?php endforeach; ?>
                        </li>
                    </ol>
                </div>
                <div class="col-md-6">
                    <ol>
                        <li ng-repeat="(index, medi) in medicamentosCollection">
                            <?php foreach ($medicamentos as $medicamento): ?>
                                <p ng-show="medi.medicamento == '<?= $medicamento->id?>'"
                                >
                                    <?= $medicamento->nombre ?>
                                    <span class="glyphicon glyphicon-remove" ng-click="deleteMedicamento(index)" style="margin-left: 10px;">
                                </p>
                            <?php endforeach; ?>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" ng-show="sintomasCollection.length >0 && medicamentosCollection.length > 0">
<!--                    <h6>Tratamiento a seguir</h6>-->
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center">Tratamiento a seguir</th>
                                    </tr>
                                    <tr>
                                        <th>Síntoma</th>
                                        <th>Medicamentos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="(index, check) in sintomasCollection">
                                    <td>
                                        <?php foreach ($sintomas as $sintoma): ?>
                                            <p ng-show="check.sintoma == '<?= $sintoma->id?>'">
                                                <?= $sintoma->nombre ?>
<!--                                                <span class="glyphicon glyphicon-remove" ng-click="deleteCorrida(index)" style="margin-left: 10px;">-->
                                            </p>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <ol>
                                            <li ng-repeat="(index, medi) in medicamentosCollection">
                                                <?php foreach ($medicamentos as $medicamento): ?>
                                                    <p ng-show="medi.medicamento == '<?= $medicamento->id?>'">
                                                        <?= $medicamento->nombre ?>
                                                        <input class="form-control" type="text">
                                                    </p>
                                                <?php endforeach; ?>
                                            </li>
                                        </ol>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" ng-show="experta == true">
            experta
        </div>
        <div class="row">
            <div class="col-md-1" ng-show="sintoma">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar modelo') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
