<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Citas */

$this->title = Yii::t('app', 'Cambiar fecha de la cita', [
    'modelClass' => 'Cita',
]) ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Citas'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="citas-update">
    <div class="card">
        <div class="card-heading">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
                'id' => $id
            ]) ?>
        </div>
    </div>
</div>
