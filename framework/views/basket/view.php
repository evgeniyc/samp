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
				$num = 1;
				echo '<table id="basket-table"><tr><th>#</th><th>Наименование</th><th>Цена</th><th>Количество</th><th>Сумма</th><th></th></tr>';
				foreach(Yii::$app->session['order'] as $key => $value){
					$product = Products::findOne($key);
					echo '<tr><td>'.$num.'</td><td>'.$product->title.'</td><td>'.$product->price.' грн.</td><td><input type="number" size=3 value='.$value.'><input type="hidden" name="prodid" value='.$product->id.'></td><td>'.($summa = $product->price * $value).' грн.</td><td><span class="glyphicon glyphicon-trash"></span></td></tr>';
					$sum += $summa;
					$num++;
				}
				echo '<tr><td colspan=3></td><td>Итого:</td><td colspan=2>'.$sum.' грн.</td></table><br>';
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
			 GridView::widget([
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
					['class' => 'yii\grid\ActionColumn', 'template' => '{delete}'],
					
				],
			]);
			//var_dump(Yii::$app->session['order']);
		?>
	</div>
	
</div>




