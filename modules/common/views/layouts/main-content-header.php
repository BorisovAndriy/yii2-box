<?php
use \app\components\helpers\BreadcrumbsHelper;
use \kartik\icons\Icon;
?>

<section class="content-header">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb">
        <?php if (!empty(BreadcrumbsHelper::gets())) : ?>
            <?php foreach (BreadcrumbsHelper::gets() as $item) : ?>
                <?php if (!empty($item['url'])) : ?>
                    <li>
                        <a href="<?= $item['url']?>">
                            <?= Icon::show($item['icon'], [], Icon::FA) ?>
                            <?= $item['name']?>
                        </a>
                    </li>
                <?php else :?>
                    <li>
                        <?= Icon::show($item['icon'], [], Icon::FA) ?>
                        <?= $item['name']?>
                    </li>
                <?php endif; ?>
            <?php endforeach;?>
        <?php endif; ?>
        <!--
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
        -->
    </ol>
</section>