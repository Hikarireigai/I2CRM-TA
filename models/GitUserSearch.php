<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * GitUserSearch represents the model behind the search form of `app\models\GitUser`.
 */
class GitUserSearch extends GitUser
{
    public $id;
    public $username;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'string'],
            [['id'], 'integer'],
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
        $query = GitUser::find();
        $this->load($params);

        $dataProvider = new ActiveDataProvider(['query' => $query->from(GitUser::tableName())]);

        $dataProvider->sort->attributes['id'] = [
            'asc' => ['id' => SORT_ASC],
            'desc' => ['id' => SORT_DESC],
            'default' => SORT_DESC,
        ];

        $dataProvider->sort->attributes['username'] = [
            'asc' => ['username' => SORT_ASC],
            'desc' => ['username' => SORT_DESC],
            'default' => SORT_DESC,
        ];

        $query->andFilterWhere(['like', 'username', $this->username]);
        $query->andFilterWhere(['id' => $this->id]);

        return $dataProvider;
    }
}
