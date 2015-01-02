<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel center\modules\auth\models\AuthItemChildSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '角色赋权';
?>
<div class="padding-top-15px">
    <?= $this->render('/layouts/nav'); ?>

    <div class="col-lg-10">
        <h3 class="page-header">
            <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<?= Html::encode($this->title) ?>
            <?= Html::a('<i class="glyphicon glyphicon-flag"></i>&nbsp;创建赋权',['/auth/empower/create'], ['class' => 'btn btn-success pull-right']) ?>
        </h3>

        <div>
            <?= $this->render('/layouts/alter'); ?>
            <?= $this->render('index_view', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]); ?>
        </div>
    </div>
</div>