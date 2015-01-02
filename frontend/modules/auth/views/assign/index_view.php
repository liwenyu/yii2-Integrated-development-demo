<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\UserModel;
?>

<div class="padding-right-0px padding-left-0px">
    <div class="panel panel-default">
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'item_name',
                    [
                        'label' => '用户名称',
                        'content' => function($dataProvider){
                                return UserModel::getUserName($dataProvider['user_id']);
                            },
                    ],
                    'user_id',
                    [
                        'label' => '创建时间',
                        'content' => function($dataProvider){
                                return date('Y-m-d H:i:s', $dataProvider['created_at']);
                            }
                    ],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {delete}',
                        'header' => '操作',
                        'headerOptions' => ['width' => '80'],
                        'buttons' => [
                            'update' => function () {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['/auth/assign/create']);
                                },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
