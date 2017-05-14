<?php
/* @var $this yii\web\View */
use app\models\Medico;
use yii\helpers\Url;

$id = \Yii::$app->user->getId();
$medico = Medico::find()->where(['user_id'=>$id])->one();

?>
<div class="jumbotron">
    <h3>Repertorización tradicional</h3>
    <p></p>

   <!-- < ?php if($medico != null): ?><!-- cuando es medico -->
    <div class="row">
        <div class="col-md-4">
            <h5>Síntoma</h5>
        </div>
        <div class="col-md-4">
            <h5>Órgano al que pertenece el sitnoma presentado</h5>
        </div>
        <div class="col-md-4">
            <h5>Medicamento es: con ponderación # </h5>
        </div>
        <div class="">

        </div>
    </div>


</div>
