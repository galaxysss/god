<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Галактический союз сил света';

$this->registerJsFile('/js/pages/site/index.js', ['depends' => ['yii\web\JqueryAsset']]);
?>
<center>
    <div class="bs-example" data-example-id="carousel-with-captions" style="width: 1200px; margin-top: 80px;">
        <div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-captions" data-slide-to="1" class=""></li>
                <li data-target="#carousel-example-captions" data-slide-to="2" class=""></li>
                <li data-target="#carousel-example-captions" data-slide-to="3" class=""></li>
                <li data-target="#carousel-example-captions" data-slide-to="4" class=""></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img
                         src="/images/index/slider/1.jpg"
                         data-holder-rendered="true">
                </div>
                <div class="item">
                    <img
                         src="/images/index/slider/2.jpg"
                         data-holder-rendered="true">
                </div>
                <div class="item">
                    <img
                         src="/images/index/slider/3.jpg"
                         data-holder-rendered="true">
                </div>
                <div class="item">
                    <img
                         src="/images/index/slider/4.jpg"
                         data-holder-rendered="true">
                </div>
                <div class="item">
                    <img
                         src="/images/index/slider/5.jpg"
                         data-holder-rendered="true">
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev"> <span
                    class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span
                    class="sr-only">Previous</span> </a> <a class="right carousel-control"
                                                            href="#carousel-example-captions" role="button"
                                                            data-slide="next"> <span
                    class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span
                    class="sr-only">Next</span> </a>
        </div>
    </div>
</center>


<div class="container">
<center>
    <p class="lead text-center">Галактический союз сил света – это живой организм объединяющий все силы света в единое целое служащий всеобщему процветанию и счастью каждого элемента входящего в его состав, построенный на основе естественных законах мироздания.</p>
</center>

<!-- Направления -->
<div class="row">
    <center>
        <div class="col-lg-3">
            <a href="/tv" role="button"><img class="img-circle"
                                             src="/images/index/39282781.jpg"
                                             alt="Generic placeholder image" width="140" height="140"></a>

            <h2>ТелеВидение</h2>

            <p>Новое прогрессивное телевидение открывающее новые горизонты осприятия мира и обучающее счастью, любви и радости жизни.</p>

            <p><a class="btn btn-default" href="/tv" role="button">Подробнее &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-3">
            <a href="/clothes" role="button"><img class="img-circle"
                                                  src="/images/page/clothes/11149819_1670996323123198_2039843726665452928_o.jpg"
                                                  alt="" width="140" height="140"></a>

            <h2>Одежда</h2>

            <p>Одежда активирует энергетические центры и подчеркивает божественную красоту тела ангела.</p>

            <p><a class="btn btn-default" href="/clothes" role="button">Подробнее &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-3">
            <a href="<?= Url::to(['page/arts']) ?>" role="button"> <img class="img-circle"
                                                                        src="/images/index/arts.png"
                                                                        alt="Generic placeholder image" width="140"
                                                                        height="140"></a>

            <h2>Художники</h2>

            <p>Художники рисуют миры в которых мы живем.</p>

            <p><a class="btn btn-default" href="<?= Url::to(['page/arts']) ?>" role="button">Подробнее &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-3">
            <a href="<?= Url::to(['page/music']) ?>" role="button"> <img class="img-circle"
                                                                         src="/images/index/music.jpg"
                                                                         alt="Generic placeholder image" width="140"
                                                                         height="140"></a>

            <h2>Музыка</h2>

            <p>Музыка высших сфер раскрывает сердца и расширяет сознание</p>

            <p><a class="btn btn-default" href="<?= Url::to(['page/music']) ?>" role="button">Подробнее &raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
    </center>
</div>

<hr class="featurette-divider" style="margin-bottom: 100px;">
<center>
    <p class="lead text-center">Представляем вам прототип «Новой Земли 4D».</p>
    <p class="text-center">Инструкции для перехода на «Новую Землю 4D» уже передаются нами через Высшие Силы Света Истока Первотворца на «Землю 3D».</p>

    <iframe width="640" height="360" src="https://www.youtube.com/embed/vq7oIM-XvRQ?rel=0" frameborder="0" allowfullscreen></iframe>
</center>



<hr class="featurette-divider" style="margin-bottom: 100px;">
<center>
    <p class="lead text-center">Мы строим мир гармонично развивающий все сферы организации жизни.</p>
</center>
<div class="row">
    <center>
        <p class="text-center"><img
                src="/images/page/mission/1415014_551550491597436_590146424_o.jpg"
                usemap="#Map"
                width="610"
                title="Выберите интересующую вас сферу жизни"
                id="imageSfera"
                data-toggle="tooltip" data-placement="right"
                ></p>
        <map name="Map" id="Map">
            <area shape="poly" coords="319,122,345,131,335,185,304,181" href="/language" alt="Язык">
            <area shape="poly" coords="382,226,443,166,461,191,402,245" href="/energy" alt="Энергия">
            <area shape="poly" coords="421,293,488,293,489,316,422,319" href="/time" alt="Время">
            <area shape="poly" coords="385,356,482,439,453,455,359,380" href="/house" alt="Пространство">
            <area shape="poly" coords="300,422,341,409,359,499,322,507" href="/study" alt="Обучение">
            <area shape="poly" coords="226,378,282,416,227,509,168,477" href="/forgive" alt="Прощающая система">
            <area shape="poly" coords="105,358,193,328,201,357,121,386" href="/money" alt="Деньги">
            <area shape="poly" coords="116,223,213,255,198,283,101,255" href="/medical" alt="Здоровье">
            <area shape="poly" coords="213,129,273,198,222,219,184,145" href="/food" alt="Питание">
        </map>
    </center>
</div>


<!--    Наши партнеры-->
<hr class="featurette-divider">
<div class="container">
    <h1 style="text-align: center;">Наши партнеры</h1>
<style>
    .thumbnail1 {
        padding-bottom: 20px;
        padding-top: 4px;
    }
</style>
    <div class="row" style="margin-top: 30px;">
        <div class="col-lg-4">
            <center>
                <h4 style="text-align: center;">Проект «Новая Земля»</h4>
                <a href="http://www.new-earth-project.org/" target="_blank" style="text-align: center;">
                    <center>
                        <img
                            src="/images/index/partners/logo.png"
                            height="100"
                            class="thumbnail1"
                            >
                    </center>
                </a>
            </center>
            <iframe width="100%" height="200" src="//www.youtube.com/embed/hu7hNS--S8M" frameborder="0"
                    allowfullscreen=""></iframe>
        </div>
        <div class="col-lg-4">
            <center>
                <h4 style="text-align: center;">Проект «Резонас»</h4>
                <a href="http://resonance.is/" target="_blank" style="text-align: center;">
                    <center>
                        <img
                            src="/images/index/partners/resonance-project-vector-equilibrium-logo-sigil.png"
                            height="100"
                            class="thumbnail1"
                            >
                    </center>
                </a>
            </center>
            <iframe width="100%" height="200" src="//www.youtube.com/embed/5fVTtsivj64" frameborder="0"
                    allowfullscreen=""></iframe>
        </div>
        <div class="col-lg-4">
            <center>
                <h4 style="text-align: center;">Проект «Я Аватар»</h4>
                <a href="http://iamavatar.org/" target="_blank" style="text-align: center;">
                    <center>
                        <img src="/images/index/partners/122250502_(1)1.png"
                             height="100"
                             class="thumbnail1"
                            >
                    </center>
                </a>
            </center>
            <iframe width="100%" height="200" src="//www.youtube.com/embed/XLmcOvCa6UM" frameborder="0"
                    allowfullscreen=""></iframe>
        </div>
    </div>
    <div class="row" style="margin-top: 60px;">
        <div class="col-lg-4">
            <center>
                <h4 style="text-align: center;">Фонд «Дети Солнца»</h4>
                <a href="http://childrenofthesun.org/" target="_blank" style="text-align: center;">
                    <center>
                        <img
                            src="/images/index/partners/122250502_(1)2.png" height="100"
                            class="thumbnail1"
                            >
                    </center>
                </a>
            </center>
            <iframe width="100%" height="200" src="//www.youtube.com/embed/Mq-c8pzCIVM" frameborder="0"
                    allowfullscreen=""></iframe>
        </div>
        <div class="col-lg-4">
            <center>
                <h4 style="text-align: center;"
                    title="Новейшие космологические представления о Вселенной и человеке">Ииссиидиология</h4>
                <a href="http://ayfaar.org/" target="_blank">
                    <center>
                        <img
                            src="/images/index/partners/issi.jpg" height="100"
                            class="thumbnail1"
                            >
                    </center>
                </a>
            </center>
            <iframe width="100%" height="200" src="https://www.youtube.com/embed/0f3IwYlUPas" frameborder="0"
                    allowfullscreen></iframe>
        </div>
        <div class="col-lg-4">
            <center>
                <h4 style="text-align: center;">Проект «Аллатра»</h4>
                <a href="http://allatra.org/" target="_blank">
                    <center>
                        <img
                            src="/images/index/partners/allatra.png" height="100"
                            class="thumbnail1"
                            >
                    </center>
                </a>
            </center>
            <iframe width="100%" height="200" src="https://www.youtube.com/embed/DQCkVTTRiNA" frameborder="0"
                    allowfullscreen></iframe>
        </div>
    </div>

</div>

<!-- Индекс счастья -->
<hr class="featurette-divider" style="margin-top: 100px;">
<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading" style="margin-top: 50px;">Индекс счастья <span
                class="text-muted">планеты Земля</span></h2>

        <p class="lead">Индекс Общенационального Счастья рассматривается как ключевой элемент строительства экономики Новой Земли, который синхронизирован с изначальными законми мироздания.</p>

        <p>Министерство Счастья провело несколько международных конференций, на которые были приглашены многие западные экономисты (включая нобелевских лауреатов по экономике), с целью выработки методик расчета ИОС (Индекс Общенационального Счастья) на основе сочетания экономической ситуации в стране и удовлетворенности жизнью населения. Улыбка населения является одним из показателей в разработанных формулах.</p>
    </div>
    <div class="col-md-5">
        <p style="<?= \cs\helpers\Html::cssStyleFromArray([
            'position'    => 'absolute',
            'top'         => '350px',
            'left'        => '20px',
            'color'       => '#ffffff',
            'margin'      => '0px',
            'padding'     => '0px',
            'font-family' => 'courier new',
        ]) ?>"><span style="font-size: 400%; font-weight: 100;" id="iosDec">12</span>.<br>
            <span
                id='iosOst'
                style="font-size: 100%; padding-left: 20px;vertical-align: top;"></span>
        </p>
        <img class="featurette-image img-responsive center-block" src="/images/index/x_83bd0a57.jpg"
             alt="Generic placeholder image">

    </div>
</div>

<!-- Новости -->
<hr class="featurette-divider">
<div class="container">
    <h1>Последние новости</h1>

    <div class="row featurette">
        <?php
        foreach (\app\models\NewsItem::query()->orderBy(['date_insert' => SORT_DESC])->limit(3)->all() as $row) {
            echo \app\services\GsssHtml::newsItem($row);
        }
        ?>
    </div>
</div>

<hr>


<?= $this->render('../blocks/share', [
    'image'       => \yii\helpers\Url::to('/images/index/slider/1.jpg', true) ,
    'url'         => \yii\helpers\Url::current([], true),
    'title'       => $this->title,
    'description' => 'Галактический союз сил света – это живой организм объединяющий все силы света в единое целое служащий всеобщему процветанию и счастью каждого элемента входящего в его состав, построенный на основе естественных законах мироздания.',
]) ?>

</div>