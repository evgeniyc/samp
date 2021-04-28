<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cats-index">

    <h1><?php Html::encode($this->title) ?></h1>

    <?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			'id',
			'name',
			'parent',
			'img',
			['class' => 'yii\grid\ActionColumn'],
		],
	])
	?>


</div>
