<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'crud'   => [
                'class'     => 'common\gii\crud\Generator',
                'templates' => [
                    'mootensai' => '@vendor/mootensai/yii2-enhanced-gii/crud/default',
                    'bug' => '@common/gii/crud/old',
                    'stable' => '@common/gii/crud/stable',
                    'dev' => '@common/gii/crud/dev',
                ]
            ],
            'model'   => [
                'class'     => 'common\gii\model\Generator',
                'templates' => [
                    'mootensai' => '@vendor/mootensai/yii2-enhanced-gii/model/default',
                    'bug' => '@common/gii/crud/old',
                    'stable' => '@common/gii/crud/stable',
                    'dev' => '@common/gii/crud/dev',
                ]
            ],
        ]
    ];
}

return $config;
