<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BasketController extends Controller
{
    public function actionIndex($id=0,$user=0)
    {
        if($id && $user) {
		$session = Yii::$app->session;

		// проверяем что сессия уже открыта
		//if ($session->isActive) ...

		// открываем сессию
		$session->open();
		$session['order.id'] = $id;
		$session['order.user'] = $user;
		$session->setFlash('orderCreated', 'Вы успешно добавили заказ');
		$session->close();	
		}
		// закрываем сессию
		//$session->close();

		// уничтожаем сессию и все связанные с ней данные.
		//$session->destroy();
		
		// установка flash-сообщения с названием "postDeleted"
		//$session->setFlash('postDeleted', 'Вы успешно удалили пост.');

		// Запрос #2
		// отображение flash-сообщения "postDeleted"
		//echo $session->getFlash('postDeleted');

		// Запрос #3
		// переменная $result будет иметь значение false, так как flash-сообщение было автоматически удалено
		//$result = $session->hasFlash('postDeleted');
		
		//return $this->render('index');
    }

}
