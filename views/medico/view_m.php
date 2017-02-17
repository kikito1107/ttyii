<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Medico */


?>
<div class="medico-view">
    <div class="card">
        <div class="card-heading text-capitalize blue darken-3">
            <h5 class="white-text" style="margin: 3px 0" >
                Perfil médico
                <?= Html::a(Yii::t('app', 'Actualizar'), ['update-m', 'id' => $model->id], ['class' => 'btn btn-danger pull-right']) ?>
            </h5>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-3">
                    <?php if($model->image_Photo != null && $model->image_Photo !== ""):?>
                    <img src="<?= Url::base().'/img/homeo.png'?>" class="img-circle">
                    <?php else:?>
                        <?php if($model->genero == 1):?>
                        <img src="<?= Url::base().'/img/men.png'?>" class="img-circle">
                        <?php else:?>
                        <img src="<?= Url::base().'/img/woman.png'?>" class="img-circle">
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="col-md-8" style="border-left: 3px solid #00acc1;">
                    <div class="row">
                        <div class="col-md-12 ">
                            <h5 style="margin: 10px 0;" class="blue-text text-darken-3">Datos personales</h5>
                        </div>
                        <div class="col-md-12">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <p> <b>Nombre: </b> <br><span class="text-capitalize"><?= $model->getFullName()?></span></p>
                            </div>
                            <div class="col-md-3">
                                <p> <b>Fecha de nacimiento: </b> <br><span class="text-capitalize"><?= date_format(new DateTime($model->cumple), 'd-M-Y')?></span></p>
                            </div>
                            <div class="col-md-3">
                                <p> <b>Edad: </b> <br><span class="text-capitalize"><?= $model->getAnos() ?></span></p>
                            </div>
                            <div class="col-md-3">
                                <p> <b>Género: </b> <br><span class="text-capitalize"><?= ($model->genero == 1)? 'Masculino':'Femenino'; ?></span></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                            <h5 style="margin: 10px 0;" class="blue-text text-darken-3">Datos de inicio de sesión</h5>
                        </div>
                        <div class="col-md-12">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <p> <b>Nombre de usuario: </b> <br><span ><?= $model->username?></span></p>
                            </div>
                            <div class="col-md-4">
                                <p> <b>Correo electrónico: </b> <br><span ><?= $model->email?></span></p>
                            </div>
                            <div class="col-md-4">
                                <p> <b>Contraseña: </b> <br><span ><?= "******************"?></span></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                            <h5 style="margin: 10px 0;" class="blue-text text-darken-3">Datos contacto</h5>
                        </div>
                        <div class="col-md-12">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <p> <b>Correo electrónico: </b> <br><span ><?= $model->email?></span></p>
                            </div>
                            <div class="col-md-4">
                                <p> <b>Teléfono celular: </b> <br><span ><?= $model->celular?></span></p>
                            </div>
                            <div class="col-md-4">
                                <p> <b>Teléfono fijo: </b> <br><span ><?= $model->telefono ?></span></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h5 style="margin: 10px 0;" class="blue-text text-darken-3">Datos académicos</h5>
                        </div>
                        <div class="col-md-12">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <p> <b>Cedula profesional: </b> <br><span ><?= $model->cedula?></span></p>
                            </div>
                            <div class="col-md-4">
                                <p> <b>Escuela: </b> <br><span ><?= $model->escuela?></span></p>
                            </div>
                            <div class="col-md-4">
                                <p> <b>Especialidad: </b> <br><span ><?= $model->especialidad?></span></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                            <h5 style="margin: 10px 0;" class="blue-text text-darken-3">Otros</h5>
                        </div>
                        <div class="col-md-12">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <p>
                                <b>Descripción: </b>
                                <br>
                                <span ><?= $model->descripcion?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
