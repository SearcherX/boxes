<?php
use app\assets\AppAsset;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100 overflow-y-auto overflow-x-hidden">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<header id="header">
    <nav id="w0" class="navbar-expand-md navbar-dark bg-dark navbar">
        <div class="container">
            <a href="/" class="navbar-brand">
<!--                --><?php //= Html::img('@web/img/logo.png', ['class' => 'logo', 'alt' => 'ЭФКО'])?>
            </a>
        </div>
    </nav>
</header>
<?= $content ?>

<footer id="footer " class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted ">
            <div class="col-md-6 text-center text-md-start ">
                &copy; сделано Найденовым Александром Евгеньевичем
            </div>
        </div>
    </div>
</footer>
<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>