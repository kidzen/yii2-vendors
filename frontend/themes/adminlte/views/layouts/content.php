<?php
use yii\widgets\Breadcrumbs;
// use dmstr\widgets\Alert;

use kartik\widgets\Growl;
use yii\helpers\Html;
use yii\bootstrap\Modal;

Modal::begin([
    'id' => 'modalTutor',
    'size' => 'modal-lg',
    'header' => '<h2>Cara-cara Penggunaan Sistem' . Html::a('<i class="glyphicon glyphicon-print"></i> Print', ['site/tutor-pdf'], [
        'class' => 'pull-right btn btn-info',
        'target' => '_blank',
        'data-toggle' => 'tooltip',
        'title' => 'Print'
    ]) . '</h2>'
]);
echo "<div id='modalTutorContent'></div>";
Modal::end();
$this->registerCss('
a.cnavin {
    color:#00a65a;
}
a.cnavout {
    color:#dd4b39;
}
a.cnavapp {
    color:#337ab7;
}
a.cnavinv {
    color:#BF8233;
}
a.cnavreport {
    color:mediumorchid;
}
a.cnavinfo {
    color:darkcyan;
}
.nav-div {
     text-align: center;
}
');

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
            ) ?>
        </section>
        <section id="content-nav">
            <div class="placeholders delay row">
                <div class="col-xs-6 col-sm-2 placeholder delay-child">
                    <div class="nav-div">
                        <!--color: #00a65a-->
                        <?= Html::a(Yii::t('app', '<i style="text-align: center;font-size: 4em;" class="fa fa-download" aria-hidden="true"></i>'), ['/request/checkin'], ['class' => 'cnavin']); ?>
                        <h4 class="text-muted"><?= Yii::t('app', 'Checkin') ?></h4>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-2 placeholder delay-child">
                    <div class="nav-div">
                        <?= Html::a(Yii::t('app', '<i style="text-align: center;font-size: 4em;" class="fa fa-upload" aria-hidden="true"></i>'), ['request/checkout'], ['class' => 'cnavout']); ?>
                        <h4 class="text-muted"><?= Yii::t('app', 'Checkout') ?></h4>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-2 placeholder delay-child">
                    <div class="nav-div">
                        <?= Html::a(Yii::t('app', '<i style="text-align: center;font-size: 4em;" class="fa fa-check-square-o" aria-hidden="true"></i>'), ['request/index2'], ['class' => 'cnavapp']); ?>
                        <h4 class="text-muted"><?= Yii::t('app', 'Approval') ?></h4>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-2 placeholder delay-child">
                    <div class="nav-div">
                        <?= Html::a(Yii::t('app', '<i style="text-align: center;font-size: 4em;" class="fa fa-cubes" aria-hidden="true"></i>'), ['inventory-item/index'], ['class' => 'cnavinv']); ?>
                        <h4 class="text-muted"><?= Yii::t('app', 'Inventory') ?></h4>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-2 placeholder delay-child">
                    <div class="nav-div">
                        <?= Html::a(Yii::t('app', '<i style="text-align: center;font-size: 4em;" class="fa fa-line-chart" aria-hidden="true"></i>'), ['report/quaterly'], ['class' => 'cnavreport']); ?>
                        <h4 class="text-muted"><?= Yii::t('app', 'Laporan') ?></h4>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-2 placeholder delay-child">
                    <div class="nav-divinv" style="text-align: center">
                        <?php echo Html::a(Yii::t('app', '<i style="text-align: center;font-size: 4em;" class="fa fa-info-circle" aria-hidden="true"></i>'), false, ['class' => 'tutorButton cnavinfo']); ?>
                        <h4 class="text-muted"><?= Yii::t('app', 'Info') ?></h4>
                    </div>
                </div>

            </div>
        </section>

        <section class="content">
            <?php
            $delay = 0;
            foreach (Yii::$app->session->getAllFlashes() as $message):;
                echo \kartik\widgets\Growl::widget([
                    'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
                    'title' => (!empty($message['title'])) ? Html::encode($message['title']) : null,
                    'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
                    'body' => (!empty($message['message'])) ? $message['message'] : 'Message Not Set!',
                    'showSeparator' => true,
                'delay' => $delay, //This delay is how long before the message shows
                'pluginOptions' => [
                    'showProgressbar' => true,
                    'delay' => (!empty($message['duration'])) ? $message['duration'] + $delay : 3000, //This delay is how long the message shows for
                    'placement' => [
                        'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                        'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                    ]
                ]
            ]);
                $delay = $delay + 1000;
            endforeach;
            ?>
            <?= $content ?>
        </section>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 3.0
        </div>
        <strong>Copyright &copy; <?=
        date('Y');
        echo Html::a(Yii::$app->params['companyNameFull'], false)
        ?>.</strong> All rights
        reserved.
    </footer>
