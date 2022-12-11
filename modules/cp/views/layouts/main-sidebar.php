<?php
    use \yii\helpers\Url;
    use \kartik\icons\Icon;
    use \app\models\User;
    use \app\components\helpers\ViewHelper;
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"><?= \Yii::t('app', 'Nаvigation'); ?></li>

            <li class="<?= ViewHelper::isSidebarMenuItemActive('dashboard') ?>">
                <a href="<?= Url::to('/cp') ?>">
                    <?= Icon::show('bars', [], Icon::FA) ?>
                    <span><?= \Yii::t('app', 'Dashboard'); ?></span>
                </a>
            </li>

            <li class="<?= ViewHelper::isSidebarMenuItemActive('user') ?>">
                <a href="<?= Url::to('/cp/user') ?>">
                    <?= Icon::show('users', [], Icon::FA) ?>
                    <span><?= \Yii::t('app', 'Users'); ?> </span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-blue"><?= User::find()->count()?></small>
                    </span>
                </a>
            </li>



	        <li class="header">Справочники</li>

            <li class="treeview <?= ViewHelper::isSidebarMenuItemActive(['test-answer-type', 'test-question-type', 'test-answer-numbering-type', 'student-sub-group', 'student-group', 'student-faculty', 'student-speciality', 'student-course', 'student-citizenship', 'student-language', 'student-nationality', 'student-privilege-type', 'student-sex', 'student-social-status', 'cabinet', 'lesson', 'schedule-semester', 'schedule-time', 'geo-city', 'geo-region', 'geo-country', 'book-faculty', 'book-qualification', 'qualification-faculty']) ?>">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Справочники</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li class="treeview <?= ViewHelper::isSidebarMenuOpen(['test-answer-type', 'test-question-type', 'test-answer-numbering-type'] ) ?>" >
                        <a href="#"><i class="fa fa-circle-o"></i> <?= \Yii::t('app', 'Tests'); ?>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu" style="<?= ViewHelper::isSidebarMenuOpen(['test-answer-type', 'test-question-type', 'test-answer-numbering-type'], 'treeview-menu' ) ?>">
                            <li><a href="/cp/test-answer-type"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('test-answer-type') ?>"></i><?= \Yii::t('app', 'Answer types'); ?></a></li>
                            <li><a href="/cp/test-question-type"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('test-question-type') ?>"></i><?= \Yii::t('app', 'Question types'); ?></a></li>
                            <li><a href="/cp/test-answer-numbering-type"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('test-answer-numbering-type') ?>"></i><?= \Yii::t('app', 'Numbering types'); ?></a></li>
                        </ul>
                    </li>

                    <li class="treeview <?= ViewHelper::isSidebarMenuOpen(['student-sub-group', 'student-group', 'student-faculty', 'student-speciality', 'student-course', 'student-citizenship', 'student-language', 'student-nationality', 'student-privilege-type', 'student-sex', 'student-social-status'] ) ?>" >
                        <a href="#"><i class="fa fa-circle-o"></i> <?= Yii::t('app', 'Student') ?>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu" style="<?= ViewHelper::isSidebarMenuOpen(['student-sub-group', 'student-group', 'student-faculty', 'student-speciality', 'student-course', 'student-citizenship', 'student-language', 'student-nationality', 'student-privilege-type', 'student-sex', 'student-social-status'], 'treeview-menu' ) ?>">
                            <li><a href="/cp/student-course"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('student-course') ?>"></i> Курс</a></li>
                            <li><a href="/cp/student-faculty"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('student-faculty') ?>"></i> Факультет</a></li>
	                        <li><a href="/cp/student-speciality"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('student-speciality') ?>"></i> Специальность</a></li>
                            <li><a href="/cp/student-group"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('student-group') ?>"></i> Группа</a></li>
                            <li><a href="/cp/student-sub-group"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('student-sub-group') ?>"></i> Подгруппа</a></li>
                            <li><a href="/cp/student-citizenship"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('student-citizenship') ?>"></i> <?= Yii::t('app', 'Citizenships') ?></a></li>
                            <li><a href="/cp/student-language"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('student-language') ?>"></i> <?= Yii::t('app', 'Languages') ?></a></li>
                            <li><a href="/cp/student-nationality"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('student-nationality') ?>"></i> <?= Yii::t('app', 'Nationalities') ?></a></li>
                            <li><a href="/cp/student-privilege-type"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('student-privilege-type') ?>"></i> <?= Yii::t('app', 'Privilege Types') ?></a></li>
                            <li><a href="/cp/student-sex"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('student-sex') ?>"></i> <?= Yii::t('app', 'Sexes') ?></a></li>
                            <li><a href="/cp/student-social-status"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('student-social-status') ?>"></i> <?= Yii::t('app', 'Social statuses') ?></a></li>

                        </ul>
                    </li>

	                <li class="treeview <?= ViewHelper::isSidebarMenuOpen(['cabinet', 'lesson', 'schedule-semester', 'schedule-time'] ) ?>" >
		                <a href="#"><i class="fa fa-circle-o"></i> <?= \Yii::t('app', 'Schedule'); ?>
			                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
		                </a>
		                <ul class="treeview-menu" style="<?= ViewHelper::isSidebarMenuOpen(['cabinet', 'lesson', 'schedule-semester', 'schedule-time'], 'treeview-menu' ) ?>">
			                <li><a href="<?=Url::to('/cp/cabinet') ?>"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('cabinet') ?>"></i><?= \Yii::t('app', 'Cabinets'); ?></a></li>
			                <li><a href="<?=Url::to('/cp/lesson') ?>"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('lesson') ?>"></i><?= \Yii::t('app', 'Lessons'); ?></a></li>
			                <li><a href="<?=Url::to('/cp/schedule-semester') ?>"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('schedule-semester') ?>"></i><?= \Yii::t('app', 'Schedule semesters'); ?></a></li>
			                <li><a href="<?=Url::to('/cp/schedule-time') ?>"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('schedule-time') ?>"></i><?= \Yii::t('app', 'Schedule times'); ?></a></li>
		                </ul>
	                </li>

                    <li class="treeview <?= ViewHelper::isSidebarMenuOpen(['geo-city', 'geo-region', 'geo-country'] ) ?>" >
                        <a href="#"><i class="fa fa-circle-o"></i> <?= \Yii::t('app', 'Geo'); ?>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" style="<?= ViewHelper::isSidebarMenuOpen(['geo-city', 'geo-region', 'geo-country'], 'treeview-menu' ) ?>">
                            <li><a href="<?=Url::to('/cp/geo-city') ?>"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('geo-city') ?>"></i><?= \Yii::t('app', 'Cities'); ?></a></li>
                            <li><a href="<?=Url::to('/cp/geo-region') ?>"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('geo-region') ?>"></i><?= \Yii::t('app', 'Regions'); ?></a></li>
                            <li><a href="<?=Url::to('/cp/geo-country') ?>"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('geo-country') ?>"></i><?= \Yii::t('app', 'Countries'); ?></a></li>
                        </ul>
                    </li>


                    <li class="treeview <?= ViewHelper::isSidebarMenuOpen(['book-faculty', 'book-qualification', 'qualification-faculty'] ) ?>" >
                        <a href="#"><i class="fa fa-circle-o"></i> <?= \Yii::t('app', 'Faculty and qualification'); ?>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" style="<?= ViewHelper::isSidebarMenuOpen(['book-faculty', 'book-qualification', 'qualification-faculty'], 'treeview-menu' ) ?>">
                            <li><a href="<?=Url::to('/cp/qualification-faculty') ?>"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('qualification-faculty') ?>"></i><?= \Yii::t('app', 'Faculty and qualification'); ?></a></li>
                            <li><a href="<?=Url::to('/cp/book-qualification') ?>"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('book-qualification') ?>"></i><?= \Yii::t('app', 'Qualifications'); ?></a></li>
                            <li><a href="<?=Url::to('/cp/book-faculty') ?>"><i class="fa fa-circle-o <?= ViewHelper::isSidebarMenuMenuOpenActive('book-faculty') ?>"></i><?= \Yii::t('app', 'Faculties'); ?></a></li>
                        </ul>
                    </li>

	                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>

            <li class="header">ДОКУМЕНТАЦИЯ</li>
            <li><a href="/AdminLTE/index.html"><i class="fa fa-book"></i> <span>AdminLTE</span></a></li>
            <li class="header">РЕЗЕРВАЦИЯ</li>
            <li>
                <a href="pages/calendar.html">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
                </a>
            </li>

            <!--
            <li>
                <a href="/">
                    <i class="fa fa-graduation-cap"></i> <span>Преподователи</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-blue">20</small>
                    </span>
                </a>
            </li>
-->
            <li>
                <a href="pages/mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Multilevel</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Level One
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>
            <li><a href="/AdminLTE/index.html"><i class="fa fa-book"></i> <span>AdminLTE</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>