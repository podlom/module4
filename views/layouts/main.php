<?php

/* @var $this \yii\web\View */
/* @var $content string */

use kartik\nav\NavX;
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use yii\widgets\Pjax;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody(); ?>
<?php Pjax::begin();?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Module4',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo NavX::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Список',
                'items' => [
                    ['label' => 'Пункт1', 'url' => ['#']],
                    ['label' => 'Пункт2', 'url' => ['#']],
                    ['label' => 'Пункт3', 'url' => ['#']],

                    ['label' => 'Пункт4',
                        'items' => [
                            ['label' => 'Пункт5', 'url' => ['#']],
                            ['label' => 'Пункт6', 'url' => ['#']],
                            ['label' => 'Пункт7', 'url' => ['#']],
                        ],],],],
            ['label' => 'Фильтр', 'url' => ['/site/filter']],
            ['label' => 'Регистрация', 'url' => ['/site/signup']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Вход', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->name . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    echo " <br> <form action=" . \yii\helpers\Url::to(['site/search']) .  " method ='get' style='text-align: center'>
    <input list='tags' id=\"search-field\" name=\"q\" type=\"text\" placeholder=\"Искать по тегам ...\" class=\"hint\" autocomplete=\"off\" />
    <datalist id=\"tags\">";
    foreach (\app\models\News::find()->groupBy(['tags1'])->all() as $a) {
        echo "<option > $a->tags1 </option >
            <option > $a->tags2 </option >";
        };
     echo
            "</datalist> 
            <button id=\"search-submit\" type=\"submit\">Найти</button>
            </form> ";

    NavBar::end();

    ?>
    <div class="container">

        <div class="row">
            <div class="col-lg-2">


            </div>
            <div class="col-lg-8"> <?= $content ?> </div>
            <div class="col-lg-2">


            </div>
        </div>
    </div>
</div>
<?php
$this->registerJs("
    window.onbeforeunload = function() {
        return \"Вы действительно хотите покинуть сайт?\";
        };
", \yii\web\View::POS_END); ?>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; by ToJIuk <?= date('Y') ?></p>
    </div>
</footer>
<?php Pjax::end(); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
