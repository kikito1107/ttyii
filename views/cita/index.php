<?php

use app\models\Citas;
use app\models\Paciente;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CitasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Citas agendadas');
$this->params['breadcrumbs'][] = $this->title;
$id = \Yii::$app->user->id;
$paciente = Paciente::find()->where(['user_id' => $id])->one();

if(Citas::find()->where(['paciente_id' => $paciente->id ])->one() != null){
    $citas_pendientes = true;
} else {
    $citas_pendientes = false;
}

?>
<div class="citas-index">
    <div class="card">
        <div class="card-heading">
            <h5><?= Html::encode($this->title) ?></h5>
        </div>

        <?php if ($citas_pendientes == false): ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4><?= Yii::t('app', 'No tienes citas pendientes, aquí podras agregar una cita'); ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>
                        <?= Html::a(Yii::t('app', 'Generar Cita'), ['create', 'id' => $paciente->id], ['class' => 'btn btn-success']) ?>
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
                <div class="col-md-6 col-md-offset-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Día</th>
                                <th>Hora</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= date_format(date_create($model->dia) ,'d-M-y') ?></td>
                                <td><?= Citas::getHours()[$model->hora]?></td>
                                <?php if ($model->status == 1): ?>
                                    <td><?= Yii::t('app', 'Pendiente') ?></td>
                                <?php elseif ($model->status == 2): ?>
                                    <td><?= Yii::t('app', 'Cancelado') ?></td>
                                <?php else: ?>
                                    <td><?= Yii::t('app', 'Aprovado') ?></td>
                                <?php endif; ?>
                                <td>
                                    <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['delete', 'id' => $model->id]),['data-method' => 'post'])?>
                                    <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['update', 'id' => $model->id,'paciente_id' => $paciente->id]),['data-method' => 'post'])?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <?php endif; ?>
    </div>
</div>