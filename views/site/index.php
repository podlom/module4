<?php
use yii\bootstrap\Carousel;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Module4';
?>
<div class="site-index">

    <div class="row"><?php
                echo Carousel::widget([
                    'items' => [
                        [
                            'content' => Html::img($dataanalitic[0]->img),
                            'caption' => '<h1>' . $dataanalitic[0]->name . '</h1>',
                            'options' => []
                        ],
                        [
                            'content' => Html::img($dataanalitic[1]->img),
                            'caption' => '<h1>' . $dataanalitic[1]->name . '</h1>',
                            'options' => []
                        ],
                        [
                            'content' => Html::img($dataanalitic[2]->img),
                            'caption' => '<h1>' . $dataanalitic[2]->name . '</h1>',
                            'options' => []
                        ]
                    ],
                    'options' => [
                        'style' => 'width:474px;' // Задаем ширину контейнера
                    ]
                ]);
        ?>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-8">
                <?php if (!empty($datasport)): ?>
                    <h2><a href="<?= Url::to(['site/sport']) ?>">Спорт</a> </h2>

                    <?php foreach ($datasport as $i): ?>
                        <p><a href="<?=Url::to(['site/view', 'id' => $i->id])?>"><?= $i->name ?></a></p>
                    <?php endforeach; ?>
                <?php endif; ?>
                <hr>
            </div>
            <div class="col-lg-8">
                <?php if (!empty($datapolitic)): ?>
                    <h2><a href="<?= Url::to(['site/politic']) ?>">Политика</a> </h2>

                    <?php foreach ($datapolitic as $i): ?>
                        <p><a href="<?=Url::to(['site/view', 'id' => $i->id])?>"><?= $i->name ?></a></p>
                    <?php endforeach; ?>
                <?php endif; ?>
                <hr>

            </div>
            <div class="col-lg-8">
                <?php if (!empty($dataanalitic)): ?>
                    <h2><a href="<?= Url::to(['site/analitic']) ?>">Аналитика</a> </h2>

                    <?php foreach ($dataanalitic as $i): ?>
                        <p><a href="<?=Url::to(['site/view', 'id' => $i->id])?>"><?= $i->name ?></a></p>
                    <?php endforeach; ?>
                <?php endif; ?>
                <hr>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-8">
                <h2>Топ 5 комментаторов:</h2>
                <?php foreach ($comments as $com): ?>
                <?= $com->username . '<br>'?>
                <?php endforeach; ?>
            </div>
        </div>
</div>
