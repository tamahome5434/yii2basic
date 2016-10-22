<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php 
// if($key%3==1)
	// echo "<div class='row'>";
?>
<div style='width:30%;float:left;padding-bottom:60px'>
	<?= Html::img(Yii::$app->request->baseUrl."/images/".$model->image,['style'=>'max-width: 200px; height: 200px']);?>
	<br>
	<?= Html::encode("{$model->brand}")?>
	<br>
	<?= Html::encode("{$model->pname}")?>
	<br>
	RM <?= Html::encode("{$model->sprice}")?>
	<br>
	<s>RM <?= Html::encode("{$model->rprice}")?></s>
	<?php $form = ActiveForm::begin([
		'action'=>['checkout']
	]); ?>
		<br>
		<?= Html::dropDownList('qty', null,array_combine(range(1,10),range(1,10))) ?>
		<?= Html::submitButton('Buy', ['class' => 'btn btn-primary']) ?>
		<?= Html::hiddenInput('id', $model->id) ?>
	<?php ActiveForm::end(); ?>

</div>
