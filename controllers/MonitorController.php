<?php

namespace app\controllers;

use Yii;
use app\models\Monitor;
use app\models\MonitorSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MonitorController implements the CRUD actions for Monitor model.
 */
class MonitorController extends Controller
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
     * Lists all Monitor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MonitorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Monitor model.
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
     * Creates a new Monitor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Monitor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            echo '<pre>';
//            print_r($model->validate('id'));
//            echo '</pre>';
//            exit(0);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Monitor model.
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
     * Deletes an existing Monitor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionCek()
    {
        $model = Monitor::find()->where(['waktu_keluar'=>null])->orderBy(['id_tempat'=>SORT_ASC])->all();
        return $this->render('cek',[
        ]);

    }

    public function actionKeluarkanKendaraan($id)
    {
        $model = Monitor::findOne($id);
        $model->waktu_keluar = date('Y-m-d H:i:s');
        $model->update(false);

//        var_dump($model);
//        exit(0);
        return $this->redirect(['cek']);

    }

    public function actionUbahThere($id){
        $model = $this->findModel($id);

        if($model->is_there == 0){
            $model->is_there = 1;
        }else{
            $model->is_there = 0;
        }

        $model->update(false);
        return $this->redirect(['cek']);
    }



    /**
     * Finds the Monitor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Monitor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Monitor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function cetakKosong(){
        $kosong = '<div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-ok-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Kosong</span>
              <span class="info-box-number">NA</span>
            </div>
          </div>';

        return $kosong;
    }

    public function cetakReserved($data){
        $reserved = '<div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-ban-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Reserved</span>
              <span class="info-box-number">'.$data['id_user'].'</span>
            </div>
          </div>';

        return $reserved;
    }

    public function cetakIsi($data){
        $isi = '<div class="info-box">
            <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-remove-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sudah Isi</span>
              <span class="info-box-number">'.$data['id_user'].'</span>
            </div>
          </div>';

        return $isi;
    }
}
