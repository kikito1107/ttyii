<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Organo */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Órganos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organo-view">
    <div class="card">
        <div class="card-heading bg-primary">
            <h4 class="m0 text-capitalize">
                <?= Html::encode($this->title) ?>
                <div class="pull-right">
                    <?= Html::a(Yii::t('app', 'Editar'), ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
                    <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
            </h4>
        </div>
        <div class="card-body">
            <p>

            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
//                    'id',
                    'nombre',
                    'status',
                    'update_date',
                    'create_date',
                ],
            ]) ?>
        </div>
    </div>

</div>
