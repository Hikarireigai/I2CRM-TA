<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GitUser */
/* @var $form yii\widgets\ActiveForm */

?>


<div class="git-user-form col-md-6 col-md-offset-3">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'username') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
