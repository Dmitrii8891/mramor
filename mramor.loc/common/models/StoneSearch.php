<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Stone;

/**
 * StoneSearch represents the model behind the search form about `common\models\Stone`.
 */
class StoneSearch extends Stone
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'filter_one', 'filter_two', 'filter_three'], 'integer'],
            [['name', 'description'], 'safe'],
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
        $query = Stone::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => ''
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        if($this->filter_two == 1){
            $this->filter_two = null;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'filter_one' => $this->filter_one,
            'filter_two' => $this->filter_two,
            'filter_three' => $this->filter_three,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
