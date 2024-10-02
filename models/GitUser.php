<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class GitUser extends ActiveRecord
{
    /**
     * @property int $id
     * @property string $username
     */
    public static function tableName()
    {
        return 'git_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['username'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Git username',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepositories()
    {
        return $this->hasMany(Repository::className(), ['id' => 'git_user_id']);
    }

    public static function getList(): array
    {
        return ArrayHelper::map(
            self::find()->orderBy('username')->asArray()->all(),
            'id',
            'username'
        );
    }
}
