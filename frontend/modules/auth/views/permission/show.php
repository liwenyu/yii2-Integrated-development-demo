<?php
use yii\helpers\Html;
?>

<div class="col-lg-10 col-lg-offset-1">
    <div class="page">
        <div class="ui-timline-container">
            <section class="ui-timeline">
                <article class="tl-item">
                    <div class="tl-body">
                        <div class="tl-entry">
                            <div class="tl-caption">
                                <a href="javascript:;" class="btn btn-danger btn-block">1、第一步</a>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="tl-item">
                    <div class="tl-body">
                        <div class="tl-entry">

                            <div class="tl-icon round-icon sm bg-info"><i class="fa fa-asterisk"></i></div>
                            <div class="tl-content">
                                <h4 class="tl-tile text-primary">组织结构</h4>
                                <p>如果您目前还没有组织结构的话，建议您先创建组织结构。系统会为您自动生成明显的层级结构，<?= Html::a('去创建组织结构', [''], ['class' => 'text-primary']) ?></p>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="tl-item">
                    <div class="tl-body">
                        <div class="tl-entry">
                            <div class="tl-caption">
                                <a href="javascript:;" class="btn btn-primary btn-block">2、第二步</a>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="tl-item alt">
                    <div class="tl-body">
                        <div class="tl-entry">
                            <div class="tl-icon round-icon sm bg-warning"><i class="fa fa-asterisk"></i></div>
                            <div class="tl-content">
                                <h4 class="tl-tile text-danger">创建权限</h4>
                                <p>权限是一组特殊的字符，用来验证登陆用户能有哪些操作，<?= Html::a('去创建权限', ['/auth/permission/index'], ['class' => 'text-primary']) ?></p>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="tl-item">
                    <div class="tl-body">
                        <div class="tl-entry">
                            <div class="tl-caption">
                                <a href="javascript:;" class="btn btn-success btn-block">3、第三步</a>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="tl-item">
                    <div class="tl-body">
                        <div class="tl-entry">
                            <div class="tl-icon round-icon sm bg-success"><i class="fa fa-asterisk"></i></div>
                            <div class="tl-content">
                                <h4 class="tl-tile text-warning">创建角色</h4>
                                <p>角色在整个权限系统是非常重要的一个环节，它是连接权限和用户的纽带，将用户赋予角色，角色赋予权限，这个整个权限系统才能生效，
                                    <?= Html::a('去创建角色', ['/auth/roles/index'], ['class' => 'text-primary']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="tl-item">
                    <div class="tl-body">
                        <div class="tl-entry">
                            <div class="tl-caption">
                                <a href="javascript:;" class="btn btn-info btn-block">4、第四步</a>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="tl-item alt">
                    <div class="tl-body">
                        <div class="tl-entry">
                            <div class="tl-icon round-icon sm bg-danger"><i class="fa fa-asterisk"></i></div>
                            <div class="tl-content">
                                <h4 class="tl-tile text-success">赋权</h4>
                                <p>赋权这一步是至关重要的，一定要仔细操作。如果为角色赋予了不恰当的权限，轻则数据丢失，导致系统不稳定，重择引起法律纠纷，一定要仔细斟酌操作，
                                    <?= Html::a('去赋权', ['/auth/empower/index'], ['class' => 'text-primary']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="tl-item">
                    <div class="tl-body">
                        <div class="tl-entry">
                            <div class="tl-caption">
                                <a href="javascript:;" class="btn btn-success btn-block">5、第五步</a>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="tl-item">
                    <div class="tl-body">
                        <div class="tl-entry">
                            <div class="tl-icon round-icon sm bg-primary"><i class="fa fa-asterisk"></i></div>
                            <div class="tl-content">
                                <h4 class="tl-tile text-info">为角色绑定组织结构</h4>
                                <p>为角色绑定组织结构，
                                    <?= Html::a('去绑定结构', [''], ['class' => 'text-primary']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="tl-item">
                    <div class="tl-body">
                        <div class="tl-entry">
                            <div class="tl-caption">
                                <a href="javascript:;" class="btn btn-success btn-block">OK</a>
                            </div>
                        </div>
                    </div>
                </article>

            </section>
        </div>
    </div>
</div>