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
$this->registerJs(
		'$( ".basket-quant" ).change(function() {
			  var quant = this.value;
			  //var link_elem = $(this).closest("tr").find(".basket-update");
			  var link_elem = $(this).siblings(".basket-update");
			  var link = link_elem.attr("href");
			  var index = link.lastIndexOf("=");
			  ++index;
			  link = link.slice(0,index);
			  link += quant;
			  link_elem.attr("href",link);
			});'
		);
?>
<div id="basket-view">
	<h1><?= Html::encode($this->title) ?></h1>
		
	
	<div id="basket-content">
		<?php if (Yii::$app->session->hasFlash('orderCreated')): ?>
				<div class="alert alert-success">
					<?= Yii::$app->session->getFlash('orderCreated') ?>
				</div>
		<?php endif; ?>
		<?php if(Yii::$app->session->has('order')){
				$sum = 0;
				$num = 1;
				echo '<table id="basket-table"><tr><th>#</th><th>Наименование</th><th>Цена</th><th>Количество</th><th>Сумма</th></tr>';
				foreach(Yii::$app->session['order'] as $key => $value){
					$product = Products::findOne($key);
					echo '<tr>	<td>'.$num.'</td>
								<td>'.$product->title.'</td>
								<td>'.$product->price.' грн.</td>
								<td>
									<input type="number" class="basket-quant" size=3 min=1 value='.$value.'>
									'.html::a('<span class="glyphicon glyphicon-pencil"></span>',['basket/update','id'=>$product->id,'quant'=>$value],['class'=>'basket-update','title'=>'обновить']).'
									'.html::a('<span class="glyphicon glyphicon-trash"></span>',['basket/delete','id'=>$product->id],['title'=>'удалить']).'
								</td>
								<td>'.($summa = $product->price * $value).' грн.</td>
						</tr>';
					$sum += $summa;
					$num++;
				}
				echo '<tr><td colspan=3></td><td>Итого:</td><td>'.$sum.' грн.</td></table><br>';
				echo html::a('Оформить заказ',['orders/creates','sum'=>$sum],['class'=>'btn btn-success', 'role'=>'button']);
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
					['class' => 'yii\grid\ActionColumn', 'template' => '{update}{delete}'],
					
				],
			]);
			//var_dump(Yii::$app->session['order']);
		?>
	</div>
	
</div>




