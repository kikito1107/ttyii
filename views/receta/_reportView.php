<!--< ?= var_dump($paciente->getAnos());exit;?>-->
<?php use app\models\Medico;
use app\models\Somatometria;

$sometria = Somatometria::find()->where(['paciente_id' => $paciente->id])->one();
$medico = Medico::find()->where(['id' => $paciente->medico_id])->one()?>
<div class="contenedor" style="height: 100%">

    <div class="card">
        <div class="row">
            <div class="col-md-2 pull-left" style="width: 12%">
                <img src="../img/homeo2.png" style="width: 150%">
            </div>
            <div class="col-md-3 text-center pull-left" style="width: 60%">
                <p style="font-size: 22px">Instituto Politécnico Nacional</p>
                <p>Sistema Homeopático</p>
                <p>Unidad de médica - Receta individual - Consulta en Línea</p>
            </div>
            <div class="col-md-2 pull-right" style="width: 9%;">
                <img src="../img/ipn.png" alt="Responsive image"  style="width: 80px; height: 100px">
            </div>
        </div>
        &nbsp;<div class="row" style="border: 1px solid black; border-radius: 5px; padding: 5px">
            <p style="width: 40%; border-bottom: 1px solid grey; float: left">DR(A): <span class="text-capitalize"><?= $medico->getFullName()?></span></p>
            <p style="width: 30%; border-bottom: 1px solid grey; float: right">Cédula: <?= $medico->cedula?></p>
        </div>
        <div class="row" style="border: 1px solid black; border-radius: 5px; padding: 5px;margin-top: 5px">
            <p style="width: 20%; border-bottom: 1px solid grey; float: left">Fecha:  <?= date('d-M-Y')?></p>
            <p style="width: 25%; border-bottom: 1px solid grey; float: right">Folio: <?= str_pad( $paciente->id, 5, "0", STR_PAD_LEFT );?></p>
            <p style="width: 40%; border-bottom: 1px solid grey; clear: both; float: left" class="text-capitalize">Nombre: <?= $paciente->getFullName()?></p>
            <p style="width: 15%; border-bottom: 1px solid grey; float: right">Edad: <?= $paciente->getAnos() ?> años</p>
        </div>
        <div class="row" style="border: 1px solid black; border-radius: 5px; padding: 5px;margin-top: 5px">
            <p style="width: 55%; border-bottom: 1px solid grey; clear:both; float: right">Dx: </p>
        </div>

        <br>
        <div class="row" style="padding: 5px;">
            <div style="padding: 5px; width: 75%; height: 68%; float: left">
                <p>Tx: </p>
            </div>
            <div style=" width: 20%; padding: 5px; float: right">
                <p style=" border-bottom: 1px solid grey;  float: right">Peso: <?= $sometria->peso?> Kg</p>
                <p style=" border-bottom: 1px solid grey; clear:both; float: right">Estatura: <?= $sometria->estatura?> m</p>
                <p style=" border-bottom: 1px solid grey; clear:both; float: right">Temp: <?= $sometria->temperatura?> ºC</p>
                <p style=" border-bottom: 1px solid grey; clear:both; float: right">Fc: <?= $sometria->frecCardi?></p>
            </div>
        </div>
        <br>
    </div>
</div>
