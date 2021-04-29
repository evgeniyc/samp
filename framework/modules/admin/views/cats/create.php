<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cats */

$this->title = 'Создать категорию';
$this->params['breadcrumbs'][] = ['label' => 'Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cats-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
