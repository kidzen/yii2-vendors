<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\widgets\Growl;
?>
<div class="site-index">
    <section class="content-header">
        <h1>
            <?= Yii::t('app','Dashboard') ?>
            <small><?= Yii::t('app','Version '. Yii::$app->params['version']) ?></small>
        </h1>
        <!--        <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>-->
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua-gradient">
                            <div class="inner">
                                <h3>1</h3>

                                <p>Kemasukan Stok Baru Bulan Ini</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green-gradient">
                            <div class="inner">
                                <h3>1</h3>
                                <p>Pengeluaran Stok Bulan Ini</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow-gradient">
                            <div class="inner">
                                <h3>1</h3>

                                <p>Pendaftaran Kad Inventori Bulan Ini</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red-gradient">
                            <div class="inner">
                                <h3>1</h3>
                                <p>Pengesahan Pengeluaran Stok Bulan Ini</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>

                <!-- /.row -->
                <div class="row">
                    new content here
                </div>


            </section>

    </div>
