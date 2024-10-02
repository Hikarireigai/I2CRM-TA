<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RepositorySearch represents the model behind the search form of `app\models\Repository`.
 */
class RepositorySearch extends Repository
{
    public $id;
    public $name;
    public $git_user_id;
    public $updated_at;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['id', 'git_user_id'], 'integer'],
            [['updated_at'], 'match', 'pattern' => '/\d{4}-\d{2}-\d{2}\s?-\s?\d{4}-\d{2}-\d{2}/'],
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
        $query = Repository::find()->orderBy(['updated_at' => SORT_DESC]);
        $this->load($params);

        $dataProvider = new ActiveDataProvider([
            'query' => $query->from(Repository::tableName()),
            'pagination' => [
                'pageSize' => 10, // Default page size
            ]
        ]);

        $dataProvider->sort->attributes['id'] = [
            'asc' => ['id' => SORT_ASC],
            'desc' => ['id' => SORT_DESC],
            'default' => SORT_DESC,
        ];

        $dataProvider->sort->attributes['name'] = [
            'asc' => ['name' => SORT_ASC],
            'desc' => ['name' => SORT_DESC],
            'default' => SORT_DESC,
        ];

        $dataProvider->sort->attributes['git_user_id'] = [
            'asc' => ['git_user_id' => SORT_ASC],
            'desc' => ['git_user_id' => SORT_DESC],
            'default' => SORT_DESC,
        ];

        $dataProvider->sort->attributes['updated_at'] = [
            'asc' => ['updated_at' => SORT_ASC],
            'desc' => ['updated_at' => SORT_DESC],
            'default' => SORT_DESC,
        ];

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'updated_at', $this->updated_at]);
        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['git_user_id' => $this->git_user_id]);

        return $dataProvider;
    }
}
