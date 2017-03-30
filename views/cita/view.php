<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Citas */

//$this->title = $model->name;
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
            <p>Cita creda exitosamente </p>
        </div>
    </div>
</div>

