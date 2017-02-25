<?php
/* @var $this yii\web\View */
//var_dump($sintomas);
//var_dump($organos);
?>
<div class="card">
    <div class="card-heading">
        <h5>Alerta de notificaciones</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6" style="padding-bottom: 100px">
                <ul style="list-style: none;height: 580px;overflow: auto;">
                    <?php foreach ($organos as $organo): ?>
                        <li  class="col-md-12" style="border: 2px solid #08464e;margin-bottom: 5px;background: #dcdada;">
                            <h6 style="margin: 8px 0px;border-bottom: 2px solid;">Notificación -
                                <span class="label label-danger">Repertorio - órgano</span>
                                <a href="" class="disabled pull-right">Aprobar</a>
                            </h6>
                            <div class="row" style="height: 65px">
                                <div class="col-md-12">
                                    Se agrego un nuevo órgano
                                    <br><b><?= $organo->nombre ?></b>
                                    <br> Con la fecha de <?= $organo->create_date ?>

                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <?php foreach ($sintomas as $sintoma): ?>
                        <li  class="col-md-12" style="border: 2px solid #08464e;margin-bottom: 5px;background: #dcdada;">
                            <h6 style="margin: 8px 0px;border-bottom: 2px solid;">Notificación -
                                <span class="label label-warning">Repertorio - síntoma</span>
                                <a href="" class="disabled pull-right">Aprobar</a>
                            </h6>
                            <div class="row" style="height: 65px">
                                <div class="col-md-12">
                                    Se agrego un nuevo síntoma
                                    <br><b><?= $sintoma->nombre ?></b>
                                    <br> Con la fecha de <?= $sintoma->create_date ?>

                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
<!--                    <li  class="col-md-12" style="border: 2px solid #08464e;margin-bottom: 5px;background: #dcdada;">-->
<!--                        <h6 style="margin: 8px 0px;border-bottom: 2px solid;">Notificación - <span class="label label-danger">tipo</span></h6>-->
<!--                        <div class="row" style="height: 65px">-->
<!--                            <div class="col-md-12">-->
<!--                                Descripción-->
<!--                                <a href="" class="disabled">link</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                    <li  class="col-md-12" style="border: 2px solid #08464e;margin-bottom: 5px;background: #dcdada;">-->
<!--                        <h6 style="margin: 8px 0px;border-bottom: 2px solid;">Notificación - <span class="label label-danger">tipo</span></h6>-->
<!--                        <div class="row" style="height: 65px">-->
<!--                            <div class="col-md-12">-->
<!--                                Descripción-->
<!--                                <a href="" class="disabled">link</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                    <li  class="col-md-12" style="border: 2px solid #08464e;margin-bottom: 5px;background: #dcdada;">-->
<!--                        <h6 style="margin: 8px 0px;border-bottom: 2px solid;">Notificación - <span class="label label-danger">tipo</span></h6>-->
<!--                        <div class="row" style="height: 65px">-->
<!--                            <div class="col-md-12">-->
<!--                                Descripción-->
<!--                                <a href="" class="disabled">link</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </li>-->
                </ul>
            </div>
        </div>
    </div>
</div>
