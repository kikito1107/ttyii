<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Organo */

$this->title = Yii::t('app', 'Agregar órgano al sistema');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ver listado de organos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organo-create">
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
