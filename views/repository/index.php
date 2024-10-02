<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepositorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Repositories';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="repository-index">
    <?php Pjax::begin(); ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'options' => ['data' => ['pjax' => true]],
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <p>
        <?= Html::a('Create Repository', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
                'attribute' => 'name',
                'filter' => Html::activeTextInput($searchModel, 'name', ['class'=>'form-control']),
                'contentOptions' => ['class' => 'string'],
            ],
            [
                'attribute' => 'git_user_id',
                'filter' => Html::activeTextInput($searchModel, 'git_user_id', ['class'=>'form-control']),
                'contentOptions' => ['class' => 'num'],
            ],
            [
                'attribute' => 'updated_at',
                'filter' => Html::activeTextInput($searchModel, 'updated_at', ['class'=>'form-control']),
                'contentOptions' => ['class' => 'string'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
            ],
        ],
        'pager' => [
            'class' => 'yii\widgets\LinkPager',
            'options' => ['class' => 'pagination'],
            'linkOptions' => ['class' => 'page-link'],
            'disabledPageCssClass' => 'disabled',
            'activePageCssClass' => 'active',
        ],
    ]); ?>
    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
</div>
