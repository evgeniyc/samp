<?php

use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Cats */

//\yii\web\YiiAsset::register($this);

echo Html::a('
<div class="showcase products-view">
	<div class="products-title"><h4>'.Html::encode($model->title).'</h4></div>
	<div class="products-img">'.Html::img("@web/images/products/$model->img", ['alt' => $model->title, 'class' => "img-responsive"]).'</div>
	<div class="products-descr">'.Html::encode($model->sdescr).'</div>
	<div class="products-price">Цена: '.Html::encode($model->price).' грн.</div>
</div>', ['products/view/', 'id' => $model->id]);