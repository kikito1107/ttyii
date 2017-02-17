<?php

use app\models\Citas;
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

?>
<div class="citas-index">
    <div class="card">
        <div class="card-heading">
            <h5><?= Html::encode($this->title) ?></h5>
        </div>

        <?php if ($citas == null): ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4><?= Yii::t('app', 'No tienes citas pendientes, aquí podras agregar una cita'); ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>
                        <!--< ?= Html::a(Yii::t('app', 'Generar Cita'), ['create', 'id' => $paciente->id], ['class' => 'btn btn-success']) ?>-->
                    </h3>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Tus citas</h4>
                </div>
            </div>
            <div class="row">
                <?php foreach ($citas as $cita): ?>
                    <?= $cita->dia ?>
                    <?= Citas::getHours()[$cita->hora] ?>
                    <?php if($cita->status == Citas::STATUS_PENDING): ?>
                        Aprovación pendiente
                    <?php elseif ($cita->status == Citas::STATUS_CANCEL): ?>
                        Pendiente a que el usuario cambie la fecha
                    <?php else:?>
                        Cita aceptada
                    <?php endif; ?>
                    <hr>
                <?php endforeach; ?>
            </div>

        </div>
        <?php endif; ?>

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