<?php

use yii\helpers\Html;
use yii\grid\GridView;
?>

<div class="padding-right-0px padding-left-0px">
    <div class="panel panel-default">
        <div class="panel-body">
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'parent',
                    'child',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {delete}',
                        'header' => '操作',
                        'headerOptions' => ['width' => '80'],
                        'buttons' => [
                            'update' => function () {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['/auth/empower/create']);
                                },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
