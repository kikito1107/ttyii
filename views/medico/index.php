<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MedicoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Listado de médicos');
/**var_dump(sizeof($frase))**/
?>
<div class="medico-index">
        <h4 class="m0 text-capitalize">
            <?= Html::encode($this->title) ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-plus"></i> Agregar nueva cuenta'), ['create', 'id' =>1, 'username'=>'dd'], ['class' => 'pull-right btn btn-danger']) ?>
        </h4>
        </div>

        <div class="card-body white">
            <p>
            </p>
<!--            --><?//= var_dump($medicos)?>
            <table>
                <thead>
                    <tr class="bg-primary">
                        <th></th>
                    </tr>
                </thead >
                <tbody style="width: 12%">
                    <tr></tr>
                </tbody>
            </table>
<!--            --><?php //foreach (): ?>
<!--            --><?php //endforeach; ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    //'user_id',
                    'username',
//                    'paterno',
//                    'materno',
                    //'genero',
//                    'cumple',
                    //'direccion',
//                    'telefono',
//                    'celular',
                    'email:email',
                    //'password',
                    //'image_Photo',
                    'status',
                    //'user_type',
                    //'update_date',
                    'create_date',
//                    'cedula',
                    //'escuela',
//                    'especialidad',
                    //'descripcion:ntext',
                ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {status}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<i class="fa fa-eye" aria-hidden="true"></i> Ver detalle',
                            Url::to(['view', 'id' => $model->id]), [
                                'data-pjax' => 0,
                                'aria-label' => 'Ver detalle',
                                'title' => 'Ver detalle',
                                'class' => 'btn btn-xs btn-default mb-sm text-inverse'
                            ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<i class="fa fa-pencil" aria-hidden="true"></i> Actualizar',
                            Url::to(['update', 'id' => $model->id]), [
                                'data-pjax' => 0,
                                'aria-label' => 'Actualizar',
                                'title' => 'Actualizar',
                                'class' => 'btn btn-xs btn-default mb-sm text-primary'
                            ]);
                    },
                    'status' => function ($url, $model) {
                        if($model->status == 1) {
                            return Html::a('<i class="fa fa-times" aria-hidden="true"></i> Desactivar',
                                Url::to(['activate', 'id' => $model->id, 'status' => 0]), [
                                    'data-pjax' => 0,
                                    'aria-label' => 'Desactivar',
                                    'title' => 'Desactivar',
                                    'class' => 'btn btn-xs btn-default mb-sm text-danger',
                                    'data-confirm' => '¿Está seguro de desactivar este elemento?',
                                    'data-method' => 'post'
                                ]);
                        } else {
                            return Html::a('<i class="fa fa-check" aria-hidden="true"></i> Activar',
                                Url::to(['activate', 'id' => $model->id, 'status' => 1]), [
                                        'data-pjax' => 0,
                                    'aria-label' => 'Activar',
                                    'title' => 'Activar',
                                    'class' => 'btn btn-xs btn-default mb-sm text-success',
                                    'data-confirm' => '¿Está seguro de activar este elemento?',
                                    'data-method' => 'post'
                                ]);
                        }
                    }
                ],
            ],
        ],
    ]); ?>
</div>
