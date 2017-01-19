<?php

/* @var $this yii\web\View */
/* @var $name string */
/** @var $error string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>

<div id="error-box">
    <div class="error-box-wrapper">
        <div class="error-code display-4"><?= Html::encode($this->title) ?></div>
        <div class="error-message display-2"><?= nl2br(Html::encode($error)) ?></div>
        <div class="error-submessage"><?= nl2br(Html::encode($message)) ?></div>
        <div class="margin-top-2">
            <?= Html::a('Regresar a la página principal', Url::to(['/site/index'])) ?>
        </div>
    </div>
</div>
