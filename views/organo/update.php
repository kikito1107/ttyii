<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Organo */

$this->title = Yii::t('app', 'Editar ', [
    'modelClass' => 'Órgano',
]) . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editar');
?>
<div class="organo-update">
    <div class="card">
        <div class="card-heading">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
