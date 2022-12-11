<?php

namespace app\components\helpers;


use yii\helpers\Url;

class ViewHelper
{
    /**
     * Название класса для подсветки активного пункта главного левого меню
    */
    const SIDEBAR_MENU_ITEM_ACTIVE_CSS_CLASS = 'active';


    /**
     * Название класса для подсветки активного пункта главного левого меню
     */
    const SIDEBAR_MENU_OPEN_MENU_CSS_CLASS = 'menu-open';

    /**
     * Стили для раскрытия аткивного вложенного меню дерева
     */
    const SIDEBAR_MENU_OPEN_MENU_CSS_STYLE = 'display: block;';

    /**
     * Название класса для подсветки активного пункта вложенного меню дерева
     */
    const SIDEBAR_MENU_OPEN_MENU_ACTIVE_CSS_CLASS = 'text-yellow';

    /**
     * Название класса для подсветки неактивного пункта вложенного меню дерева
     */
    const SIDEBAR_MENU_OPEN_MENU_NOT_ACTIVE_CSS_CLASS = 'text-aqua';

    /**
     * Проверяет активный ли пунтк главного меню
     *
     * @param string or array items  часть урла; пример user
     * @return string имя класса
     */
    static function isSidebarMenuItemActive($item)
    {
        $urls = explode( '/', Url::current());
        if (!is_array($item)){
              return ($urls[3] == $item) ? self::SIDEBAR_MENU_ITEM_ACTIVE_CSS_CLASS : false;
        }
        if (is_array($item)){
            return (in_array($urls[3], $item )) ? self::SIDEBAR_MENU_ITEM_ACTIVE_CSS_CLASS : false;
        }
    }

    /**
     * Проверяет развернут ли пунтк меню вложенного дерева
     *
     * @param string or array items  часть урла; пример user
     * treeview treeview-menu
     * @return string имя класса
     */
    static function isSidebarMenuOpen($item, $type = 'treeview')
    {
        $urls = explode( '/', Url::current());

        if ($type == 'treeview'){
            if (!is_array($item)){
                return ($urls[3] == $item) ? self::SIDEBAR_MENU_OPEN_MENU_CSS_CLASS : false;
            }
            if (is_array($item)){
                return (in_array($urls[3], $item )) ? self::SIDEBAR_MENU_OPEN_MENU_CSS_CLASS : false;
            }
        }
        if ($type == 'treeview-menu'){
            if (!is_array($item)){
                return ($urls[3] == $item) ? self::SIDEBAR_MENU_OPEN_MENU_CSS_STYLE : false;
            }
            if (is_array($item)){
                return (in_array($urls[3], $item )) ? self::SIDEBAR_MENU_OPEN_MENU_CSS_STYLE : false;
            }

        }
    }


    /**
     * Проверяет активный ли пунтк дерева меню
     *
     * @param string or array items  часть урла; пример user
     * @return string имя класса
     */
    static function isSidebarMenuMenuOpenActive($item)
    {
        $urls = explode( '/', Url::current());
        return ($urls[3] == $item) ? self::SIDEBAR_MENU_OPEN_MENU_ACTIVE_CSS_CLASS : self::SIDEBAR_MENU_OPEN_MENU_NOT_ACTIVE_CSS_CLASS;
    }
}