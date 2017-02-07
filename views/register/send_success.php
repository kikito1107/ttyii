<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app="messaging">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--suppress HtmlUnknownTarget -->
    <script src="<?php echo Url::base() ?>/js/main.js"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500,100,300' rel='stylesheet' type='text/css'>
    <?php $this->head() ?>
</head>
<body>
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-heading text-center">
                    <h3>Registro exitoso</h3>
                </div>
                <div class="card-body">
                    <form class="row">
                        <div class="col-md-12">
                            <h5>Gracias por registrarte en un instante recibiras un correo electrónico con un link para activar tu cuenta, y puedas iniciar
                                sesión y dar uso de sus servicios disponibles.
                                <a href="/">
                                    <span class="glyphicon glyphicon-home"> </span>
                                    Regresar al inicio
                                </a>
                            </h5>
                        </div>
                    </form>
                    <div class="card-footer">
                        <a class="text-center btn-block">No ha llegado el correo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>