<?php
/* @var $this yii\web\View */
?>
<div class="row">
    <div class="col s12 m12 l12">
        <h3 class="header">Confirmación</h3>
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
                                <p>Se ha enviado un correo de confirmacion a tu correo, por favor revisa la bandeja
                                o la carpeta de SPAM</p>                     </div>


                            <div class="validate" >
                            <i class="large material-icons">Correo</i>
                            </div>

                            <
                        <div class="row center-align">
                            <a class="waves-effect waves-light btn blue accent-4" href="{{'/validate'}}">Continuar</a>
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