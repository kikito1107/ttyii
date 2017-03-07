<?php

use app\models\Citas;
use app\models\Paciente;
use messaging\shared\presenters\MaterialDesignPresenter;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Citas */
/* @var $form yii\widgets\ActiveForm */
$id = (int)$id;
$paciente =  Paciente::find()->where(['id' => $id])->one();
$month = date('m');

$months = ['Enero', 'Febrero', 'Marzo', 'Abrl', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

$meses = array(
    array(
        'name' => $months[$month-1],
        'duration' => cal_days_in_month(CAL_GREGORIAN, $month, date('Y')),
        'inition' => date('N', strtotime(date('Y-'.$month.'-01'))),
        'day' => date('d')
    ),

    array(
        'name' => $months[(int) $month],
        'duration' => cal_days_in_month(CAL_GREGORIAN, $month+1, date('Y')),
        'inition' => date('N', strtotime(date('Y-'.($month+1).'-01')))
    ),

    array(
        'name' => $months[$month+1],
        'duration' => cal_days_in_month(CAL_GREGORIAN, $month+2, date('Y')),
        'inition' => date('N', strtotime(date('Y-'.($month+2).'-01')))
    )
);

?>

<div class="citas-form" ng-controller="MainController">
    <?php if(isset($model->dia)): ?> <span ng-init='dia = "<?= $model->dia ?>"'></span> <?php endif; ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paciente_id')->hiddenInput(['value' => $paciente->id])->label(false) ?>

    <?= $form->field($model, 'medico_id')->hiddenInput(['value' => $paciente->medico_id])->label(false) ?>

    <div class="row">
        <div class="col-md-5 col-xs-12">
            <div class="ui-datepicker dp-head-danger dp-table-danger shadow-clear fix-width-material-input">
                <?= $form->field($model, 'dia',
                    ['template' => MaterialDesignPresenter::getInputIconTemplate("fa-calendar")])->textInput([
                    'ng-model' => 'dia',
                    'min-date'=>"minDate",
                    'uib-datepicker-popup' => 'dd/MM/yyyy',
                    'is-open' => 'popup.opened',
                    'ng-click' => 'open()',
                    'close-text' => Yii::t('app', 'Cerrar'),
                    'class' => ($model->dia) ? 'ng-dirty fix-width-material-input' : ''
                ]) ?>
            </div>
        </div>
        <span ng-init="dia"></span>
        <div class="col-md-5">
            <?= $form->field($model, 'hora')->dropDownList(Citas::getHours()) ?>
        </div>
    </div>
    <div class="row">
        <?php foreach ($meses as $mes): ?>
        <div class="col-md-4">
            <table class="table table-bordered">
                <thead>
                <tr class="blue darken-1"><th class="white-text text-center" colspan="7"><?= $mes['name']?></th></tr>
                <tr>
                    <th>D</th>
                    <th>L</th>
                    <th>M</th>
                    <th>X</th>
                    <th>J</th>
                    <th>V</th>
                    <th>S</th>
                </tr>
                </thead>
                <tbody>
                    <?php $k = 1; ?>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <tr>
                        <?php for ($j = 1; $j <= 7; $j++): ?>
                            <?php if ($k != 1): ?>
                                <?php if ($k > $mes['duration']): ?>
                                    <td></td>
                                <?php else: ?>
                                    <td class="td-corrida" <?= isset($mes['day']) && $mes['day'] == $k ? 'style="color: white !important;font-weight: 700;background: #009688;text-align: center;"': 'styele=""' ?>>
                                        <a style="color:black;background: transparent;border: 0;width: auto;position: absolute;" disabled="<?= isset($mes['day']) && $k < $mes['day'] ?>" ng-click="dia = '<?= $k ."-". $mes["name"]."-".date("Y")?>'"><?= $k++ ?></a>
                                    </td>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if ($j > $mes['inition']): ?>
                                    <td class="" <?= isset($mes['day']) && $mes['day'] == $k ? 'style="color: white !important;font-weight: 700;background: #009688;text-align: center;"': 'styele=""' ?>>
                                        <a style="color:black;background: transparent;border: 0;width: auto;position: absolute;" ><?= $k++ ?></a>
<!--                                        --><?//= Html::a($k,[\yii\helpers\Url::base()], ['ng-click' => '', 'styele' => '', 'disabled' => 'disabled']) ?>
                                    </td>
                                <?php else: ?>
                                    <td></td>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </tr>
                    <?php endfor; ?>
                    <?php if ($k <= $mes['duration']): ?>
                        <td class="td-corrida" <?= isset($mes['day']) && $mes['day'] == $k ? 'style="color: white !important;font-weight: 700;background: #009688;text-align: center;"': 'styele=""' ?>><?= $k++ ?></td>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php endforeach; ?>
    </div>
    {{dia}}

    <div class="row ">
        <div class="form-group col-md-offset-5">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear cita') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>