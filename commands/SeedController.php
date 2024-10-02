<?php
namespace app\commands;
use app\models\GitUser;
use app\models\Repository;
use Faker\Factory;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\db\Expression;

class SeedController extends Controller
{
    public function actionUsers($count)
    {
        $faker = Factory::create();
        $users = [];
        for ($i = 0; $i < $count; $i++) {
            $tries = 10;
            //Ищем уникальное имя для пользователя
            do {
                $username = $faker->username;
                $tries--;
            }
            while (GitUser::findOne(['username'=>$username]) && $tries > 0);

            //Если так и не нашли, то и пользователя не добавляем
            if (GitUser::findOne(['username'=>$username])) {
                continue;
            }
            $users[] = [$username];
        }
        Yii::$app->db->createCommand()->batchInsert(GitUser::tableName(), ['username'], $users)->execute();
        return ExitCode::OK;
    }

    public function actionRepositories($count)
    {
        $ids = GitUser::find()->select('id')->column();
        if (!$ids) {
            return 'No Git Users saved, please run "php yii seed/users N" before seeding repositories';
        }
        $faker = Factory::create();
        $repositories = [];
        for ($i = 0; $i < $count; $i++) {
            $randomId = $ids[array_rand($ids)];
            $git_user = GitUser::findOne($randomId);
            $tries = 10;
            do {
                $name = $faker->word;
                $tries--;
            }
            while (Repository::findOne(['name' => $name]) && $tries > 0);
            $date_time = $faker->dateTimeThisYear();
            $repositories[] = [$name, $git_user->id, $date_time->format('Y-m-d H:m:s')];
        }
        Yii::$app->db->createCommand()->batchInsert(Repository::tableName(),
            [
                'name',
                'git_user_id',
                'updated_at',
            ], $repositories)->execute();
        return ExitCode::OK;
    }
}