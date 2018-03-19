<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Bugsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bugs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bug-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'url:url',
            'picurl',
            // [
            //     'label'=>'缩略图',
            //     'format'=>'raw',
            //     'value'=>function($model){
            //         return Html::img($m->picurl,['alt' => '缩略图','width' => 80]);
            //     }
            // ],
            'detail:ntext',
            'created_at',
            //'updated_at',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
