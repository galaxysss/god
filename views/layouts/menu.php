<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

\app\assets\App\Asset::register($this);
\app\assets\Maya\Asset::register($this);
\app\assets\LayoutMenu\Asset::register($this);
\app\assets\ModalBoxNew\Asset::register($this);

/** @var \app\assets\Maya\Asset $mayaAsset */
$mayaAsset = Yii::$app->assetManager->getBundle('app\assets\Maya\Asset');
$this->registerJs('var pathMaya = \'' . $mayaAsset->baseUrl . '\';', \yii\web\View::POS_HEAD );

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title><?= $this->title ?> &middot; ♥ &middot; Галактический Союз Сил Света</title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="/images/ico.png">

</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a
                class="navbar-brand"
                href="/"
                style="padding: 10px 10px 0px 10px;"
                >
                <img src="/images/ico.jpg" height="30">
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?= $this->render('../blocks/topMenu') ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (\Yii::$app->user->isGuest): ?>
                    <li>
                        <!-- Split button -->
                        <div class="btn-group" style="margin-top: 9px; opacity: 0.5;" id="loginBarButton">
                            <button type="button" class="btn btn-default" id="modalLogin"><i class="glyphicon glyphicon-user" style="padding-right: 5px;"></i>Войти</button>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= Url::to(['auth/password_recover']) ?>">Напомнить пароль</a></li>
                                <li><a href="<?= Url::to(['auth/registration']) ?>">Регистрация</a></li>
                            </ul>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="dropdown">
                        <a
                            href="#"
                            class="dropdown-toggle"
                            data-toggle="dropdown"
                            aria-expanded="false"
                            role="button"
                            style="padding: 10px;"
                            >
                            <?= Html::img(Yii::$app->user->identity->getAvatar(), [
                                'height' => '30px',
                                'style' => 'border: 1px solid #000000;',
                            ]) ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= Url::to(['cabinet/objects']) ?>">Мои объединения</a></li>
                            <li><a href="<?= Url::to(['cabinet/poseleniya']) ?>">Мои поселения</a></li>

                            <?php if (Yii::$app->user->identity->getField('is_admin') == 1) { ?>
                                <li class="divider"></li>

                                <li role="presentation" class="dropdown-header">Раздел админа</li>
                                <li><a href="<?= Url::to(['admin/news']) ?>">Новости</a></li>
                                <li><a href="<?= Url::to(['admin/chenneling_list']) ?>">Ченелинги</a></li>
                                <li><a href="<?= Url::to(['admin_article/index']) ?>">Статьи</a></li>
                                <li><a href="<?= Url::to(['admin_category/index']) ?>">Категории</a></li>
                                <li><a href="<?= Url::to(['admin_service/index']) ?>">Услуги</a></li>

                                <li class="divider"></li>

                                <li role="presentation" class="dropdown-header">Раздел модератора</li>
                                <li><a href="<?= Url::to(['moderator_unions/index']) ?>">Объединения</a></li>
                            <?php } ?>

                            <li class="divider"></li>

                            <li><a href="<?= Url::to(['cabinet/profile']) ?>"><i class="glyphicon glyphicon-cog" style="padding-right: 5px;"></i>Мой профиль</a></li>
                            <li><a href="<?= Url::to(['cabinet/password_change']) ?>"><i class="glyphicon glyphicon-asterisk" style="padding-right: 5px;"></i>Сменить пароль</a></li>

                            <li class="divider"></li>

                            <li><a href="<?= Url::to(['auth/logout']) ?>" data-method="post"><i class="glyphicon glyphicon-off" style="padding-right: 5px;"></i>Выйти</a></li>
                        </ul>
                    </li>
                <?php endif; ?>


                <?php
                Yii::$app->session->open();
                $maya = Yii::$app->cache->get(Yii::$app->session->getId() . '/maya');
                if ($maya) {
                    $this->registerJs("LayoutMenu.init({$maya['maya']});");
                } else {
                    $this->registerJs("LayoutMenu.init();");
                }

                if (Yii::$app->devicedetect->isMobile()) {
                    $link = '/calendar';
                    $options = [];
                } else {
                    $link = 'javascript:void(0);';
                    $options = [
                        'title' => 'Сегодня',
                        'id'    => 'linkCalendar',
                        'data'  => [
                            'toggle'    => 'popover',
                            'template'  => '<div class="popover" role="tooltip" style="width: 500px;"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content" style="padding-bottom:30px;"></div></div>',
                            'html'      => true,
                            'placement' => 'bottom',
                        ]
                    ];
                }
                ?>
                <li><?= Html::a(Html::tag('span', ($maya !== false) ?  $maya['date'] : '4 апр 2015 г.', [
                            'style' => Html::cssStyleFromArray(['padding-right' => '10px']),
                            'id'    => 'dateThis',
                        ]) . Html::img( ($maya !== false) ? $mayaAsset->getStampSrc($maya['stamp']) : '/images/index/calendar/1.gif', [
                            'height' => 20,
                            'id'     => 'calendarMayaStamp',
                        ]), $link, $options); ?></li>
            </ul>
        </div>

    </div>
</nav>
<div class="hide" id="calendarMayaDescription">
    <h4>Красный Дракон</h4>

    <p>Откройтесь энергиям Рождения и Упования - Высшей Веры во всемогущесто бытия и стремитись найти им выражение в
        своей жизни. Фокусируйтесь на самоподдержании и принятии необходимой энергии от Вселенной, и тогда ваши
        глубинные потребности начнут восполняться самой жизнью. Позвольте энергии рождения инициировать и проявлять все
        ваши начинания!</p>

    <p>Ближайший <abbr title="День имеет прямую связь с духом и космосом">портал галактической активации</abbr>
        открывается <span class="days">через <kbd>7</kbd> <span class="days2">дней</span></span></p>
    <a class="btn btn-primary" href="<?= Url::to(['calendar/index'])?>">Подробнее</a>
</div>



<?= $content ?>


<?php if (\Yii::$app->user->isGuest) : ?>
    <?= $this->render('_modalLogin') ?>
<?php endif; ?>
<footer class="footer">
    <div class="container">
        <div class="row" style="margin-top: 20px;">
        <div class="col-lg-4">
            <p>&copy; 2015 Галактический союз сил света.</p>
        </div>
        <div class="col-lg-4">
            <a
                href="https://www.facebook.com/gsss.merkaba?pnref=lhc"
                target="_blank"
                >Facebook</a>
        </div>
        <div class="col-lg-4">
            <a href="<?= Url::to(['site/contact']) ?>">Контакты</a>
        </div>
        </div>
    </div>
</footer>

<div id="infoModal" class="zoom-anim-dialog mfp-hide mfp-dialog">
    <h1>Dialog example</h1>
    <p>This is dummy copy. It is not meant to be read. It has been placed here solely to demonstrate the look and feel of finished, typeset text. Only for show. He who searches for meaning here will be sorely disappointed.</p>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
