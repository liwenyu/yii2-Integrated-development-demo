<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\UserModel;
use frontend\modules\auth\models\AuthItem;

/* @var $this yii\web\View */
/* @var $searchModel center\modules\auth\models\AuthAssignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '添加用户';
?>
<div class="padding-top-15px">
    <?= $this->render('/layouts/nav'); ?>

    <div class="col-lg-10">
        <h3 class="page-header">
            <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<?= Html::encode($this->title) ?>
        </h3>

        <div class="col-lg-3 padding-left-0px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><span class="glyphicon glyphicon-th"></span> 添加用户</strong>
                </div>
                <div class="panel-body">
                    <?PHP $form = ActiveForm::begin(); ?>
                        <?= $form->field($model, 'item_name')->dropDownList(ArrayHelper::map(AuthItem::findAll(['type' => '1']), 'name', 'description')); ?>
                        <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(UserModel::find()->all(), 'id', 'username')); ?>
                        <?= Html::submitButton('<i class="glyphicon glyphicon-flag"></i>&nbsp;&nbsp;提交', ['class' => 'btn btn-success  col-lg-12']); ?>
                    <?PHP ActiveForm::end(); ?>
                </div>
            </div>
        </div>

        <div class="col-lg-9 padding-right-0px padding-left-0px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><span class="glyphicon glyphicon-th"></span> 辅助信息</strong>
                </div>
                <div class="panel-body"></div>
            </div>
        </div>
    </div>
</div>