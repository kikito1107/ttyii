<?php
/**
 * Created by PhpStorm.
 * User: saul
 * Date: 13/02/17
 * Time: 19:14
 */
use app\models\Paciente;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$paciente = new Paciente();
?>
<body>
    <div class="row">
        <div class="col-md-9 card">
            <h3>Reenviar correo de confirmación</h3>
            <h6>
                Por favor proporciona de nuevo tu correo electrónico con el que registraste la cuenta para así poder reenviarte el link.
                Tambien consulta tu bandeja de span.
            </h6>
            <?php $form = ActiveForm::begin([
                'action' => ['register/validate'],
                'method' => 'post',
            ]); ?>
            <div class="col-md-6 col-md-offset-3">
                <?php  echo $form->field($paciente, 'email') ?>
            </div>
            <div class="col-md-12 text-center">
                <?= Html::submitButton(Yii::t('app', 'Enviar correo'), ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</body>