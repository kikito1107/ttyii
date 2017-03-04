<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Citas */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cita'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="cita-view">
    <div class="card">
        <div class="card-heading">
            <h4>
                <?= Html::encode($this->title) ?>
                <?= Html::a(Yii::t('app', 'Editar'), ['update', 'id' => $model->id, 'paciente_id' => $model->paciente_id], ['class' => 'btn btn-primary pull-right']) ?>
            </h4>
        </div>
        <div class="card-body">

        </div>
    </div>
<!--    <p>-->
<!--        --><?//= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id, 'paciente_id' => $model->paciente_id], ['class' => 'btn btn-primary']) ?>
<!--<!--        -->--><?////= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
////            'class' => 'btn btn-danger',
////            'data' => [
////                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
////                'method' => 'post',
////            ],
////        ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'paciente_id',
            'medico_id',
            'dia',
            'hora',
            'update_date',
            'create_date',
            'status',
        ],
    ]) ?>

</div>

