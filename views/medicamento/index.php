<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MedicamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Medicamentos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicamento-index">
    <div class="card">
        <div class="card-heading">
            <h3><?= Html::encode($this->title) ?>
                    <?= Html::a(Yii::t('app', 'Agregar medicamento'), ['create'], ['class' => 'btn btn-success pull-right']) ?>
            </h3>
        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
//            'id',
                    'nombre',
                    'abreviatura',
//            'descripcion',
//            'update_date',
                    // 'create_date',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



</div>
