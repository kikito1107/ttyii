<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pacientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-view">
    <div class="card">
        <div class="card-heading bg-primary">
            <h4 class="m0 text-capitalize">
                <?= Html::encode($this->title) ?>
                <!--            //= Html::a(Yii::t('app', '<i class="fa fa-plus"></i> Agregar'), ['create'], ['class' => 'pull-right btn btn-danger']) -->
                <!--        //= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>-->
                <?php if($model->status == 1): ?>
                    <?= Html::a(Yii::t('app', '<em class="fa fa-times"></em> Desactivar'), ['activate', 'id' => $model->id, 'status' => false], [
                        'data' => [
                            'confirm' => Yii::t('app', '¿Está seguro de que desea desactivar este elemento?'),
                            'method' => 'post',
                        ],
                        'class'=>'pull-right btn btn-danger',
                    ]) ?>
                <?php else: ?>
                    <?= Html::a(Yii::t('app', '<em class="fa fa-check"></em> Activar'), ['activate', 'id' => $model->id, 'status' => true], [
                        'data' => [
                            'confirm' => Yii::t('app', '¿Está seguro de que desea activar este elemento?'),
                            'method' => 'post',
                        ],
                        'class'=>'pull-right btn btn-danger'
                    ]) ?>
                <?php endif; ?>
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <img src="/img/<?= $model->genero != 0 ?'men.png' :'woman.png' ?>" class="img-circle">
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3">
                            <p><?= '<b>Correo electrónico:</b> '. $model->email; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><?= '<b>Contraseña:</b> '. '</br>**********' ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><?= '<b>Fecha de nacimiento:</b> '. '</br>'.$model->cumple ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><?= '<b>Teléfono celular:</b> '. '</br>'.$model->celular ?></p>
                        </div>
                    </div>
                    &nbsp;
                    <div class="row">
                        <div class="col-md-12">
                            <p><?= '<b>Dirección:</b> '. '</br>'. $model->direccion ?></p>
                        </div>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div class="row">
                        <div class="col-md-4">
                            <p><?= '<b>Número de seguridad social:</b> '. '</br>'. $model->nss ?></p>
                        </div>
                        <div class="col-md-4">
                            <p><?= '<b>Alergias:</b> '. '</br>'. $model->alergias?></p>
                        </div>
                        <div class="col-md-4">
                            <p><?= '<b>Fecha de registro:</b> '. '</br>'. $model->create_date ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
