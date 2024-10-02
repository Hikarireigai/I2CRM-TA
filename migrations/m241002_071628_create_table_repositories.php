<?php

use app\models\GitUser;
use app\models\Repository;
use yii\db\Migration;

/**
 * Class m241002_071628_create_table_repositories
 */
class m241002_071628_create_table_repositories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('repositories', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'git_user_id' => $this->integer()->notNull(),
            'updated_at' => $this->string(),
        ]);
        $this->addForeignKey(
            'git_user_ibfk_1',
            Repository::tableName(), 'git_user_id',
            GitUser::tableName(), 'id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('git_user_ibfk_1', 'repositories');
        $this->dropTable('repositories');
    }
}
