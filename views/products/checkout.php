<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

// use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = 'Checkout : '.$model->pname;
$qty=Html::encode("{$quantity}");
$sprice=Html::encode("{$model->sprice}");
$rprice=Html::encode("{$model->rprice}");
$subtotal= $qty*$sprice;
$originalPrice= $qty*$rprice;

?>
<div class="products-checkout">
	<div class="row">
		<div style='width:25%;float:left;border-bottom:1px solid #000000'>Item</div>
		<div style='width:35%;float:left;border-bottom:1px solid #000000'>Description</div>
		<div style='width:15%;float:left;border-bottom:1px solid #000000'>Unit Price</div>
		<div style='width:10%;float:left;border-bottom:1px solid #000000'>Quantity</div>
		<div style='width:15%;float:left;border-bottom:1px solid #000000'>Total</div>
	</div>
	
	
	<div class="row" style='padding-top:10px'>
		<div style='width:25%;float:left'>
		<?= Html::img(Yii::$app->request->baseUrl."/images/".$model->image,['style'=>'max-width: 150px; height: 150px']);?>
		</div>
		<div style='width:35%;float:left'>
		<?= Html::encode("{$model->pname}")?> (<?= Html::encode("{$model->brand}")?>)
		</div>
		<div style='width:15%;float:left'>
		<s>RM <?= $rprice ?> </s>
		<br>
		RM <?= $sprice ?> 
		</div>
		<div style='width:10%;float:left'>
		<?= $qty?> 
		</div>
		<div style='width:15%;float:left'>
		RM <?= $subtotal ?> 
		</div>
	</div>
	
	<div class="row" style='padding-top:20px;border-bottom:1px solid #000000'>
	Your Order
	</div>
	<?php $form = ActiveForm::begin([
	'action'=>['summary'],
	]); ?>
	<div class="row" style='padding-top:10px;'>
		<div style='width:50%;float:left'>Ship area</div>
		<div style='width:50%;float:left'><?= Html::dropDownList('country', null,['malaysia'=>'Malaysia','singapore'=>'Singapore', 'brunei'=>'Brunei'],['id'=>'country']) ?></div>
	</div>
	<div class="row" style='padding-top:5px;'>
		<div style='width:50%;float:left'>Orginal Price</div>
		<div style='width:50%;float:left'>	RM <?= $originalPrice ?></div>
	</div>
	<div class="row" style='padding-top:5px;'>
		<div style='width:50%;float:left;color:red'>You saved</div>
		<div style='width:50%;float:left'>	RM <?= $subtotal ?></div>
	</div>
	
	<!--code-->
	<div class="row" style='padding-top:5px;'>
	
		<div style='width:50%;float:left;'><?= Html::textInput('code','',['class'=>'form-control','placeholder'=>'promotion code','id'=>'code', 'style'=>'text-transform:uppercase'])?></div>
		<div style='width:50%;float:left'><?= Html::button('Apply', ['class' => 'btn btn-primary', 'id'=>'apply']) ?></div>
		
	</div>
	<div class="row" style='padding-top:5px;'>
		<div style='width:50%;float:left;'>Shipping Fee</div>
		<div style='width:50%;float:left'>	RM <span id='shipping'></span></div>
	</div>
	<?= Html::hiddenInput('id', $model->id) ?>
	<?= Html::hiddenInput('discount', '', ['id'=>'discount']) ?>
	<?= Html::hiddenInput('ship','',['id'=>'ship']) ?>
	<?= Html::hiddenInput('qty', $qty, ['id'=>'qty']) ?>
	<?= Html::hiddenInput('subtotal', $subtotal, ['id'=>'subtotal']) ?>
	<div class="row" style='padding-top:5px;'>
		<div style='width:50%;float:left;'><?= Html::submitButton('Checkout', ['class' => 'btn btn-primary']) ?></div>
	</div>
	<?php ActiveForm::end(); ?>
</div>


