<?php

use yii\helpers\Html;
?>

<div class="pull-right">
    <?=
    Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;删除', ['delete', 'item_name' => $model->item_name, 'user_id' => $model->user_id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>
</div>
<div class="pull-right margin-right-5px">
    <?=
    Html::a('<i class="glyphicon glyphicon-flag"></i>&nbsp;&nbsp;为用户赋予角色', ['create'],
        ['class' => 'btn btn-success pull-right']) ?>
</div>