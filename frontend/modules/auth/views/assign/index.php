<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\UserModel;

/* @var $this yii\web\View */
/* @var $searchModel center\modules\auth\models\AuthAssignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '指派用户';
?>
<div class="padding-top-15px">
    <?= $this->render('/layouts/nav'); ?>

    <div class="col-lg-10">
        <h3 class="page-header">
            <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<?= Html::encode($this->title) ?>
            <?= Html::a('<i class="glyphicon glyphicon-flag"></i>&nbsp;&nbsp;为用户赋予角色', ['create'], ['class' => 'btn btn-success pull-right']) ?>
        </h3>

        <div>
            <?= $this->render('/layouts/alter'); ?>
            <?= $this->render('index_view', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]); ?>
        </div>
    </div>
</div>