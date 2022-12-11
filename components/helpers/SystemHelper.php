<?php

namespace app\components\helpers;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumber;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

class SystemHelper
{
    /**
     * Нормализирует номер телефона, переводит строчечное значение в числовое
     *
     * @param string $phone
     * @return integer
    */
    public static function normPhone($phone)
    {
        $result = (int)preg_replace("/[^0-9]/", "", $phone);
        return ($result) ? $result : NULL;
    }

}