<?php

namespace app\controllers;

use Yii;
use app\models\HospitalBill;
use app\models\HospitalBillSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Connection;

/**
 * HospitalController implements the CRUD actions for HospitalBill model.
 */
class HospitalController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all HospitalBill models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HospitalBillSearch();
        $dataProvider = $searchModel->search1(Yii::$app->request->queryParams);

        return $this->render('index', [ 'searchModel' => $searchModel,'dataProvider' => $dataProvider,]);
    }
    public function actionIndex1()
    {
        $searchModel = new HospitalBillSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HospitalBill model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new HospitalBill model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HospitalBill();
        $model->updated_by = Yii::$app->user->identity->username;
        $model->created_by = Yii::$app->user->identity->username;
        $model->created_datetime = date('Y-m-d H:i:s');
        $model->updated_datetime = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing HospitalBill model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionUpdateform($id)
    {
        $model = $this->findModel($id);
        $connection = \Yii::$app->db;
        $model->created_datetime = date('Y-m-d H:i:s');
        $model->updated_datetime = date('Y-m-d H:i:s');
        $up= $model->updated_by = Yii::$app->user->identity->username;
        $cp=$model->created_by = Yii::$app->user->identity->username;

        if ($model->load(Yii::$app->request->post())){

            $model1 =  new  HospitalBill();
            
            $data = HospitalBill::find()->where(['id' => $id ])->one();
            if($data){
                $bill_id= $model->id;
                $t_id = $model->transaction_id;
                $payment_id = $model->payment_mode;
                $model->final_amount = $model->total_charges - $model->discount;
                $model->paid_amount =  $model->final_amount;

                $connection->createCommand()->insert('receipt',
                [
                    'bill_id' => $id,
                    'amount' =>  $model->paid_amount,
                    'payment_mode' =>  $payment_id,
                    'transaction_id' => $t_id ,
                    'created_datetime' => date('Y-m-d H:i:s'),
                    'updated_datetime' => date('Y-m-d H:i:s'),
                    'updated_by' => $up,
                    'created_by' => $cp,
                    'is_deleted' => 0,
                ])
              
                ->execute();
                echo $model->remaining_amount = 0;echo "<br>";
                $model->final_amount = $model->total_charges - $model->discount;
                $model->paid_amount =  $model->final_amount;

                $data->save();

              
            }


            $model->save();
            

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('updateform', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing HospitalBill model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HospitalBill model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HospitalBill the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HospitalBill::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
