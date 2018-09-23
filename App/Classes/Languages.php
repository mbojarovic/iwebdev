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
    public static function multiLanguage()
    {
        if (!isset($_SESSION['lang'])) {
            $_SESSION['lang'] = 'en';
        } elseif (isset($_GET['lang']) && $_SESSION['lang'] !=
            $_GET['lang'] && !empty($_GET['lang'])) {

            if ($_GET['lang'] == 'en') {
                $_SESSION['lang'] = 'en';
            } elseif ($_GET['lang'] == 'ru') {
                $_SESSION['lang'] = 'ru';
            }
        }
    }
}