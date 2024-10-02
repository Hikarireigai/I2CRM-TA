<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Repository */

$this->title = 'View: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Repository', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="repository-view col-md-6 col-md-offset-3">
        <div class="card-header">
            <h1 class="card-name"><?= Html::encode($this->title) ?></h1>
            <p class="card-buttons">
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </p>
        </div>
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                'git_user_id',
                'updated_at',
                ]
        ]) ?>
    </div>