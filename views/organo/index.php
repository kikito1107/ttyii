<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrganoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Listado de órganos');

?>
<div class="organo-index">
    <div class="card">
        <div class="card-heading">
            <h4>
                <?= Html::encode($this->title) ?>
                <?= Html::a(Yii::t('app', 'Agregar nuevo organo'), ['create'], ['class' => 'btn btn-success pull-right']) ?>
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
        //                'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

        //                    'id',
                            'nombre',
        //                    'update_date',
        //                    'create_date',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


</div>
