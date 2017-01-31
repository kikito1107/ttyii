<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Citas;

/**
 * CitasSearch represents the model behind the search form about `app\models\Citas`.
 */
class CitasSearch extends Citas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'paciente_id', 'medico_id', 'hora', 'status'], 'integer'],
            [['dia', 'update_date', 'create_date'], 'safe'],
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
        $query = Citas::find();

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
            'paciente_id' => $this->paciente_id,
            'medico_id' => $this->medico_id,
            'dia' => $this->dia,
            'hora' => $this->hora,
            'update_date' => $this->update_date,
            'create_date' => $this->create_date,
            'status' => $this->status,
        ]);

        return $dataProvider;
    }
}
