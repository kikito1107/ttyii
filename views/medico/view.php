<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Medico */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Medicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="medico-view">

    <div class="jumbotron">
        <h4>Registro exitoso</h4>
        <div class="row">
            <div class="col-md-2">
                <img src="/img/medico.png" style="height: 250px; width: 200px">
            </div>
            <div class="col-md-3"> 
                <ul>
                    <li>
                        <p><?= $model->username?></p>
                    </li>
                    <li>
                        <p><?= $model->email?></p>
                    </li>
                </ul>
            </div>
        </div>
        <p>
            <?= Html::a(Yii::t('app', 'Actualizar'), ['update-m', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--            --><?//= Html::a(Yii::t('app', 'Desactivar'), ['delete', 'id' => $model->id], [
//                'class' => 'btn btn-danger',
//                'data' => [
//                    'confirm' => Yii::t('app', '¿Estas seguro que quieres desactivar este elemento?'),
//                    'method' => 'post',
//                ],
//            ]) ?>
        </p>
    </div>

<!--    --><?//= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'user_id',
//            'nombre',
//            'paterno',
//            'materno',
//            'genero',
//            'cumple',
//            'direccion',
//            'telefono',
//            'celular',
//            'email:email',
//            'password',
//            'image_Photo',
//            'status',
//            'user_type',
//            'update_date',
//            'create_date',
//            'cedula',
//            'escuela',
//            'especialidad',
//            'descripcion:ntext',
//        ],
//    ]) ?>

</div>
