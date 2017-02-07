< ?= //var_dump($paciente->getFullName());exit;?>
<!--<div class="card">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th></th>

                </tr>

            </thead>
        </table>
        alt="Responsive image"
-->

<div class="card">
    <div class="row">
        <div class="col-md-2 pull-left" style="width: 12%">
            <img src="../img/homeo.png" style="width: 180px; height: 150px">
        </div>
        <div class="col-md-3 text-center pull-left" style="width: 60%">
            <p style="font-size: 22px">Instituto Politécnico Nacional</p>
            <p>Sistema Homeopático</p>
            <p>Unidad de médica - Receta individual - consulta online</p>
        </div>
        <div class="col-md-2 pull-right" style="width: 12%;">
            <img src="../img/ipn.png" alt="Responsive image"  style="width: 80px; height: 100px">
        </div>
    </div>
    &nbsp;
    <div class="row" style="border: 1px solid black; border-radius: 5px;padding: 5px">
        <p style="width: 50%; border-bottom: 1px solid grey; float: right">Folio recibido:</p>
        <p style="width: 50%; border-bottom: 1px solid grey; clear: both;" class="text-capitalize">Nombre: <?= $paciente->getFullName()?></p>
        <p>&nbsp;</p>
    </div>
</div>

<div class="card-body">
    <table class="table">
        <thead>
        <tr>
            <th>Historial clinico</th>
            <th></th>
        </tr>
        </thead>
    </table>
</div>