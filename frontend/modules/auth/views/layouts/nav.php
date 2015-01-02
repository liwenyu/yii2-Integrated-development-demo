<?php
use frontend\widgets\SideNavWidget;
?>

<style>
    .col-lg-2 .list-group .list-group-item{padding:10px;}
</style>

<div class="col-lg-2  col-md-2 col-xs-2">
    <?=
    SideNavWidget::widget([
        'encodeLabels' => false,
        'items' => [
            /*[
                'label' => '&nbsp;&nbsp;<i class="glyphicon glyphicon-user"></i> &nbsp;组织结构',
                'url' => [''],
                'active' => \Yii::$app->controller->route == '',
            ],*/
            [
                'label' => '&nbsp;&nbsp;<i class="glyphicon glyphicon-star glyphicon"></i> &nbsp;权限管理',
                'url' => ['/auth/permission/index'],
                'active' => Yii::$app->controller->id == 'permission',
            ],
            [
                'label' => '&nbsp;&nbsp;<i class="glyphicon glyphicon-user"></i> &nbsp;角色管理',
                'url' => ['/auth/roles/index'],
                'active' => Yii::$app->controller->id == 'roles',
            ],
            [
                'label' => '&nbsp;&nbsp;<i class="glyphicon glyphicon-random"></i> &nbsp;角色赋权',
                'url' => ['/auth/empower/index'],
                'active' => Yii::$app->controller->id == 'empower',
            ],
            [
                'label' => '&nbsp;&nbsp;<i class="glyphicon glyphicon-plus"></i> &nbsp;添加用户',
                'url' => ['/auth/assign/index'],
                'active' => Yii::$app->controller->id == 'assign',
            ],
            /*[
                'label' => '&nbsp;&nbsp;<i class="glyphicon glyphicon-log-in"></i> &nbsp;绑定结构',
                'url' => [''],
                'active' => \Yii::$app->controller->route == 'show/record',
            ],*/
            [
                'label' => '&nbsp;&nbsp;<i class="glyphicon glyphicon-list-alt"></i> &nbsp;使用说明',
                'url' => ['/auth/permission/show'],
            ],
        ],
    ]);
    ?>
</div>