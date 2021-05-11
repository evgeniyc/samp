<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index', 'cat'=>$model->cat]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
//$numValue = new \yii\web\JsExpression(
$this->registerJs(
		'$( "#basket-quant" ).change(function() {
			  var fvalue = $("#add-order").attr("href");
			  var avalue = $( "#basket-quant" ).val();
			  var lastInd = fvalue.lastIndexOf("=");
			  ++lastInd;
			  fvalue = fvalue.slice(0,lastInd);
			  fvalue += avalue;
			  $("#add-order").attr("href",fvalue);
			});'
		);

?>
<div id="product-view">
<?php if (Yii::$app->session->hasFlash('orderCreated')): ?>
        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('orderCreated') ?>
        </div>
<?php endif; ?>

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
			<?= $model->descr ?><hr>
			<?= DetailView::widget([
				'model' => $model,
				'attributes' => [
				[
					'attribute' => 'Характеристики:',
					'value' => '',
				],
					'id',
					'title',
					'img',
					'price',
					'sdescr:ntext',
					[	
						'attribute' => 'cat',
						'value' => $model->category->name,
					]
				],
			]) ?>
			<div id="product-nav">
				<?= html::input ('number','basket-quant','1',['id'=>'basket-quant','min'=>0,'size'=>'3']) ?>
				<?= html::a('В корзину',['basket/index','id'=>$model->id,'quant'=>1],['id'=>'add-order','class'=>'btn btn-success', 'role'=>'button'])?>
				<?= html::a('Назад',Yii::$app->request->referrer,['class'=>'btn btn-primary', 'role'=>'button'])?>
			</div>
		</div>
		
	</div>
	
</div>
