<?php
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

                    [
                        'attribute' => 'name',
                        'label' => '权限名称',
                    ],
                    [
                        'attribute' => 'description',
                        'label' => '权限描述',
                    ],
                    [
                        'attribute' => 'created_at',
                        'label' => '创建时间',
                        'format' => ['date', 'php:Y-m-d H:i:s'],
                        'options' => ['width' => '180'],
                    ],
                    [
                        'attribute' => 'updated_at',
                        'label' => '更新时间',
                        'format' => ['date', 'php:Y-m-d H:i:s'],
                        'options' => ['width' => '180'],
                    ],
                    ['class' => 'yii\grid\ActionColumn', 'header' => '操作', 'headerOptions' => ['width' => '80']],
                ],
            ]);
            ?>
        </div>
    </div>
</div>
