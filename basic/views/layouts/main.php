



<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => "Avadh Pathalogy Lab",
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);

        if (Yii::$app->user->isGuest) {
            $menuItems[] = [
                'label' => 'About',
                'url' => [
                    '/site/about'
                ]
            ];
            $menuItems[] = [
                'label' => 'Contact',
                'url' => [
                    '/site/contact'
                ]
            ];

            $menuItems[] = [
                'label' => 'Login',
                'url' => [
                    '/site/login'
                ]
            ];
        } else {

            $menuItems[] = ['label' => 'Home', 'url' => ['/site/dashboard']];
            $menuItems[] = [
                'label' => 'Patients',
                'items' => [
                    ['label' => 'Patients', 'url' => ['/patient/index']],
                    ['label' => 'Reports', 'url' => ['/report/index']],
                    ['label' => 'Bills', 'url' => ['/bill/index']],
                    ['label' => 'Patient readings', 'url' => ['/patient-reading/index']],
                ]
            ];
            $menuItems[] = ['label' => 'Doctor', 'url' => ['/doctor/index']];
            $menuItems[] = ['label' => 'Category','url' => ['/category/index']];
            $menuItems[] = ['label' => 'SubCategory','url' => ['/scategory/index']];
            $menuItems[] = [
                'label' => 'Tests',
                'items' => [
                    ['label' => 'Manage Test', 'url' => ['/test/index']],
                    ['label' => 'Manage Test parameter', 'url' => ['/test-parameter/index']],
                    ['label' => 'Manage Test parameter Map', 'url' => ['/test-parameter-map/index']],
                    ['label' => 'Manage Test Kit Map', 'url' => ['/test-kit-map/index']],
                    ['label' => 'Manage Units', 'url' => ['/unit/index']],
                ]
            ];
            $menuItems[] = [
                'label' => 'Commission',
                'items' => [
                    ['label' => 'Doctor Commission', 'url' => ['/dcommission/index']],
                    ['label' => 'Store Commision', 'url' => ['/stored/index']],
                ]
            ];
            $menuItems[] =

                [
                    'label' => 'Kits',
                    'items' => [
                        ['label' => 'Manage Kits', 'url' => ['/kit/index']],
                        ['label' => 'Manage Kit category', 'url' => ['/kit-category/index']],
                    ]
                ];

            $menuItems[] = ['label' => 'Config', 'url' => ['/config/index']];
            // $menuItems[] =['label' => 'About', 'url' => ['/site/about']];
            // $menuItems[] = ['label' => 'Contact', 'url' => ['/site/contact']];
            $menuItems[] = '<li>' . Html::beginForm([
                '/site/logout'
            ], 'post') . Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', [
                'class' => 'btn btn-link logout'
            ]) . Html::endForm() . '</li>';
        }
        echo Nav::widget([
            'options' => [
                'class' => 'navbar-nav navbar-right'
            ],
            'items' => $menuItems
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Pixaflip Technologies <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>