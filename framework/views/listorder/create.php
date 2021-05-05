<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Listorder */

$this->title = 'Create Listorder';
$this->params['breadcrumbs'][] = ['label' => 'Listorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="listorder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
