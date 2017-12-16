<?php
switch (Yii::$app->db->driverName) {
    case 'mysql':
    $script = "SELECT table_name as TABLE_NAME
    FROM information_schema.tables
    WHERE table_schema = 'estor4'";
    break;
    case 'oci':
    $script = "
    SELECT
    TABLE_NAME
    FROM USER_TABLES
    UNION ALL
    SELECT
    VIEW_NAME AS TABLE_NAME
    FROM USER_VIEWS
    UNION ALL
    SELECT
    MVIEW_NAME AS TABLE_NAME
    FROM USER_MVIEWS
    ORDER BY TABLE_NAME
    ";

    break;
    default:
    $script = false;
    break;
}
if($script){
    $query = Yii::$app->db->createCommand($script)->queryAll();
    foreach ($query as $key => $value) {
        $url = '/'.strtr($value['TABLE_NAME'], '_', '-');
        $label = strtr($value['TABLE_NAME'], '_', ' ');
        $items[] = ['label' => $label, 'url' => [$url]];
    }
}

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div style="text-align: center">
                <img src="<?= Yii::$app->params['leftMenuImg'] ?>" style="width: 200px" alt="Mohor_rasmi_Majlis_Perbandaran_Seberang_Perai"/>
            </div>
        </div>

        <!-- search form -->
<!--         <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
    -->        <!-- /.search form -->
    <?= dmstr\widgets\Menu::widget(
        [
            'options' => ['class' => 'sidebar-menu tree delay', 'data-widget'=> 'tree'],
            'items' => [
                ['label' => Yii::t('app','Request'), 'options' => ['class' => 'header']],
                [
                    'label' => Yii::t('app','Login'), 'url' => ['/site/login'],
                    'visible' => Yii::$app->user->isGuest
                ],
                [
                    'label' => Yii::t('app','Stock In'),
                    'items' => [
                        ['label' => Yii::t('app','Stock Registration'), 'icon' => 'file-code-o', 'url' => ['/request/checkin']],
                        ['label' => Yii::t('app','Card Registration'), 'icon' => 'file-code-o', 'url' => ['/request/card-registration']],
                        ['label' => Yii::t('app','Transaction In'), 'icon' => 'file-code-o', 'url' => ['/request/checkin-list']],
                            // ['label' => Yii::t('app','Transaction In'), 'icon' => 'file-code-o', 'url' => ['/transaction/checkin']],
                    ],
                    // 'visible' => Yii::$app->user->isGuest,
                ],
                [
                    'label' => Yii::t('app','Stock Out'),
                    'items' => [
                        ['label' => Yii::t('app','Checkout'), 'icon' => 'file-code-o', 'url' => ['/request/checkout']],
                        ['label' => Yii::t('app','Instruction Order'), 'icon' => 'file-code-o', 'url' => ['/request/instruction']],
                        ['label' => Yii::t('app','Transaction Out'), 'icon' => 'file-code-o', 'url' => ['/request/checkout-list']],
                    ],
                    // 'visible' => Yii::$app->user->isGuest,
                ],
                [
                    'label' => Yii::t('app','Disposal'),
                    'items' => [
                        ['label' => Yii::t('app','Dispose'), 'icon' => 'file-code-o', 'url' => ['/request/dispose']],
                        ['label' => Yii::t('app','Disposal List'), 'icon' => 'file-code-o', 'url' => ['/request/dispose-index']],
                    ],
                    // 'visible' => Yii::$app->user->isGuest,
                ],
                [
                    'label' => Yii::t('app','Budget'),
                    'items' => [
                        ['label' => Yii::t('app','Budget Registration'), 'icon' => 'file-code-o', 'url' => ['/budget/create']],
                        ['label' => Yii::t('app','Budget Grant'), 'icon' => 'file-code-o', 'url' => ['/budget/grant']],
                    ],
                    // 'visible' => Yii::$app->user->isGuest,
                ],
                ['label' => Yii::t('app','Admin Section'), 'options' => ['class' => 'header']],
                [
                    'label' => Yii::t('app','Store Management'),
                    'items' => [
                        ['label' => Yii::t('app','Category'), 'icon' => 'file-code-o', 'url' => ['/inventory-category/index']],
                        ['label' => Yii::t('app','Inventory Card'), 'icon' => 'file-code-o', 'url' => ['/inventory/index']],
                        ['label' => Yii::t('app','Stock'), 'icon' => 'file-code-o', 'url' => ['/inventory-item/index']],
                        ['label' => Yii::t('app','Store'), 'icon' => 'file-code-o', 'url' => ['/store/index']],
                    ],
                    // 'visible' => Yii::$app->user->isGuest,
                ],
                [
                    'label' => Yii::t('app','List Management'),
                    'items' => [
                        ['label' => Yii::t('app','Vendor'), 'icon' => 'file-code-o', 'url' => ['/vendor/index']],
                        ['label' => Yii::t('app','Vehicle'), 'icon' => 'file-code-o', 'url' => ['/vehicle/index']],
                        ['label' => Yii::t('app','Workshop'), 'icon' => 'file-code-o', 'url' => ['/workshop/index']],
                        ['label' => Yii::t('app','Usage Category'), 'icon' => 'file-code-o', 'url' => ['/usage-category/index']],
                        ['label' => Yii::t('app','Usage List'), 'icon' => 'file-code-o', 'url' => ['/usage-list/index']],
                    ],
                    // 'visible' => Yii::$app->user->isGuest,
                ],
                [
                    'label' => Yii::t('app','System Management'),
                    'items' => [
                        ['label' => Yii::t('app','Access'), 'icon' => 'file-code-o', 'url' => ['/role/index']],
                        ['label' => Yii::t('app','Users'), 'icon' => 'file-code-o', 'url' => ['/user/index']],
                        ['label' => Yii::t('app','My Profile'), 'icon' => 'file-code-o', 'url' => ['/profile/index']],
                        ['label' => Yii::t('app','Activity Log'), 'icon' => 'file-code-o', 'url' => ['/activity-log/index']],
                        ['label' => Yii::t('app','System Maintenance'), 'icon' => 'file-code-o', 'url' => ['/system/maintenance']],
                    ],
                    // 'visible' => Yii::$app->user->isGuest,
                ],
                ['label' => Yii::t('app','Reporting'), 'options' => ['class' => 'header']],
                [
                    'label' => Yii::t('app','Form'),
                    'items' => [
                        ['label' => Yii::t('app','KEWPA Form'), 'icon' => 'file-code-o', 'url' => ['/request/checkin']],
                        ['label' => Yii::t('app','KEWPS Form'), 'icon' => 'file-code-o', 'url' => ['/request/checkin']],
                    ],
                    // 'visible' => Yii::$app->user->isGuest,
                ],
                [
                    'label' => Yii::t('app','Report'),
                    'items' => [
                        ['label' => Yii::t('app','Quaterly Report'), 'icon' => 'file-code-o', 'url' => ['/request/checkin']],
                        ['label' => Yii::t('app','Monthly Report'), 'icon' => 'file-code-o', 'url' => ['/request/checkin']],
                        ['label' => Yii::t('app','Yearly Report'), 'icon' => 'file-code-o', 'url' => ['/request/checkin']],
                        ['label' => Yii::t('app','Supplier Report'), 'icon' => 'file-code-o', 'url' => ['/vendor-usage/index']],
                        ['label' => Yii::t('app','Vehicle Report'), 'icon' => 'file-code-o', 'url' => ['/vehicle-usage/index']],
                        ['label' => Yii::t('app','Budget Report'), 'icon' => 'file-code-o', 'url' => ['/budget-usage/index']],
                    ],
                    // 'visible' => Yii::$app->user->isGuest,
                ],
                ['label' => Yii::t('app','Module Developer'), 'options' => ['class' => 'header']],
                [
                    'label' => Yii::t('app','Developer'), 'icon' => 'file-code-o',
                    'items' => [
                        ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                        ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                        [
                            'label' => 'Under Development', 'icon' => 'file-code-o',
                            'items' => [
                                ['label' => Yii::t('app','Workshop Report'), 'icon' => 'file-code-o', 'url' => ['/workshop-usage/index']],
                                ['label' => Yii::t('app','Store Report'), 'icon' => 'file-code-o', 'url' => ['/store-usage/index']],
                            ]
                        ],
                        [
                            'label' => 'Database', 'icon' => 'database',
                            'items' => $items
                        ],
                    ],
                    // 'visible' => Yii::$app->user->isGuest,
                ],
            ],
        ]
        ) ?>

    </section>

</aside>
