<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = 'Редактирование продукта: ' . $model->title;
?>
<div class="products-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
