<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = 'Создать продукт';
?>
<div class="products-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
