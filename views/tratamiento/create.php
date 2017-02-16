<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tratamiento */

$this->title = Yii::t('app', 'Create Tratamiento');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tratamientos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tratamiento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
