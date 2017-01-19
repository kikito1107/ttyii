<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sintoma */

$this->title = Yii::t('app', 'Agregar Síntoma');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Síntomas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sintoma-create">
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
