<?php

namespace frontend\modules\auth\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use center\modules\auth\models\Rbac;
use center\modules\auth\models\AuthItem;
use center\modules\auth\models\AuthItemSearch;

class RolesController extends Controller
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
                    'logout' => ['post'],
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * 调取角色数据.
     * @return string
     */
    public function actionIndex()
    {
        $model = new AuthItem();
        $searchModel = new AuthItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $model->auth_item_type_1);

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * 创建角色.
     * @return string
     */
    public function actionCreate()
    {
        $model = new AuthItem();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $auth = Yii::$app->authManager;
            $createPost = $auth->createRole($model->name);
            $createPost->description = $model->description;
            $auth->add($createPost);

            Yii::$app->session->addFlash('success', '添加角色成功');
            return $this->redirect(['index']);
        } else {
            Yii::$app->session->addFlash('danger', '创建角色失败');
            return $this->redirect(['index']);
        }
    }

    /**
     * 更新角色.
     * @param $id 角色名称.
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $rbac = new Rbac();
            $rbac->updateItem($id, $model);
            Yii::$app->session->addFlash('success', '修改角色成功');
            return $this->redirect(['index']);
        }

        return $this->render('update', ['model' => $model]);
    }

    /**
     * 角色详细.
     * @param $id 角色名称.
      * @return string
     */
    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    /**
     * 删除角色.
     */
    public function actionDelete($id)
    {
        $model = new Rbac();
        $model->deleteItem($id, 'roles');
        Yii::$app->session->addFlash('success', '删除角色成功');
        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
