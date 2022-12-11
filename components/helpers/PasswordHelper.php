<?php
/**
 * Created by PhpStorm.
 * User: borisov
 * Date: 13.06.2018
 * Time: 17:42
 */

namespace app\components\helpers;


class PasswordHelper
{
    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    static function generate($length = 6, $level = 2) {
        list($usec, $sec) = explode(' ', microtime());
        srand((float)$sec + ((float)$usec * 100000));

        $validChars[0] = '0123456789';
        $validChars[1] = '0123456789abcdfghjkmnpqrstvwxyz';
        $validChars[2] = '0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $validChars[3] = '0123456789_!@#$%&*()-=+/abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_!@#$%&*()-=+/';

        $validCharsLength = strlen($validChars[$level]);

        $password = '';
        $counter = 0;

        while ($counter < $length) {
            $actChar = substr($validChars[$level], rand(0, $validCharsLength - 1), 1);

            // All character must be different
            if (!strstr($password, $actChar)) {
                $password .= $actChar;
                $counter++;
            }
        }

        return $password;
    }
}