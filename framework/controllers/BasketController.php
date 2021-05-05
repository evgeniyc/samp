<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BasketController extends Controller
{
    public function actionIndex($id=0,$user=0)
    {
        
		$session = Yii::$app->session;
		$session->open();
		if($id && $user) {
			$session['order.id'] = $id;
			$session['order.user'] = $user;
			$session->setFlash('orderCreated', 'Вы успешно добавили заказ!');
		}
		else {
			$session->setFlash('orderCreated', 'Для добавления заказа войдите или зарегистрируйтесь!');
		}
		$session->close();	
			
		return $this->redirect(['products/view','id'=>$id]);
    }

}
