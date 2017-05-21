<?php
/**
 * Created by PhpStorm.
 * User: saul
 * Date: 18/05/17
 * Time: 10:52
 */
use app\models\Medico;
use app\models\Paciente;
use yii\bootstrap\Html;
use yii\helpers\Url;
$paciente = Paciente::find(['user_id' => \Yii::$app->user->getId()])->one();
$id = $paciente->medico_id;
$id_pac = $paciente->id;
if ($id != null) {
    $med = Medico::findOne(['id' => $id])->getFullName();
}
//var_dump($success);exit;
?>

<?php if ($success ==1001 ): ?>
    <div class="content-heading" ng-hide="content == true">
        <div class="row">
            <div class="col-md-12 bg-success">
                <h6>
                    Se ha actualizado correctamente tu médico.
                    <button class="btn bg-transparent pull-right" ng-click="content = true"><i class="fa fa-close"></i></button>
                </h6>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="card">
    <div class="card-body bg-primary">
    <div class="row">
<!--    <div class="col-md-12 ">-->
        <h5 style="margin: 4px">Selección de médico.</h5>
<!--    </div>-->
    </div>
    </div>
    <div class="card-body">
        <ul>
            <li>
                <b><p class="red-text">
                    Médico seleccionado: <?= ($med != null)? '<label class="text-capitalize">'.$med.'</label>':'Aun no se ha seleccionado un médico.';?>
                </p></b>
            </li>
            <li>
                <p>Recuerda que en cualquier momento puedes seleccionar aun médico para que sea el encargado de realizar tus consultas.</p>
            </li>
            <li>
                <p>A continuación te vamos a proporcionar el listado de los médicos con la información de interes, que te ayudara a tomar la mejor decisión.</p>
            </li>
        </ul>
        <?php foreach ($medicos as $medico): ?>
        <p>&nbsp;</p>
        <div class="row table-bordered">
            <div class="col-md-2 text-center">
                &nbsp;
                <img src="<?= Url::base().'/img/homeo.png'?>" class="img-responsive img-rounded light-blue darken-3" style="width: 200px;height: 200px;" alt="foto">
            </div>
            <div class="col-md-10">
                &nbsp;
                <table class="table table-bordered">
                    <tr">
                    <td  class="light-blue darken-3" colspan="9">
                        <h6 class="text-capitalize white-text">
                            <?= $medico->nombre.' '.$medico->paterno.' '.$medico->materno?>
                        </h6>
                    </td>
                        <td rowspan="4">
                            <?php if ($medico->id != $id):?>
<!--                                <button class="btn btn-danger">asignar</button>-->
                                <?= Html::a('Seleccionar', Url::to(['selectmedico','id' =>$id_pac ,'medico_id' => $medico->id]), ['class' => 'btn btn-danger']) ?>
                            <?php else: ?>
                                <button class="btn btn-primary disabled">Seleccionado</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="blue lighten-2">Escuela</td>
                        <td colspan="2"><?= $medico->escuela?></td>
                        <td class="blue lighten-2">Especialidad</td>
                        <td colspan="2"><?= $medico->especialidad?></td>
                        <td class="blue lighten-2">Cedula profesional</td>
                        <td colspan="2"><?= $medico->cedula?></td>
                    </tr>
                    <tr>
                        <td class="blue lighten-2" >Descripción</td>
                        <td colspan="8" rowspan="2">
                            <?= $medico->descripcion?>
                        </td>
                    </tr>
                    <tr><td></td></tr>
                </table>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
