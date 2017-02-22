<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PacienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="card">
    <div class="card-body">
        <p></p>
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="bg-primary">
                    <th colspan="5"><h4>Listado de pacientes asignados</h4></th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>NSS</th>
                    <th>ultima cita</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pacientes as $key => $paciente): ?>
                    <tr>
                        <td>
                            <?= $key+1 ?>
                        </td>
                        <td class="text-capitalize">
                            <?= $paciente->getFullName()?>
                        </td>
                        <td>
                            <?= $paciente->nss?>
                        </td>
                        <td>
                            <?= $paciente->nss?>
                        </td>
                        <td>
                            <?= Html::a(Yii::t('app', '<i class="fa fa-plus"></i> Realizar consulta'), ['consulta/create'], ['class' => 'pull-right btn btn-danger'])?>
                            <?= Html::a(Yii::t('app', '<i class="fa fa-street-view"></i> Ver historial clinico'), ['error'], ['class' => 'pull-right btn btn-danger'])?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
