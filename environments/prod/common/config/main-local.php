<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2prod',
            'username' => 'root',
            'password' => '',
            'enableQueryCache' => true,
            'enableSchemaCache' => true,
            'schemaCacheDuration' => false,
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
