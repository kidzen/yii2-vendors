<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'language' => 'ms-MY',
    'sourceLanguage' => 'en-US',
    'components' => [
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/language',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@frontend/views' => '@frontend/themes/adminlte/views',
                    // '@frontend/views' => '@frontend/themes/gentella/views',
                    // '@frontend/views' => '@vendor/yiister/yii2-gentelella/views',
                    // '@frontend/views' => '@frontend/themes/sbadmin2/views',
                    // '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'class' => 'common\components\User',
            'identityClass' => 'common\models\identity\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'notify' => [
            'class' => 'common\components\Notify',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'modules' => [
        // If you use tree table
        'treemanager' => [
            'class' => '\kartik\tree\Module',
        // see settings on http://demos.krajee.com/tree-manager#module
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
        ],
        'datecontrol' => [
            'class' => '\kartik\datecontrol\Module',
        ],
        'dynagrid' => [
            'class' => '\kartik\dynagrid\Module',
            'maxPageSize' => 200,
            'defaultPageSize' => 10,
            'dynaGridOptions' => [
                'storage' => kartik\dynagrid\DynaGrid::TYPE_SESSION,
                'gridOptions' => [],
                'matchPanelStyle' => false,
                'toggleButtonGrid' => [],
                'options' => [],
                'sortableOptions' => [],
                'userSpecific' => true,
                'columns' => [],
                'submitMessage' => Yii::t('kvdynagrid', 'Saving and applying configuration') . ' &hellip;',
                'deleteMessage' => Yii::t('kvdynagrid', 'Trashing all personalizations') . ' &hellip;',
                'deleteConfirmation' => Yii::t('kvdynagrid', 'Are you sure you want to delete the setting?'),
                'messageOptions' => [],
                'gridOptions'=>[
                    'filterSelector' => 'select[name="per-page"]',
                    'responsiveWrap'=>false,
                    'showPersonalize'=>true,
                ],
            ],
        ],
        'debug' => ['class' => 'yii\debug\Module'], //remove on production
    ],
    'params' => $params,
];
