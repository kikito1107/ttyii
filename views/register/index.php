<?php
/* @var $this yii\web\View */
?>
<div class="row">
    <div class="col s12 m12 l12">
        <h3 class="header">Registrate</h3>
        <div class="card horizontal">
            <div class="card-image image-container">
                <img src="../img/registro.jpg">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <form>
                        <div class="row">
                            <div class="input-field col s4 m4 l4">
                                <i class="material-icons prefix">assignment_ind</i>
                                <input id="name" type="text" class="validate">
                                <label for="name">Nombre</label>
                            </div>
                            <div class="input-field col s4 m4 l4">
                                <input id="lastname" type="text" class="validate">
                                <label for="lastname">Apellido Paterno</label>
                            </div>
                            <div class="input-field col s4 m4 l4">
                                <input id="second_lastname" type="text" class="validate">
                                <label for="second_lastname">Apellido Materno</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 m6 l6">
                                <label>Genero</label>
                                <br>
                                <p>
                                    <input class="validate" name="group1" type="radio" id="test2" />
                                    <label for="test2">Hombre</label>

                                    <input class="with-gap validate" name="group1" type="radio" id="test3" />
                                    <label for="test3">Mujer</label>
                                </p>
                            </div>
                            <div class="input-field col s4 m4 l4">
                                <label for="birthday">Fecha de nacimiento</label>
                                <br>
                                <input id="birthday" type="date" class="datepicker validate"/>

                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 m6 l6">
                                <i class="material-icons prefix">email</i>
                                <input id="icon_email" type="email" class="validate">
                                <label for="icon_email">Correo electrónico</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 m6 l6">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="icon_password" type="password" class="validate">
                                <label for="icon_password">Contraseña</label>
                            </div>
                        </div>

                        <div class="row center-align">
                            <a class="waves-effect waves-light btn blue accent-4" href="{{'/validate'}}">Registrarse</a>
                        </div>
                    </form>
                </div>
                <div class="card-action">
                    <a href="{{url('/login')}}">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </div>
</div>