<?php

namespace app\controllers;
use yii;
use Yii\app\bill;
use yii\bootstrap\Alert;
use yii\db\Query ;
use app\models\BillItem;
use app\models\BillItemSearch;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use app\models\HospitalBill;
use yii\web\Scategory;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Connection;

/**
 * BillitemController implements the CRUD actions for BillItem model.
 */
class BillitemController extends Controller
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
     * Lists all BillItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BillItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BillItem model.
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





    //bill generate action 
    public function actionBill($id)
    {
        if($bill = HospitalBill::find()->where(['patient_id' => $id ])->andWhere(['<>','remaining_amount',0])->one()){

           $hospital_id= $bill->id;
            
            $billitems = BillItem::find()->where(['hospital_bill_id' => $hospital_id ])->all();


            return $this->render('bill', ['billitems'=>$billitems],$hospital_id);
        }else
        {
          $bill = HospitalBill::find()->where(['patient_id' => $id ])->andWhere(['=','remaining_amount',0])->one();

          $hospital_id= $bill->id;
                 
            $billitems = BillItem::find()->where(['hospital_bill_id' => $hospital_id ])->all();
     
     
          return $this->render('bill', ['billitems'=>$billitems],$hospital_id);
        }
        
    }

    /**
     * Creates a new BillItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        
        

        $model = new BillItem();
        $connection = \Yii::$app->db;
        $model->created_datetime = date('Y-m-d H:i:s');
        $model->updated_datetime = date('Y-m-d H:i:s');
        $up= $model->updated_by = Yii::$app->user->identity->username;
        $cp=$model->created_by = Yii::$app->user->identity->username;
       
      
        if ($model->load(Yii::$app->request->post())){

            $datas = HospitalBill::find()->where(['patient_id' => $id ])->andWhere(['<>','remaining_amount',0])->one();

            if($datas)
             {
                $model->hospital_bill_id = $datas->id;
                $datas->total_charges += $model->amount;
                $datas->paid_amount = 0;
                $datas->remaining_amount += $model->amount;
                $datas->discount = 0;
                $datas->final_amount += $model->amount;
                $datas->created_datetime = date('Y-m-d H:i:s');
                $datas->updated_datetime = date('Y-m-d H:i:s');
                $datas->save();
               

             }else
             {
                $total_charge =$model->amount;
                $remaining = $model->amount;
                $final = $model->amount;
                $model1 = new HospitalBill();
                $model->hospital_bill_id = $model1->id;
               
                $connection->createCommand()->insert('hospital_bill',
                    [
                        'patient_id' => $id,
                        'total_charges' =>  $total_charge,
                        'paid_amount' => 0,
                        'remaining_amount' => $remaining,
                        'discount' => 0,
                        'final_amount' => $final,
                        'created_datetime' => date('Y-m-d H:i:s'),
                        'updated_datetime' => date('Y-m-d H:i:s'),
                        'updated_by' => $up,
                        'created_by' => $cp,
                        'is_deleted' => 0,
                    ])
                    ->execute();
                $hospital_id = HospitalBill::find()->where(['patient_id' => $id ])->one();
                $model->hospital_bill_id = $hospital_id->id;
                
             }
            
               
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
        


    /**
     * Updates an existing BillItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BillItem model.
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
     * Finds the BillItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BillItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BillItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
