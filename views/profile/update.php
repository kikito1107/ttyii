<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = Yii::t('app', 'Editar usuario: ', [
    'modelClass' => 'Profile',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editar');
?>
<div class="profile-update">
    <div class="card card-default">
        <div class="card-heading bg-primary">
            <h4 class="m0 text-capitalize">
                <?= Html::encode($this->title) ?>
            </h4>
        </div>
        <div class="card-body">
            <?= $this->render('_update_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
