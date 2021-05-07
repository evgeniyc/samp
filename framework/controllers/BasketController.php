<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use app\models\Products;

class BasketController extends Controller
{
    public function actionIndex($id=0,$user=0)
    {
        
		$session = Yii::$app->session;
		$session->open();
		if($id && $user) {
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
			foreach ($orders as $key => $value) {
				$ids[] = $value;
			}
			$provider = new ActiveDataProvider([
				'query' => Products::find()->where(['id'=>$ids]),
				'pagination' => [
					'pageSize' => 20,
				],
			]);
			return $this->render('view',['provider'=>$provider]);
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

}
