<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cats-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
		'layout' => '{items}',
        'options' => ['class' => 'list-view row row-no-gutters'],
		'itemOptions' => [
			'class' => 'item col-xs-6 col-sm-4 col-md-3 col-lg-2', 
		],
		'itemView' => '_view',
    ]) ?>


</div>
