<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018-09-23
 * Time: 17:08
 */

namespace App\Classes;


abstract class Languages
{
    public static $en;
    public static $ru;
    public static $currentLanguage;

    public static function multiLanguage()
    {
       /* if (!isset($_SESSION['lang'])) {
            $_SESSION['lang'] = 'en';
        } elseif (isset($parts[1]) && $_SESSION['lang'] !=
            $parts[1] && !empty($parts[1])) {

            if ($parts[1] == 'en') {
                var_dump($_SESSION['lang']);
                $_SESSION['lang'] = 'en';
            } elseif ($parts[1] == 'ru') {
                $_SESSION['lang'] = 'ru';
            }
        }*/
    }

    public static function getLanguage() {
        echo 'ku';
    }
}