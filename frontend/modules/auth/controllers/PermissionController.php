<?php

namespace frontend\modules\auth\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use center\modules\auth\models\Rbac;
use center\modules\auth\models\AuthItem;
use center\modules\auth\models\AuthItemSearch;

class PermissionController extends Controller
{
    public function beforeAction($action)
    {
        if (\Yii::$app->user->can(Yii::$app->request->pathInfo)) {
            return true;
        } else {
            return $this->goBack();
        }
    }

    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new AuthItem();
        $searchModel = new AuthItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $model->auth_item_type_2);

        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 创建权限.
     * @return string
     */
    public function actionCreate()
    {
        $model = new AuthItem();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $auth = Yii::$app->authManager;
            $createPost = $auth->createPermission($model->name);
            $createPost->description = $model->description;
            $auth->add($createPost);

            Yii::$app->session->addFlash('success', '添加权限成功');
            return $this->redirect(['index']);
        } else {
            Yii::$app->session->addFlash('danger', '添加权限失败。 失败原因： 此权限已经存在');
            return $this->redirect(['index']);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $rbac = new Rbac();
            $rbac->updateItem($id, $model);
            Yii::$app->session->addFlash('success', '修改权限成功');
            return $this->redirect(['index']);
        }

        return $this->render('update', ['model' => $model]);
    }

    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    /**
     * 删除权限.
     */
    public function actionDelete($id)
    {
        $model = new Rbac();
        $model->deleteItem($id, 'permission');
        Yii::$app->session->addFlash('success', '删除权限成功');
        return $this->redirect(['index']);
    }

    /**
     * 详细讲述权限的使用方法.
     * @return string
     */
    public function actionShow()
    {
        return $this->render('show');
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
