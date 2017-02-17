<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tratamiento */

?>
<div class="tratamiento-create">
    <div class="card">
        <div class="card-heading blue darken-3 white-text">
            <h5>Agregar nuevo tratamiento</h5>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>




</div>
