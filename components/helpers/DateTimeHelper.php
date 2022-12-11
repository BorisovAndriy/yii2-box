<?php

namespace app\components\helpers;


class DateTimeHelper
{

    CONST FORMAT_SQL = 'Y-m-d H:i:s';
    CONST FORMAT_HUMAN_DATETIME = 'd.m.Y H:i';
    CONST FORMAT_HUMAN_DATE = 'd.m.Y';
    CONST FORMAT_TIMESTAMP = 'U';

    CONST FORMAT_HUMAN_DATETIME_WIDGET = 'dd.mm.yyyy H:i';

    /**
     * Возвращает текущее время в трех форматах
     * 2017-09-20 13:06:07
     * 20.09.2017 13:06
     * 1505912767
     *
     * @param string returnFormat
     * @return string
     */
    static function getNow($returnFormat = self::FORMAT_TIMESTAMP)
    {
        $date = new \DateTime();
        return $date->format($returnFormat);
    }

    /**
     * Конвертирует время в формат
     * 2017-02-20 13:17:08 -> 1505912767
     * 20.09.2017 13:17 -> 2017-09-20 13:17:00
     * 1505912767 -> 20.09.2017 13:07
     *
     * @param string dateTime string or integer for unixtimestamp
     * @param string returnFormat
     * @param string toTimeZone часовой пояс, в котором возвратить дату
     *
     * @return string
    */
    static function convertTo($dateTime, $returnFormat = self::FORMAT_TIMESTAMP, $toTimeZone = 'UTC')
    {
        if (empty($dateTime)){
            return null;
        }

        if (filter_var($dateTime, FILTER_VALIDATE_INT)){
            $date = new \DateTime();
            $date->setTimestamp($dateTime);
        }else{
            $date = new \DateTime($dateTime);
        }

        if ($toTimeZone != 'UTC') {
            $UTC = new \DateTimeZone("UTC");
            $newTZ = new \DateTimeZone($toTimeZone);
            $date = new \DateTime($date->format(self::FORMAT_HUMAN_DATETIME), $UTC);
            $date->setTimezone($newTZ);
        }

        return $date->format($returnFormat);
    }

    /**
     * Конвертирует время мужду временными поясами.
     *
     * @param string dateTime
     * @param string timeZone
     * @param string toTimeZone
     *
     * @return string
     */
    static function convertDateFromTimeZone($dateTime,$timeZone,$toTimeZone,$returnFormat)
    {
        $date = new DateTime($dateTime,new DateTimeZone($timeZone));
        $date->setTimezone( new DateTimeZone($toTimeZone) );
        return $date->format($returnFormat);
    }

    /**
     * Модифицирует время
     * '+2 day': 1487769420 -> 22.02.2017 13:17
     * '+2 day': 20.09.2017 13:17 -> 2017-09-20 13:17:00
     *
     * @param string dateTime
     * @param string modificator, example "-1 day", "+1 month"
     * @param string returnFormat
     *
     * @return string
     */
    static function modify($dateTime, $modificator, $returnFormat = self::FORMAT_TIMESTAMP)
    {
        $date = new \DateTime();
        $date->setTimestamp(self::convertTo($dateTime, self::FORMAT_TIMESTAMP));
        $date->modify($modificator);
        return self::convertTo($date->format(self::FORMAT_TIMESTAMP),$returnFormat);
    }

    /**
     * Для частей имён файлов
     *
     * @return string
    */
    static function getLogNow()
    {
        return date('d_m_Y__H_i_s');
    }

    /**
     * Конвертация минут в секунды
     *
     * @param integer minutes
     *
     * @return integer
    */
    public static function convertMinToSec($minutes){
        return floor($minutes*60);
    }

    /**
     * Конвертация секунды в минуты
     *
     * @param integer seconds
     *
     * @return integer
     */
    public static function convertSecToMin($seconds){
        return floor($seconds/60);
    }
}