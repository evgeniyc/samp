<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукты';
?>
<div class="products-index">

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'sdescr:ntext',
            'img',
            'price',
			[                                                  
				'label' => 'Категория',
				'value' => 'category.name',
			],
		
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
