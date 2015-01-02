<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['id' => 'empowerment-form']); ?>
    <div class="col-lg-3 padding-left-0px">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><span class="glyphicon glyphicon-th"></span> 角色</strong>
            </div>
            <div class="panel-body">
                <select id="authitemchild-parent" class="form-control" name="AuthItemChild[parent]"
                        onchange="pushValue(value)">
                    <?php foreach ($parent as $val): ?>
                        <option value=<?= $val->name; ?>
                            <?php if (Yii::$app->session['EmpowermenParent'] === $val->name) {
                                echo "selected";
                            }; ?>><?= $val->name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

<div class="col-lg-9 padding-left-0px padding-right-0px">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong><span class="glyphicon glyphicon-th"></span> 权限</strong>
        </div>

        <div class="panel-body" id="authitemchild-child">
            <?= $this->render('create_foreach_view', ['child' => $child]); ?>
        </div>

        <div class="panel-footer">
            <?= Html::submitButton('<i class="glyphicon glyphicon-pencil"></i>&nbsp;创建授权', ['class' => 'btn btn-success']); ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>