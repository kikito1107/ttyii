<!--< ?= var_dump($paciente->getAnos());exit;?>-->

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
        &nbsp;
        <div class="row" style="border: 1px solid black; border-radius: 5px; padding: 5px">
            <p style="width: 20%; border-bottom: 1px solid grey; float: left">Fecha:  </p>
            <p style="width: 25%; border-bottom: 1px solid grey; float: right">Folio: </p>
            <p style="width: 40%; border-bottom: 1px solid grey; clear: both; float: left" class="text-capitalize">Nombre: <?= $paciente->getFullName()?></p>
            <p style="width: 15%; border-bottom: 1px solid grey; float: right">Edad: <?= $paciente->getAnos() ?> años</p>

            <p style="width: 55%; border-bottom: 1px solid grey; clear:both; float: right">Dx: </p>
        </div>


    <br>

        <div class="row" style="padding: 5px; height: 69% ">

            <div style="padding: 5px; width: 75%; height: 68%; float: left">
                <p>Tx: </p>
            </div>

            <div style=" width: 20%; padding: 5px; float: right">
                <p style=" border-bottom: 1px solid grey;  float: right">Peso: </p>
                <p style=" border-bottom: 1px solid grey; clear:both; float: right">Temp: </p>
                <p style=" border-bottom: 1px solid grey; clear:both; float: right">Talla: </p>
                <p style=" border-bottom: 1px solid grey; clear:both; float: right">Fc: </p>

            </div>
        </div>


    <br>

        <div class="row" style="border: 1px solid black; border-radius: 5px; padding: 5px">
            <p style="width: 40%; border-bottom: 1px solid grey; float: left">DR(A): </p>
            <p style="width: 30%; border-bottom: 1px solid grey; float: right">Cédula: </p>
        </div>
    </div>
</div>
