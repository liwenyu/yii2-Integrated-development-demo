<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model center\modules\auth\models\AuthAssignment */

$this->title = $model->item_name;
?>

<div class="padding-top-15px">
    <?= $this->render('/layouts/nav'); ?>

    <div class="col-lg-10">
        <h3 class="page-header">
            <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<?= Html::encode($this->title) ?>
            <?= $this->render('_view', ['model' => $model]); ?>
        </h3>

        <div class="padding-right-0px padding-left-0px">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'item_name:text',
                            'user_id:text',
                            [
                                'attribute' => 'created_at',
                                'format' => ['date', 'php: Y-m-d H:i:s'],
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
