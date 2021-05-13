<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use app\models\Products;

class BasketController extends Controller
{
    public function actionIndex($id=0,$quant=0)
    {
        
		$session = Yii::$app->session;
		$session->open();
		if(Yii::$app->user->isGuest)
			$session->setFlash('orderCreated', 'Для добавления заказа войдите или зарегистрируйтесь!');
		elseif($id && $quant) {
			if(Yii::$app->session->has('order'))
				$session['order'][$id] = $quant;
			else {
				$session['order'] = new \ArrayObject;
				$session['order'][$id] = $quant;
			}
			$session->setFlash('orderCreated', 'Вы успешно добавили заказ!');
		}
		else {
			$session->setFlash('orderCreated', 'Ошибка добавления заказа!');
		}
		$session->close();	
			
		return $this->redirect(['products/view','id'=>$id]);
    }
	
	 /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        if(Yii::$app->session->has('order')) {
			$orders = Yii::$app->session['order'];
			foreach ($orders as $key => $quant) {
				$ids[] = $key;
				$quants[$key] = $quant;
			}
			$provider = new ActiveDataProvider([
				'query' => Products::find()->where(['id'=>$ids]),
				'pagination' => [
					'pageSize' => 20,
				],
			]);
			return $this->render('view',['provider'=>$provider, 'quants' => $quants]);
		}
				
		return $this->render('view');
    }
	
	public function actionCreate($id=0)
    {
        
		$session = Yii::$app->session;
		$session->open();
		if($id) {
			if(Yii::$app->session->has('order'))
				$session['order'][] = $id;
			else {
				$session['order'] = new \ArrayObject;
				$session['order'][] = $id;
			}
			$session->setFlash('orderCreated', 'Вы успешно добавили заказ!');
		}
		else {
			$session->setFlash('orderCreated', 'Для добавления заказа войдите или зарегистрируйтесь!');
		}
		$session->close();	
			
		return $this->redirect(['products/view','id'=>$id]);
    }
	
	public function actionDelete ($id) 
	{
		if(isset(Yii::$app->session['order'][$id]))
			unset(Yii::$app->session['order'][$id]);
		return $this->redirect(['basket/view']);
	}

}
