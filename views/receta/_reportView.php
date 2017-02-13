<?= var_dump($paciente->getAnos());exit;?>

<div class="contenedor" style="height: 100%">

    <div class="card">
        <div class="row">
            <div class="col-md-2 pull-left" style="width: 12%">
                <img src="../img/homeo.png" style="width: 180px; height: 150px">
            </div>
            <div class="col-md-3 text-center pull-left" style="width: 60%">
                <p style="font-size: 22px">Instituto Politécnico Nacional</p>
                <p>Sistema Homeopático</p>
                <p>Unidad de médica - Receta individual - Consulta en Linea</p>
            </div>
            <div class="col-md-2 pull-right" style="width: 12%;">
                <img src="../img/ipn.png" alt="Responsive image"  style="width: 80px; height: 100px">
            </div>
        </div>
        &nbsp;
        <div class="row" style="border: 1px solid black; border-radius: 5px; padding: 5px">
            <p style="width: 30%; border-bottom: 1px solid grey; float: right">Folio: </p>
            <p style="width: 40%; border-bottom: 1px solid grey; clear: both; float: left" class="text-capitalize">Nombre: <?= $paciente->getFullName()?></p>
            <p style="width: 30%; border-bottom: 1px solid grey; float: right">Edad: <?= $paciente->getAnos() ?></p>
            <p style="width: 20%; border-bottom: 1px solid grey; clear:both; float: left">Peso: </p>
            <p style="width: 20%; border-bottom: 1px solid grey; clear:both; float: left">Estatura: </p>

            <p style="width: 25%; border-bottom: 1px solid grey; clear:both; float: right">Dx: </p>
        </div>
    </div>
<br>
    <div class="row" style="padding: 5px; margin-bottom: 525px ">
        <table class="table">
            <thead>
            <tr>
                <th>Historial clinico</th>
                <th> Fecha</th>
            </tr>
            <tr>
                <td>Tx-Tratamiento</td>
                <td>El tratamiento es.. LOREM</td>
            </tr>
            </thead>
        </table>
    </div>
<br>
    <div class="row" style="border: 1px solid black; border-radius: 5px; padding: 5px">
        <p style="width: 40%; border-bottom: 1px solid grey; float: left">DR(A): </p>
        <p style="width: 30%; border-bottom: 1px solid grey; float: right">Cédula: </p>
    </div>
</div>