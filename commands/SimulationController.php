<?php

namespace app\commands;

use app\models\Repository;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\db\Exception;

class SimulationController extends Controller
{
    /**
     * @throws Exception
     */
    public function actionIndex()
    {
        $ids = Repository::find()->select('id')->column();
        if (!$ids) {
            return 'No Repositories saved, please run "php yii seed/repositories N" before simulating';
        }
        for ($i = 0; $i < 10; $i++) {
            $randomId = $ids[array_rand($ids)];
            $repository = Repository::findOne($randomId);
            $repository->updated_at = date('Y-m-d H:m:s');
            $repository->save();
        }
        return ExitCode::OK;
    }
}