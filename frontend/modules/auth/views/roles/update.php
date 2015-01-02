<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '修改角色';
?>

<div class="padding-top-15px">
    <?= $this->render('/layouts/nav'); ?>

    <div class="col-lg-10">
        <h3 class="page-header">
            <i class="glyphicon glyphicon-pencil"></i>&nbsp;<?= Html::encode($this->title) ?>
        </h3>

        <div class="col-lg-3 padding-left-0px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><span class="glyphicon glyphicon-th"></span> 修改角色</strong>
                </div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin();?>
                        <?= $form->field($model, 'name')->textInput(); ?>
                        <?= $form->field($model, 'description')->textInput(); ?>
                        <?= Html::submitButton('<i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;修改角色', ['class' => 'btn btn-primary col-lg-12']) ?>
                    <?php ActiveForm::begin();?>
                </div>
            </div>
        </div>

    </div>
</div>
