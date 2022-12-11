<?php

namespace app\components\helpers;


class BreadcrumbsHelper
{
    public static $breadcrumbs = [];

    public static function add($name, $url = false, $icon = false){
        $count = count(self::$breadcrumbs);
        self::$breadcrumbs[$count]['name'] = $name;
        self::$breadcrumbs[$count]['url'] =  ($url) ? DIRECTORY_SEPARATOR.\Yii::$app->language.$url : false;
        self::$breadcrumbs[$count]['icon'] = $icon;
    }

    public static function gets(){
        return self::$breadcrumbs;
    }

    public static function getLast(){
        return end(self::$breadcrumbs);
    }

}