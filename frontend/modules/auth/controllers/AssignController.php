<?php

namespace frontend\modules\auth\controllers;

use Yii;
use center\modules\auth\models\AuthAssignment;
use center\modules\auth\models\AuthAssignmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssignController implements the CRUD actions for AuthAssignment model.
 */
class AssignController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (\Yii::$app->user->can(Yii::$app->request->pathInfo)) {
            return true;
        } else {
            return $this->goBack();
        }
    }

    /**
     * Lists all AuthAssignment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthAssignmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new AuthAssignment();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                Yii::$app->session->addFlash('success', '为角色分配用户成功.');
            } else {
                Yii::$app->session->addFlash('danger', '为角色分配用户失败.');
            }
            $this->redirect(['index']);
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * Displays a single AuthAssignment model.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     */
    public function actionView($item_name, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($item_name, $user_id),
        ]);
    }

    /**
     * Deletes an existing AuthAssignment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     */
    public function actionDelete($item_name, $user_id)
    {
        $this->findModel($item_name, $user_id)->delete();
        Yii::$app->session->addFlash('success', '删除成功.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthAssignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $item_name
     * @param string $user_id
     * @return AuthAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($item_name, $user_id)
    {
        if (($model = AuthAssignment::findOne(['item_name' => $item_name, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
