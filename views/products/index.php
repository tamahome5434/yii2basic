<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <div class='body-content'>
	<?= ListView::widget([
	"dataProvider" => $dataProvider,
	"options"=>[
		"tag"=>'div',
		"class"=>"list-wrapper",
		"id"=>"list-wrapper",
	],
	"layout"=>"{items}\n{pager}",
	"itemView"=>"_item",
	//"viewParams"=>['quantity'=>$quantity],
	]);
	?>
	</div>
</div>
