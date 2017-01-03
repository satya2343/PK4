<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MonitorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Monitors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monitor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Monitor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'waktu_masuk',
            'waktu_keluar',
            'id_tempat',
            'is_there',

            ['class' => 'yii\grid\ActionColumn'],
            [
                'label' => 'keluarkan',
                'format'=>'raw',
                'value'=>function($dataProvider){
                    if($dataProvider->waktu_keluar != null){
                        return Html::tag('span','sudah keluar',['class'=>'label label-primary']);
                    }
                    return "<table><th>".Html::a('keluarkan',['keluarkan-kendaraan','id'=>$dataProvider->id],['class'=>'btn btn-success'])."</th>
                    <th>".Html::a('ganti status',['ubah-there','id' => $dataProvider->id],['class'=>'btn btn-info'])."</th></table>";


                }
            ]
        ],
    ]); ?>
</div>
