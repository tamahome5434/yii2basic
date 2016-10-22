<?php

use yii\helpers\Html;

// use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = 'Order Summary : '.$model->pname;
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
		<?= $qty ?> 
		</div>
		<div style='width:15%;float:left'>
		RM <?= $subtotal ?> 
		</div>
	</div>
	
	<div class="row" style='padding-top:20px;border-bottom:1px solid #000000'>
	Your Order
	</div>
	
	<div class="row" style='padding-top:10px;'>
		<div style='width:50%;float:left'>Ship area</div>
		<div style='width:50%;float:left'><?=  Html::encode("{$area}") ?></div>
	</div>
	<div class="row" style='padding-top:5px;'>
		<div style='width:50%;float:left'>Orginal Price</div>
		<div style='width:50%;float:left'>	RM <?= $originalPrice  ?></div>
	</div>
	<div class="row" style='padding-top:5px;'>
		<div style='width:50%;float:left;color:red'>You saved</div>
		<div style='width:50%;float:left'>	RM <?= $subtotal ?></div>
	</div>
	<hr>
	<!--code-->
	<div class="row" style='padding-top:5px;'>
		<div style='width:50%;float:left;'>Promotion code</div>
		<div style='width:50%;float:left;text-transform:uppercase'><?= Html::encode("{$code}") ?></div>
	</div>
	<div class="row" style='padding-top:5px;'>
		<div style='width:50%;float:left;'>Discount</div>
		<div style='width:50%;float:left;'>RM <?= Html::encode("{$discount}") ?></div>
	</div>
	<div class="row" style='padding-top:5px;'>
		<div style='width:50%;float:left;'>Delivery to</div>
		<div style='width:50%;float:left'><?= Html::encode("{$area}") ?></div>
	</div>
	<div class="row" style='padding-top:5px;'>
		<div style='width:50%;float:left;'>Shipping fee</div>
		<div style='width:50%;float:left'>	RM <?= Html::encode("{$shipping}") ?></div>
	</div>
	<hr>
	<div class="row" style='padding-top:5px;'>
		<div style='width:50%;float:left;'>Payment required</div>
		<div style='width:50%;float:left'>	RM <?= $subtotal-$discount+$shipping ?></div>
	</div>
</div>