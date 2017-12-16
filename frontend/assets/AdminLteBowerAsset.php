<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AdminLteBowerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components';
    public $js = [
        'jquery-slimscroll/jquery.slimscroll.min.js',
        // more plugin Js here
    ];
    public $css = [
        // 'datatables/dataTables.bootstrap.css',
        // more plugin CSS here
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}
