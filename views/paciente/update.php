<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Paciente',
]) . $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pacientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="paciente-update text-capitalize">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
