<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">'.Yii::$app->params['companyNameShort'].'</span><span class="logo-lg"><img src="' . Yii::$app->params['companyLogoIcon'] . '" style="padding-right: 10px;height: 50px; " alt="'.Yii::$app->params['companyLogoIcon'].'">'.Yii::$app->params['companyNameShort'].'</></span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <?php if (isset(Yii::$app->user->id)) { ?>
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may
                                        not fit into the page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= Yii::$app->user->avatar ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= Yii::$app->user->name ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?= Yii::$app->user->name ?>
                                <small><?= Yii::$app->user->role ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?=
                                Html::a(
                                        'Profil', ['user/view', 'id' => Yii::$app->user->id], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                )
                                ?>
                            </div>

                            <div class="pull-right">
                                <?=
                                Html::a(
                                        'Log Keluar', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                )
                                ?>
                            </div>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <!-- User Account: style can be found in dropdown.less -->
<!--                 <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
 -->            </ul>
        </div>
    </nav>
</header>
