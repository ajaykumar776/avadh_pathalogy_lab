<?php

namespace app\controllers;

use Yii;
use app\models\Scategory;
use app\models\BillItem;
use app\modelsScategorySearch;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\json;

/**
 * ScategoryController implements the CRUD actions for Scategory model.
 */
class ScategoryController extends Controller
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
     * Lists all Scategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new modelsScategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
   

    public function actionData($category_id)
    {
        $countcategory = Scategory::find()->where(['category_id' => $category_id])->count();
        $allsubcategory = Scategory::find()->where(['category_id' => $category_id])->all();
    
        if ($countcategory > 0) {
            echo "<option value=''> - select subcategory -</option>";
            foreach ($allsubcategory as $allsubcategory) {
                
                echo "<option value='" . $allsubcategory->id."' data-price='".$allsubcategory->amount."'>"."".$allsubcategory->name." </option>";

            }
        } else {
            echo "<option>  -  </option>";
        }

    }


    public function actionData1($subcategory_id)    
    {
        $countcategory = Scategory::find()->where(['id' => $subcategory_id])->count();
        $allsubcategory = Scategory::find()->where(['id' => $subcategory_id ])->all();
    
        if ($countcategory > 0) {
           
            foreach ($allsubcategory as $allsubcategory) {
                
                echo "<option value='" . $allsubcategory->amount."'>"."".$allsubcategory->amount." </option>";


            }
        } else {
            echo "<option>  -  </option>";
        }

    }




    /**
     * Displays a single Scategory model.
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
     * Creates a new Scategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Scategory();
        $model->created_datetime = date('Y-m-d H:i:s');
        $model->updated_datetime = date('Y-m-d H:i:s');
        $model->updated_by = Yii::$app->user->identity->username;
        $model->created_by = Yii::$app->user->identity->username;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Scategory model.
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
     * Deletes an existing Scategory model.
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
     * Finds the Scategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Scategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Scategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
