<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Post $model
 */

$this->title = '权限详情';
?>

<div class="padding-top-15px">
    <?= $this->render('/layouts/nav'); ?>

    <div class="col-lg-10">

        <h3 class="page-header">
            <i class="glyphicon glyphicon-eye-open"></i>&nbsp;<?= Html::encode($this->title) ?>
            <?= Html::a('<i class="glyphicon glyphicon-edit"></i>&nbsp;修改权限', ['update', 'id' => $model->name], ['class' => 'btn btn-success pull-right']) ?>
        </h3>

        <div class="padding-right-0px padding-left-0px">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [
                                'attribute' => 'name',
                                'label' => '许可名称',
                            ],
                            [
                                'attribute' => 'description',
                                'label' => '许可描述',
                            ],
                            [
                                'attribute' => 'rule_name',
                                'label' => '验证名称',
                            ],
                            [
                                'attribute' => 'data',
                                'label' => '数据',
                            ],
                            [
                                'attribute' => 'created_at',
                                'format' => ['date', 'php:Y-m-d H:i:s'],
                                'label' => '创建时间',
                            ],
                            [
                                'attribute' => 'updated_at',
                                'format' => ['date', 'php:Y-m-d H:i:s'],
                                'label' => '更新时间',
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
