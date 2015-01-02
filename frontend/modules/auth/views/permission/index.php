<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '权限管理';
?>

<div class="padding-top-15px">
    <?= $this->render('/layouts/nav'); ?>

    <div class="col-lg-10">
        <h3 class="page-header">
            <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<?= Html::encode($this->title) ?>
            <?= Html::button('<i class="glyphicon glyphicon-flag"></i>&nbsp;创建权限', ['class' => 'btn btn-success pull-right', 'data-toggle' => 'modal', 'data-target' => '.bs-example-modal-sm']) ?>
        </h3>

        <div>
            <?= $this->render('/layouts/alter'); ?>
            <?= $this->render('index_view', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]); ?>
        </div>
    </div>
</div>

<!-- 弹框显示创建权限 -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <?php $form = ActiveForm::begin(['action' => 'create', 'id' => 'createpermission-form']); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-flag"></i>&nbsp创建权限</h4>
                </div>
                <div class="modal-body">
                    <?= $form->field($model, 'name')->textInput(); ?>
                    <?= $form->field($model, 'description')->textInput(); ?>
                </div>
                <div class="modal-footer">
                    <?= Html::submitButton('<i class="glyphicon glyphicon-flag"></i>&nbsp;创建权限', ['class' => 'btn btn-success  col-lg-12']); ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>