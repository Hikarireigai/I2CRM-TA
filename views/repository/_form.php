<?php

use app\models\GitUser;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Repository */
/* @var $form yii\widgets\ActiveForm */

?>


<div class="repository-form col-md-6 col-md-offset-3">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'git_user_id')->widget(Select2::class, [
        'data' => GitUser::getList(),
        'options' => ['placeholder' => 'Select Git user ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => false,
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
