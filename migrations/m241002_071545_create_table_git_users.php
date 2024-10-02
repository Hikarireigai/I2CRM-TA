<?php

use app\models\GitUser;
use app\models\Repository;
use yii\db\Migration;

/**
 * Class m241002_071545_create_table_git_users
 */
class m241002_071545_create_table_git_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('git_users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('git_users');
    }
}
