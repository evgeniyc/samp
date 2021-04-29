<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cats */

$this->title = 'Редактирование категории: ' . $model->name;
?>
<div class="cats-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
