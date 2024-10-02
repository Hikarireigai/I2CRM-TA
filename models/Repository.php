<?php

namespace app\models;

use yii\db\ActiveRecord;

class Repository extends ActiveRecord
{
    /**
     * @property int $id
     * @property string $name
     * @property int $git_user_id
     * @property string $updated_at
     */
    public static function tableName()
    {
        return 'repositories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'git_user_id'], 'required'],
            [['name'], 'string'],
            [['git_user_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'git_user_id' => 'Author',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGitUser()
    {
        return $this->hasOne(GitUser::className(), ['id' => 'git_user_id']);
    }

    public function beforeSave($insert)
    {
        $this->updated_at = date('Y-m-d H:i:s');
        return parent::beforeSave($insert);
    }
}
