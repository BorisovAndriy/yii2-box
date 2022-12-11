<?php
    use \yii\helpers\Html;
?>
<li class="dropdown messages-menu language-select">
    <?php
        /**
         * Если текущий урл Yii определяет с окончанием index, обрезаем его, что бы не множить адреса ведущую на одну страницу
         * К примеру: /cp/dashboard/index в /cp/dashboard
        */
        $currentUrl = substr(\yii\helpers\Url::current(),3);
        $urls = explode( '/', $currentUrl);
          if (end($urls) == 'index') {
              unset($urls[count($urls) - 1]);
        }
        $currentUrl = implode('/', $urls)
    ?>

    <!--
    <?php if(\Yii::$app->language == 'ru'): ?>
        <?=  Html::a(\Yii::t('app','Go to KZ'), '/'.'kz'.$currentUrl); ?>
    <?php else : ?>
        <?=  Html::a(\Yii::t('app','Go to RU'), '/'.'ru'.$currentUrl); ?>
    <?php endif; ?>
    -->

    <?php $class = (\Yii::$app->language == 'kz') ? 'active' : '' ?>
    <?=  Html::a(\Yii::t('app','KZ'), '/'.'kz'.$currentUrl, ['class' => $class]); ?>

    <?php $class = (\Yii::$app->language == 'ru') ? 'active' : '' ?>
    <?=  Html::a(\Yii::t('app','RU'), '/'.'ru'.$currentUrl, ['class' => $class]); ?>

    <?php $class = (\Yii::$app->language == 'en') ? 'active' : '' ?>
    <?=  Html::a(\Yii::t('app','EN'), '/'.'en'.$currentUrl, ['class' => $class]); ?>
</li>

<style>
    li.language-select{
        border: 1px #d2d6de solid;
        border-radius: 6px;
    }

    li.language-select a{
        display: inline-block;
    }

    li.language-select a.active{
        color: #f39c12!important;
        font-weight: bold;
    }
</style>