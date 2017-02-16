<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tratamiento;

/**
 * TratamientoSearch represents the model behind the search form about `app\models\Tratamiento`.
 */
class TratamientoSearch extends Tratamiento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sintoma_id', 'medicamento_id', 'organo_padre_id', 'ponderacion', 'status'], 'integer'],
            [['descripcion', 'update_date', 'create_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tratamiento::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sintoma_id' => $this->sintoma_id,
            'medicamento_id' => $this->medicamento_id,
            'organo_padre_id' => $this->organo_padre_id,
            'ponderacion' => $this->ponderacion,
            'status' => $this->status,
            'update_date' => $this->update_date,
            'create_date' => $this->create_date,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
