<?php

use app\models\Citas;
use app\models\Paciente;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CitasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Receta');
$this->params['breadcrumbs'][] = $this->title;
$id = \Yii::$app->user->id;
$paciente = Paciente::find()->where(['user_id' => $id])->one();

if(Citas::find()->where(['paciente_id' => $paciente->id ])->one() != null){
    $citas_pendientes = true;
} else {
    $citas_pendientes = false;
}

?>

<div class="card">
    <div class="card-heading">
        <h5>Aquí podrás descargar tu receta</h5>
        <p>El nombre de tu medico es:</p>
        <p>La hora de expedición es:</p>


        <?= Html::a('Descargar receta aqui <span class="glyphicon glyphicon-download"></span>', Url::to(['receta/pdf', 'id' => $paciente->id]),['data-method' => 'post'])?>
    </div>



</div>