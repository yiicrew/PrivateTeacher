<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\web\View;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
 <section id="container" >
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?= Yii::$app->urlManager->createUrl(['teacher']) ?>" class="logo"><b><?= Yii::t('frontLayout', 'Private Teacher') ?></b></a>
            <!--logo end-->
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><?= Html::a(Yii::t('frontLayout','Logout') . ' (' . Yii::$app->user->identity->username . ')', ['/site/logout'],
                            ['data-method' => 'post',
                            'class'=>'logout'])  ?></li>
                </ul>
            </div>
        </header>
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered">
                    <?= Yii::$app->user->identity->userProfile ?><br>
                    (<?= Yii::$app->user->identity->username ?>)
                  </h5>

                  <li class="mt sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-graduation-cap"></i>
                          <span><?= Yii::t('frontLayout', 'Manage Students') ?></span>
                      </a>
                      <ul class="sub">
                          <li>
                            <a href="#">
                                <i class="fa fa-user-plus"></i>
                                <?= Yii::t('frontLayout', 'Add New Student') ?>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <?= Yii::t('frontLayout', 'List Students') ?>
                            </a>
                          </li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="#">
                          <i class="fa fa-credit-card"></i>
                          <span><?= Yii::t('frontLayout', 'Payments') ?></span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="#">
                          <i class="fa fa-calendar-o"></i>
                          <span><?= Yii::t('frontLayout', 'Calendar') ?></span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="<?= Yii::$app->urlManager->createUrl(['teacher/default/edit-profile']) ?>">
                          <i class="fa fa-user"></i>
                          <span><?= Yii::t('frontLayout', 'My Profile') ?></span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <?= $content ?>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              <?= date('Y') ?> - RubenDjOn
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>
  <?php if (\Yii::$app->session->getFlash('info') !== null) : ?>
    <?php $message = \Yii::$app->session->getFlash('info');?>
    <?php $this->registerJs("
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: '$message',
            // (string | mandatory) the text inside the notification
            text: ' ',
            // (string | optional) the image to display on the left
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: '4500',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'gritter-light'
        });

        return false;
        });
    ", View::POS_END, 'gitter-message'); ?>
  <?php endif ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
