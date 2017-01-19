<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PacienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pacientes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-index">
    <div class="card">
    <div class="card-heading bg-primary">
        <h4 class="m0 text-capitalize">
            <?= Html::encode($this->title) ?>
<!--            --><?//= Html::a(Yii::t('app', '<i class="fa fa-plus"></i> Agregar'), ['create'], ['class' => 'pull-right btn btn-danger']) ?>
        </h4>
    </div>
    <div class="card-body">
        <p></p>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'user_id',
            'nombre',
//            'paterno',
//            'materno',
            // 'genero',
            // 'cumple',
            // 'direccion',
            // 'telefono',
             'celular',
             'email:email',
            // 'password',
            // 'image_Photo',
             'status',
            // 'user_type',
            // 'update_date',
             'create_date',
            // 'nss',
            // 'alergias:ntext',
            // 'notificaciones',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
