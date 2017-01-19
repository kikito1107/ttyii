<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Paciente */

$this->title = Yii::t('app', 'Registro');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pacientes'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
