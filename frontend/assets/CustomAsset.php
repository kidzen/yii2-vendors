<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class CustomAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/dist';
    public $css = [
        'css/animate.min.css',
        'css/animate.delay.css',
    ];
    public $js = [
        'js/custom.js'
    ];
    public $depends = [
        // 'frontend\assets\AppAsset',
        'dmstr\web\AdminLteAsset',
        // 'frontend\assets\AdminLtePluginAsset',
        'frontend\assets\AdminLteBowerAsset',
    ];
}
