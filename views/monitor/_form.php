<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Monitor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="monitor-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'waktu_masuk')->hiddenInput(['value'=>date('Y-m-d H:i:s')])->label(false) ?>

    <?= $form->field($model, 'waktu_keluar')->hiddenInput(['value'=>null])->label(false)?>

    <?= $form->field($model, 'id_tempat')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'is_there')->hiddenInput(['value'=>0])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
