<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Citas */

$this->title = Yii::t('app', 'Generar cita');

?>
<div class="citas-create">
    <div class="card">
        <div class="card-heading">
            <h5><?= Html::encode($this->title) ?></h5>
        </div>
        <div class="card-body">
            <p>Recuerda que para agendar una cita debes de considerar 3 días a partir de la fecha
                <span class="label label-danger"><?= date("d-M-Y"); ?></span>
                con la finalidad de llevar a cabo el preceso de notificación al médico seleccionado.</p>
            <?= $this->render('_form', [
                'model' => $model,
                'id' => $id
            ]) ?>
        </div>
    </div>
</div>
