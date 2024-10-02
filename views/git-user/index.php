<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GitUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Git Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="git-user-index">
    <?php Pjax::begin(); ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'options' => ['data' => ['pjax' => true]],
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <p>
        <?= Html::a('Create Git User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php $dataProvider->pagination = ['pageSize' => 1000]; ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'filter' => Html::activeTextInput($searchModel, 'id', ['class'=>'form-control']),
                'contentOptions' => ['class' => 'num'],
            ],
            [
                'attribute' => 'username',
                'filter' => Html::activeTextInput($searchModel, 'username', ['class'=>'form-control']),
                'contentOptions' => ['class' => 'num'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>
    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
</div>
