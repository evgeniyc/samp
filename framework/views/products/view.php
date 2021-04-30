<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index', 'cat'=>$model->cat]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div id="product-view">

	<div id="title-price" class="row">
		<div id="product-title" class="col-xs-8">
			<h1><?= Html::encode($this->title) ?></h1>
		</div>
		<div id="product-price" class="col-xs-4">
			Цена: <?= $model->price ?> грн.
		</div>
	</div>
	<div id="product-content" class="row">
		<div id="product-img" class="col-xs-12 col-sm-6">
			<?= Html::img('@web/images/products/'.$model->img,['alt'=> $model->title,'id'=>'prod-img', 'class'=>'img-responsive']) ?>
		</div>
		<div id="product-descr" class="col-sm-6">
			<?= $model->descr ?>
			<div id="product-nav">
				Navigation
			</div>
		</div>
		
	</div>
	
</div>
