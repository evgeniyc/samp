<?php

use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Cats */

//$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->name;
\yii\web\YiiAsset::register($this);

echo Html::a('
<div class="showcase cats-view">
	<div class="cats-title"><h4>'.Html::encode($model->name).'</h4></div>
	<div class="cats-img">'.Html::img("@web/images/cats/$model->img", ['alt' => $model->name, 'class' => "img-responsive"]).'</div>
</div>', ['products/index/', 'cat' => $model->id]);