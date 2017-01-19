<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Medico */

$this->title = Yii::t('app', 'Agregar nueva cuenta para médico');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Medicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-offset-2 col-md-8 ">
    <div class="card">
        <div class="card-heading bg-primary">
            <h4 class="m0 ">
                <?= Html::encode($this->title) ?>
            </h4>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
