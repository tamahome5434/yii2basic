<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use app\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	public function actionCheckout()
    {
		$id=Yii::$app->request->post('id');
		$qty=Yii::$app->request->post('qty');
		$checkout=Products::findOne($id);

		return $this->render('checkout', [
            'model' => $checkout,
			'quantity'=>$qty,

        ]); 	
    }
	
	public function actionSummary()
    {
		$id=Yii::$app->request->post('id');
		$qty=Yii::$app->request->post('qty');
		// $discount='';
		// $shipping=Yii::$app->request->post('ship');
		$subtotal=Yii::$app->request->post('subtotal');
		$area=Yii::$app->request->post('country');
		$code=strtoupper(Yii::$app->request->post('code'));
		$summary=Products::findOne($id);
		
		if ($code=='OFF5PC'){
			if($qty>=2)
				$discount=$subtotal*0.05;
			else
				$discount=0;
		}
		elseif ($code=='GIVEME15'){
			if($subtotal>=100)
				$discount=15;
			else
				$discount=0;
		}
		else 
			$discount=0;

		if($area=='malaysia'){
			if($qty>=2||$subtotal>=150)
				$shipping=0;
			else
				$shipping=10;
		}
		elseif($area=='singapore'){
			if($subtotal>=300)
				$shipping=0;
			else
				$shipping=20;
		}
		elseif($area=='brunei'){
			if($subtotal>=300)
				$shipping=0;
			else
				$shipping=25;
		}
		return $this->render('summary', [
            'model' => $summary,
			'quantity'=>$qty,
			'discount'=>$discount,
			'shipping'=>$shipping,
			'subtotal'=>$subtotal,
			'area'=>$area,
			'code'=>$code,
        ]); 
    }
}
