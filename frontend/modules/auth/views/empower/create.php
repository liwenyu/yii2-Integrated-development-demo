<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model center\modules\auth\models\AuthItemChild */

$this->title = '创建赋权';
?>

<style>
    #authitemchild-child .checkbox {
        width: 160px;
        float: left;
    }
</style>
<script>
    function pushValue(value) {
        $.ajax({
            url: 'ajax',
            type: 'POST',
            data: {parent: value},
            dataType: 'text',
            contentType: 'application/x-www-form-urlencoded',
            async: false,
            success: function (mydata) {
                document.location.reload();
            },
        });
    }
</script>

<div class="padding-top-15px">
    <?= $this->render('/layouts/nav'); ?>

    <div class="col-lg-10">
        <h3 class="page-header">
            <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<?= Html::encode($this->title) ?>
        </h3>

        <div>
            <?= $this->render('/layouts/alter'); ?>
            <?= $this->render('create_view', ['parent' => $parent, 'child' => $child]); ?>
        </div>
    </div>
</div>