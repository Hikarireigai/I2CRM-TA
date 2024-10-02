<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GitUser */

$this->title = 'Create Git User';
$this->params['breadcrumbs'] = [];
$this->params['breadcrumbs'][] = ['label' => 'Git User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="git-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
