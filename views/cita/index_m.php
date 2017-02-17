<?php

use app\models\Citas;
use app\models\Medico;
use app\models\Paciente;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CitasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//var_dump($citas);exit;
$this->title = Yii::t('app', 'Citas agendadas');
$this->params['breadcrumbs'][] = $this->title;
//var_dump($medico)
/*$medico = Medico::find()->where(['user_id' => $id])->one();
if(Citas::find()->where(['medico_id' => $medico->id ])->one() != null){
    $pendientes = true;
} else {
    $pendientes = false;
}*/

?>
<div class="citas-index">
    <div class="card">
        <div class="card-heading">
            <h5><?= Html::encode($this->title) ?></h5>
        </div>

        <?php if ($pendientes == null && $aprobadas == null): ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4><?= Yii::t('app', 'No tienes citas pendientes, aquí podras agregar una cita'); ?></h4>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12 text-center">
                    <h3>
                        <?= Html::a(Yii::t('app', 'Generar Cita'), ['/citas/create-m', 'id' => \Yii::$app->user->getId()], ['class' => 'btn btn-success']) ?>
                    </h3>
                </div>
            </div>
        </div>

        <?php else: ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <h4>Tus citas pendientes</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Pendiente</th>
                                </tr>
                            </thead>

                            <tr>

                                <?php foreach ($pendientes as $pendiente): ?>
                                <td>
                                    <?= $pendiente->dia ?>
                                </td>
                                <td>
                                    <?= Citas::getHours()[$pendiente->hora] ?>
                                </td>
                                <td>
                                    <?php if($pendiente->status == Citas::STATUS_PENDING): ?>
                                        <i class="fa fa-check" aria-hidden="true"></i> Activar
                                        <br>
                                        <i class="fa fa-times" aria-hidden="true"></i> Descativar
                                </td>
                            </tr>
                                    <?php elseif ($pendiente->status == Citas::STATUS_CANCEL): ?>
                                        <p>Pendiente a que el usuario cambie la fecha</p>
                                    <!--< ?php else:?>
                                    <!--Cita aceptada-->
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                        </table>

                </div>

                <div class="col-md-4 text-center col-md-offset-4">
                    <h4>Tus citas Aprobadas</h4>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Aprovadas</th>
                        </tr>
                        </thead>

                        <tr>

                            <?php foreach ($aprobadas as $aprobada): ?>
                            <td>
                                <?= $aprobada->dia ?>
                            </td>
                            <td>
                                <?= Citas::getHours()[$aprobada->hora] ?>
                            </td>
                            <td>
                                <?php if($aprobada->status == Citas::STATUS_APROVED): ?>
                                <i class="fa fa-check" aria-hidden="true"></i> Activar
                                <br>
                                <i class="fa fa-times" aria-hidden="true"></i> Descativar
                            </td>
                        </tr>
                        <!--< ?php elseif ($pendiente->status == Citas::STATUS_CANCEL): ?>-->
                        <!--Pendiente a que el usuario cambie la fecha
                        <!--< ?php else:?>-->
                        <!--Cita aceptada-->
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>

            </div>
        </div>
        <?php endif; ?>

        <div class=" text-center">
            <h3>
                <?= Html::a(Yii::t('app', 'Generar Cita'), ['/citas/create-m', 'id' => \Yii::$app->user->getId()], ['class' => 'btn btn-success']) ?>
            </h3>
        </div>

        <mwl-calendar
            view="calendarView"
            view-date="viewDate"
            events="events"
            view-title="calendarTitle"
            on-event-click="eventClicked(calendarEvent)"
            on-event-times-changed="calendarEvent.startsAt = calendarNewEventStart; calendarEvent.endsAt = calendarNewEventEnd"
            cell-is-open="true">
        </mwl-calendar>
    </div>
</div>