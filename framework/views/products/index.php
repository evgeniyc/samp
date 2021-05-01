<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$models  = $dataProvider->getModels();
$model = $models[0];
if ($model->cat) 
	$cat = $model->category->name;
else 
	$cat = '"без категории"';
$this->title = $cat;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
		'summary' => '<div class = "summary"> Показано <b>{count}</b> из <b>{totalCount}</b></div>',
		//'layout' => '{items}',
        'options' => ['class' => 'list-view row row-no-gutters'],
		'itemOptions' => [
			'class' => 'item col-xs-6 col-sm-4 col-md-3 col-lg-2', 
		],
		'itemView' => '_view',
    ]) ?>


</div>
