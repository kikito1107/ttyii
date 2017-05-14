<?php

use app\models\Medico;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PacienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="card">
    <div class="card-body">
        <p></p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//                'id',
                [
                    'attribute' => 'nombre',
                    'value' => function ($model) {
                        $role = $model->getFullName();
                        return $role;
                    }
                ],
                'email',
                [
                    'attribute' => 'medico_id',
                    'value' => function ($model) {
                        $medico = Medico::find()->where(['id' => $model->medico_id])->one();
                        if(!$medico){
                            return "Aun no selecciona un médico.";
                        } else {
                            return $medico->getFullName;
                        }
                    }
                ],
//                'update_date',
                'create_date',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
