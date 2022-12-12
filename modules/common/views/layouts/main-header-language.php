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

    <?php
    /**
     * Перемикання мови згідно конфігурації з підсвіткою активної мови
    */
    $languages = (is_array(\Yii::$app->urlManager->languages)) ? \Yii::$app->urlManager->languages : false;

    if ($languages){
        foreach ($languages as $language){
            $class = (\Yii::$app->language == $language) ? 'active' : '';
            echo Html::a(\Yii::t('app',$language), '/'.$language.$currentUrl, ['class' => $class]);
        }
    }
    ?>

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