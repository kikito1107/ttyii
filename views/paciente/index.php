<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PacienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="card">
    <div class="col-md-12">
        <h4>Listado de pacientes asignados</h4>
        <hr>
    </div>
    <div class="card-body">
        <p>Nota - Recuerda que los pacientes que estan asignados a tu cargo te seleccionaron ellos, por lo cual en cualquier momento pueden cambiar de médico.</p>
        <p>No se puede editar la información personal de un paciente</p>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>NSS</th>
                    <th>Última cita</th>
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
                            <!--< ?= $paciente->nss ? >--> 12345678911
                        </td>
                        <td>
                            <!--< ? = $paciente->nss?>--> 01-01-2017
                        </td>
                        <td>
                            <?= Html::a('<i class="fa fa-eye" aria-hidden="true"></i> Ver detalle',['paciente/view', 'id' => $paciente->id], ['class' => 'btn btn-xs btn-default mb-sm text-inverse'])?>
                            <?= Html::a('<i class="fa fa-pencil" aria-hidden="true"></i> Actualizar', ['paciente/update', 'id'=> $paciente->id], ['class' => 'btn btn-xs btn-default mb-sm text-primary'])?>
                            <?= Html::a('<i class="fa fa-times" aria-hidden="true"></i> Desactivar', ['paciente/activate', 'id' => $paciente->id], ['class' => 'btn btn-xs btn-default mb-sm text-danger'])?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
