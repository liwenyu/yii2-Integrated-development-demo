<?php

namespace frontend\modules\auth\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use center\modules\auth\models\AuthItem;
use center\modules\auth\models\AuthItemChild;
use center\modules\auth\models\AuthItemChildSearch;

/**
 * EmpowerController implements the CRUD actions for AuthItemChild model.
 */
class EmpowerController extends Controller
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
     * Lists all AuthItemChild models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthItemChildSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItemChild model.
     * @param string $parent
     * @param string $child
     * @return mixed
     */
    public function actionView($parent, $child)
    {
        return $this->render('view', [
            'model' => $this->findModel($parent, $child),
        ]);
    }

    /**
     * Creates a new AuthItemChild model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $item = new AuthItemChild();
        $parent = AuthItem::findAll(['type' => 1]);
        $child = AuthItem::findAll(['type' => 2]);

        if ($item->load(Yii::$app->request->post())) {
            if ($item->attributes['child']) {
                foreach ($item->attributes['child'] as $val) {
                    $validated = AuthItemChild::validated($item->parent, $val); //验证权限组合是否已经存在.
                    if (empty($validated)) {
                        AuthItemChild::createEmpowerment($item->parent, $val); // 新增权限赋权操作.
                    }

                    if (!empty(Yii::$app->session['empower_child_data'])) {
                        foreach (Yii::$app->session['empower_child_data'] as $key => $value) {
                            if ($val == $value) {
                                $deleteChild[] = $key;
                            } else {
                                $deleteChild[] = '';
                            }
                        }

                        $a = Yii::$app->session['empower_child_data'];
                        foreach ($deleteChild as $val) {
                            unset($a[$val]);
                        }

                        foreach ($a as $v) {
                            AuthItemChild::deleteAll(['parent' => $item->parent, 'child' => $v]);
                        }
                    }
                }
            } else {
                $itemchild = AuthItemChild::findAll(['parent' => $item->parent]);
                foreach ($itemchild as $val) {
                    $type = AuthItem::findOne(['name' => $val['child']])->type;
                    if ($type == 2) {
                        AuthItemChild::deleteAll(['parent' => $item->parent, 'child' => $val['child']]);
                    }
                }
            }

            AuthItemChild::pullSessionChildData($item->parent); //将变更的权限组合及时更新,使页面数据的显示精确无误.
            Yii::$app->session->addFlash('success', '创建赋权成功.');
            return $this->redirect('create');
        }

        return $this->render('create', [
            'parent' => $parent,
            'child' => $child,
        ]);
    }

    /**
     * 获取 ajax 传参. 将权限存储进session中.
     */
    public function actionAjax()
    {
        $data = Yii::$app->getRequest()->getBodyParams();

        Yii::$app->session['EmpowermenParent'] = $data['parent'];
        AuthItemChild::pullSessionChildData(Yii::$app->session['EmpowermenParent']);
    }

    public function actionDelete($parent, $child){
        $this->findModel($parent, $child)->delete();
        Yii::$app->session->addFlash('success', '删除赋权成功.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItemChild model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $parent
     * @param string $child
     * @return AuthItemChild the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($parent, $child)
    {
        if (($model = AuthItemChild::findOne(['parent' => $parent, 'child' => $child])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
