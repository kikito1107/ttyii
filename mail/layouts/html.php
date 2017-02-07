<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <?$content; ?>
    <?= ''?>
    <div class="row">
        <div class="col-md-6 col-lg-offset-3">
            <table class="table table-bordered">
                <thead>
                    <tr class="active text-center">
                        Sistema homeopático
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <p>Hola </p>
                    </tr>
                    <tr>
                        <p>
                            Gracias por registrate a sitio.web para terminar da clic en el siguiente enlace y poder iniciar sesión
                            <?= Html::a('Validar cuenta', Url::to('paciente/activate', ['id' => 1]))?>
                        </p>
                    </tr>
                    <tr>Sistema homeopático - Desarrollado por alumnos del ipn</tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-heading">
            <h4 class="text-center">¡Bienvenido!</h4>
        </div>
        <div class="card-body">
            <p>Hola </p>&nbsp;
            <h6>Datos de la cuenta</h6>
            <p>Nombre: fullname</p>
            <p>correo electrónico: <?= 'email'?></p>
        </div>
        <div class="card-footer">

        </div>
    </div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
