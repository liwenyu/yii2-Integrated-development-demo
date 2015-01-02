<?php
use center\modules\auth\models\AuthItemChild;

$a = 0;
$b = 0;
$c = 0;
$d = 0;
$e = 0;
$f = 0;
$g = 0;
$h = 0;
?>

<?php foreach ($child as $key => $val) { ?>
    <?php if ((explode('/', $val->name)[0]) === 'auth') { ?>

        <?php if($a === 0){ ?>
            <div class="col-lg-12 padding-left-0px">
                <h4 class="headline-1">
                    <span class="headline-1-index">权</span>
                    <span class="headline-content">权限模块</span>
                </h4>
            </div>
        <?php } ?>
        <div class="col-lg-3">
            <input type="checkbox" name="AuthItemChild[child][]" value=<?= $val->name; ?>
                <?= AuthItemChild::getUserAssignMent($val->name); ?>>&nbsp;<?= $val->description; ?>
        </div>

    <?php $a++; } else if((explode('/', $val->name)[0]) === 'user'){ ?>

        <?php if($b === 0){ ?>
            <div class="col-lg-12 padding-left-0px">
                <h4 class="headline-1">
                    <span class="headline-1-index">用</span>
                    <span class="headline-content">用户模块</span>
                </h4>
            </div>
        <?php } ?>
        <div class="col-lg-3">
            <input type="checkbox" name="AuthItemChild[child][]" value=<?= $val->name; ?>
                <?= AuthItemChild::getUserAssignMent($val->name); ?>>&nbsp;<?= $val->description; ?>
        </div>

    <?php $b++; } else if((explode('/', $val->name)[0]) === 'financial'){ ?>

        <?php if($c === 0){ ?>
            <div class="col-lg-12 padding-left-0px">
                <h4 class="headline-1">
                    <span class="headline-1-index">财</span>
                    <span class="headline-content">财务模块</span>
                </h4>
            </div>
        <?php } ?>
        <div class="col-lg-3">
            <input type="checkbox" name="AuthItemChild[child][]" value=<?= $val->name; ?>
                <?= AuthItemChild::getUserAssignMent($val->name); ?>>&nbsp;<?= $val->description; ?>
        </div>

    <?php $c++; } else if((explode('/', $val->name)[0]) === 'log'){ ?>

        <?php if($d === 0){ ?>
            <div class="col-lg-12 padding-left-0px">
                <h4 class="headline-1">
                    <span class="headline-1-index">日</span>
                    <span class="headline-content">日志模块</span>
                </h4>
            </div>
        <?php } ?>
        <div class="col-lg-3">
            <input type="checkbox" name="AuthItemChild[child][]" value=<?= $val->name; ?>
                <?= AuthItemChild::getUserAssignMent($val->name); ?>>&nbsp;<?= $val->description; ?>
        </div>

    <?php $d++; } else if((explode('/', $val->name)[0]) === 'message'){ ?>

        <?php if($e === 0){ ?>
            <div class="col-lg-12 padding-left-0px">
                <h4 class="headline-1">
                    <span class="headline-1-index">信</span>
                    <span class="headline-content">信息模块</span>
                </h4>
            </div>
        <?php } ?>
        <div class="col-lg-3">
            <input type="checkbox" name="AuthItemChild[child][]" value=<?= $val->name; ?>
                <?= AuthItemChild::getUserAssignMent($val->name); ?>>&nbsp;<?= $val->description; ?>
        </div>

    <?php $e++; } else if((explode('/', $val->name)[0]) === 'report'){ ?>

        <?php if($f === 0){ ?>
            <div class="col-lg-12 padding-left-0px">
                <h4 class="headline-1">
                    <span class="headline-1-index">报</span>
                    <span class="headline-content">报告模块</span>
                </h4>
            </div>
        <?php } ?>
        <div class="col-lg-3">
            <input type="checkbox" name="AuthItemChild[child][]" value=<?= $val->name; ?>
                <?= AuthItemChild::getUserAssignMent($val->name); ?>>&nbsp;<?= $val->description; ?>
        </div>

    <?php $f++; } else if((explode('/', $val->name)[0]) === 'setting'){ ?>

        <?php if($g === 0){ ?>
            <div class="col-lg-12 padding-left-0px">
                <h4 class="headline-1">
                    <span class="headline-1-index">设</span>
                    <span class="headline-content">设置模块</span>
                </h4>
            </div>
        <?php } ?>
        <div class="col-lg-3">
            <input type="checkbox" name="AuthItemChild[child][]" value=<?= $val->name; ?>
                <?= AuthItemChild::getUserAssignMent($val->name); ?>>&nbsp;<?= $val->description; ?>
        </div>

    <?php $g++; } else if((explode('/', $val->name)[0]) === 'strategy'){ ?>

        <?php if($h === 0){ ?>
            <div class="col-lg-12 padding-left-0px">
                <h4 class="headline-1">
                    <span class="headline-1-index">策</span>
                    <span class="headline-content">策略模块</span>
                </h4>
            </div>
        <?php } ?>
        <div class="col-lg-3">
            <input type="checkbox" name="AuthItemChild[child][]" value=<?= $val->name; ?>
                <?= AuthItemChild::getUserAssignMent($val->name); ?>>&nbsp;<?= $val->description; ?>
        </div>

    <?php $h++; } ?>
<?php } ?>
