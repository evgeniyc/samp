<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$basket = null;
if (Yii::$app->session->has('order')) 
	$basket = count(Yii::$app->session['order']); 
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
		'brandImage' => '@web/images/sunny.jpg',
        'brandUrl' => Yii::$app->homeUrl,
		'headerContent' => 
		' <form class="navbar-form form-inline navbar-left">
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Поиск по сайту">
			</div>
			<button type="submit" class="btn btn-search">
				<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
			</button>
		  </form>
		  <div id="nav-contacts">
			<span class="glyphicon glyphicon-phone" aria-hidden="true"></span> (067)322-23-32(Киевстар)<br>
			<span class="glyphicon glyphicon-phone" aria-hidden="true"></span> (050)322-23-32(Vodafone)
		  </div>',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
			'id' => 'navbar-main',
        ],
    ]);
	echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [ 
            ['label' => 'Главная', 'url' => ['/cats/index']],
			//['label' => 'Каталог', 'url' => ['/cats/index']],
            ['label' => 'О нас', 'url' => ['/site/about']],
            ['label' => 'Контакты', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Вход', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li><li>'
				. Html::a('<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
						<span style="color:red">'.$basket.'</span>',['basket/view'])
				. '</li>'
            )
        ],
    ]);
	NavBar::end();
    ?>

<div id="main-part" class="container">
	    <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Samp <?= date('Y') ?></p>

        <p class="pull-right"><?= 'Yii2 CMS used' ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
