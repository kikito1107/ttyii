<?php

use app\models\Citas;
use app\models\Paciente;
use kartik\date\DatePicker;
use messaging\shared\presenters\MaterialDesignPresenter;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Citas */
/* @var $form yii\widgets\ActiveForm */
$id = (int)$id;
$paciente =  Paciente::find()->where(['id' => $id])->one();

$paciente = $paciente->id;
$medico = 1;

?>

<div class="citas-form">
    <?php if(isset($model->dia)): ?> <span ng-init='dia = "<?= $model->dia ?>"'></span> <?php endif; ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paciente_id')->hiddenInput(['value' => $paciente])->label(false) ?>

    <?= $form->field($model, 'medico_id')->hiddenInput(['value' => $medico])->label(false) ?>

    <div class="row">
        <div class="col-md-5 col-xs-12">
            <div class="ui-datepicker dp-head-danger dp-table-danger shadow-clear fix-width-material-input">
                <?= $form->field($model, 'dia',
                    ['template' => MaterialDesignPresenter::getInputIconTemplate("fa-calendar")])->textInput([
                    'ng-model' => 'dia',
                    'uib-datepicker-popup' => 'dd/MM/yyyy',
                    'is-open' => 'popup.opened',
                    'ng-click' => 'open()',
                    'close-text' => Yii::t('app', 'Cerrar'),
                    'class' => ($model->dia) ? 'ng-dirty fix-width-material-input' : ''
                ]) ?>
            </div>
        </div>

        <div class="col-md-5">
            <?= $form->field($model, 'hora')->dropDownList(Citas::getHours()) ?>
        </div>
    </div>
    <div class="row">
        <p>pruebas</p>
        <?php
            $month = date('m');
            $dia = date('N');
            $mes1 = cal_days_in_month(CAL_GREGORIAN, $month, date('Y')); // 31
            $mes2 = cal_days_in_month(CAL_GREGORIAN, $month+1, date('Y')); // 31
            $mes3 = cal_days_in_month(CAL_GREGORIAN, $month+2, date('Y')); // 31

            $meses = ['Enero', 'Febrero', 'Marzo', 'Abrl', 'Mayo'];
        //echo $mes1 .",".$mes2.", ".$mes3;


        $inicial01 = date('N', strtotime('2017-02-01'));
        //var_dump($inicial01);
        echo '
            <div class="col-md-3">
            <table class="table table-bordered">
                <thead>
                <tr class="blue darken-1"><th class="white-text text-center" colspan="7">'.$meses[$month-1].'</th></tr>
                <tr>
                    <th>D</th>
                    <th>L</th>
                    <th>M</th>
                    <th>M</th>
                    <th>J</th>
                    <th>V</th>
                    <th>S</th>
                </tr>
                </thead>
                <tbody>';
                $k=1;
                for ($i = 1; $i <= 6; $i++){
                    echo '<tr>';
                    for ($j = 1; $j <= 7; $j++){
                        if ($k != 1){
                            echo '<td>'.$k++.'</td>';
                        }else {
                            echo '<td>';
                            if ($j > $inicial01) {
                                echo $k++;
                            }
                            echo '</td>';
                        }
                    }
                    echo '</tr>';
                }
            echo '</tbody>
            </table>
            </div>
        ';

        ?>

    </div>


    <div class="row ">
        <div class="form-group col-md-offset-5">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear cita') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>