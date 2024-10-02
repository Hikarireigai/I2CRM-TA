<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GitUser */

$this->title = 'Update Widget: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Git User', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="git-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
