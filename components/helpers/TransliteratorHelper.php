<?php

namespace app\components\helpers;

use Yii;

class TransliteratorHelper {

    /**
     * Транслитирирует алиас(url) с строки.
     * Удаляет все ненужные символы, лишнии и дубляжи пробелов, переводит в нижний регистр
     * Пример: "Создать событие    $this->hash     !  " => "sozdat-sobytie-this-hash"
     *
     * @param string string строка с которой будет произведена генерация
     *
     * @return string;
     */
    public static function getAlias($string)
    {
        //правила для транслитерации
        $rule = 'Any-Latin; Latin-ASCII; Lower(); [\u0100-\u7fff] remove';
        $transliterator = \Transliterator::create($rule);
        //транслитерация, и в нижний регист
        $string = $transliterator->transliterate($string);
        //замена всех символов на пробел, кроме латынских и цифр
        $string = preg_replace ("/[^a-zA-Z0-9\s]/"," ",$string);
        //замена любых пробельных символов (перевод на новую строку, табуляция, пробел), и их повторение
        $string = preg_replace('|\s+|', ' ', $string);
        //если остались знаки пробела в начале или конце строки, удалить
        $string = trim($string);
        //замена пробела на -
        $string = str_replace(" ","-",$string);
        return $string;
    }

    /**
     * Переводит значение в массиве
     *
     * Пример:
     * из
     * [
     *  [2]=> "Disable"
     *  [1]=> "Enable"
     * ]
     * в
     * [
     *  [2]=> "Не доступный"
     *  [1]=> "Доступный"
     * ]
    */
    public static function translateArray($array){

        if (!is_array($array))
            return false;
        foreach ($array as &$item){
            $item = Yii::t('app', $item);
        }

        return $array;
    }
}