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
        return $this->render('view');
    }

}
