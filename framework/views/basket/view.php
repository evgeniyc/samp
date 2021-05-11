<?php

use yii\helpers\Html;
use app\models\Products;
use yii\grid\GridView;


//use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Basket */

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$product = new Products();
?>
<div id="basket-view">
	<h1><?= Html::encode($this->title) ?></h1>
		
	
	<div id="basket-content">
		<?php if(Yii::$app->session->has('order')){
				$sum = 0;
				//echo '<ol>';
				foreach(Yii::$app->session['order'] as $key => $value){
					$product = Products::findOne($key);
					echo '<li>'.$product->title.' '.$product->price.' грн.</li>';
					$sum += $product->price;
				}
				//echo '</ol>';
				echo 'Общая сумма заказа: '.$sum.' грн.<br>';
				echo html::a('Оформить заказ',['order/create'],['class'=>'btn btn-success', 'role'=>'button']);
				//Yii::$app->session->remove('order');
			} else {
				echo 'Ваша корзина пуста :(<br>';
				echo html::a('Назад',Yii::$app->request->referrer,['class'=>'btn btn-primary', 'role'=>'button']);
			}
		?>
	</div>
	<div>
		<?php if(isset($provider))
			echo GridView::widget([
				'dataProvider' => $provider,
				'showFooter' => true,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],
					'title',
					[
						'attribute' =>'sdescr',
						'footer' => 'Итого: ',
					],
					[
						'attribute' =>'price',
						'footer' => $provider->query->sum('price').' грн.',
					],
					['class' => 'yii\grid\ActionColumn'],
					
				],
			]);
			print_r($quants);
		?>
	</div>
	
</div>




