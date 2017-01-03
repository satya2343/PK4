<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MonitorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="monitor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'waktu_masuk') ?>

    <?= $form->field($model, 'waktu_keluar') ?>

    <?= $form->field($model, 'id_tempat') ?>

    <?= $form->field($model, 'is_there') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
