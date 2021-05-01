<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Cats;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'sdescr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descr')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'cat')->dropdownList(
		Cats::find()->select(['name', 'id'])->indexBy('id')->column(),
		['prompt'=>'Выберите категорию']); ?>
	
	<div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>