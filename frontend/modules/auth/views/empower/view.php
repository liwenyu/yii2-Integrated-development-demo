<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model center\modules\auth\models\AuthItemChild */

$this->title = $model->parent;
?>

<div class="padding-top-15px">
    <?= $this->render('/layouts/nav'); ?>

    <div class="col-lg-10">
        <h3 class="page-header">
            <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<?= Html::encode($this->title) ?>
            <div class="pull-right">
                <?=
                Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;删除', ['delete', 'parent' => $model->parent, 'child' => $model->child], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <div class="pull-right margin-right-5px">
                <?= Html::a('<i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;修改', ['create'], ['class' => 'btn btn-primary']) ?>
            </div>
        </h3>

        <div class="padding-right-0px padding-left-0px">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'parent',
                            'child',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>