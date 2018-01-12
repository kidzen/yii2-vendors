<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */



if (class_exists('backend\assets\AppAsset')) {
    backend\assets\AppAsset::register($this);
} else {
    app\assets\AppAsset::register($this);
}

// dmstr\web\AdminLteAsset::register($this);
frontend\assets\CustomAsset::register($this);

$directoryAsset = Yii::getAlias('@web/dist');
// $this->registerJsFile($directoryAsset.'/js/custom.js', ['depends' => [yii\web\JqueryAsset::className()]]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(Yii::t('app',Yii::$app->params['appName'])) ?></title>
    <!-- <link rel="manifest" href="manifest.json"> -->
    <!-- <meta name="mobile-web-app-capable" content="yes"> -->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-purple-light sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        );
        ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        );
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        );
        ?>

    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
