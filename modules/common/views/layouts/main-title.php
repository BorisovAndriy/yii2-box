<?php
    use \app\components\helpers\BreadcrumbsHelper;
?>
<title>
    <?php $readcrumbs = BreadcrumbsHelper::gets() ?>
    <?php if (!empty($readcrumbs)) : ?>
        <?php $readcrumbs = array_reverse($readcrumbs); ?>
        <?php $count = count($readcrumbs) ?>
        <?php $i = 1 ?>
        <?php foreach ($readcrumbs as $item) : ?>
            <?= $item['name']?>
            <?php if ($i != $count) : ?>
                ::
            <?php endif; ?>
            <?php $i++ ?>
        <?php endforeach;?>
    <?php endif; ?>
</title>
