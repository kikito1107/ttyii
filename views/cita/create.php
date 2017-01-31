<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Citas */

$this->title = Yii::t('app', 'Generar cita');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Citas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="citas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id
    ]) ?>

</div>
