<div class="row" style="padding:20px">
		<div class="col-md-3">
			<div class="card bg-light" style="width:300px">
		  		<div class="card-header"><p>Registerd Users </p></div>
				  <div class="card-body"><p class="card-text">No.of total Users:</p>
				  	<a href="view_registered_users.php"class="btn btn-danger">View Registerd Users</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-light" style="width:300px">
		  		<div class="card-header"><p>Registerd books </p></div>
				  <div class="card-body"><p class="card-text">No.of total books:</p>
				  	<a href="view_registered_books.php"class="btn btn-info">View Registerd Books</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-light" style="width:300px">
		  		<div class="card-header"><p>Registerd Category </p></div>
				  <div class="card-body"><p class="card-text">No.of book's category:</p>
				  	<a href="view_category.php"class="btn btn-success">View Categories</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-light" style="width:300px">
		  		<div class="card-header"><p>Registerd Authors </p></div>
				  <div class="card-body"><p class="card-text">No.of avilable Authors:<?php?></p>
				  	<a href="view_registered_author.php"class="btn btn-primary">View Registerd Authors</a>
				</div>
			</div>
		</div>
	</div>
	<br><br>
	<div class="row" style="padding:20px">
		<div class="col-md-3">
				<div class="card bg-light" style="width:300px">
					<div class="card-header"><p>Issued Books </p></div>
					<div class="card-body"><p class="card-text">No.of Issued books:<?php?></p>
						<a href="view_issued_book.php"class="btn btn-secondary">View issued Books</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- <?php

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
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                    
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);   
    NavBar::end();
    ?>
	<div class="container"style="">
	<?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?> 