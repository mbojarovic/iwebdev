<?php

use App\Classes\Languages;

session_start();

require __DIR__ . '/App/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
//var_dump($uri);
$parts = explode('/', $uri);

if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
} elseif (isset($parts[1]) && $_SESSION['lang'] !=
    $parts[1] && !empty($parts[1])) {

    if ($parts[1] == 'en') {
        $_SESSION['lang'] = 'en';
    } elseif ($parts[1] == 'ru') {
        $_SESSION['lang'] = 'ru';
    }
}

$parts[3] = $parts[3] ?? null;

$ctrl = $parts[3] ? ucfirst($parts[3]) : 'Index';

if (file_exists(__DIR__ . '\App\Controllers\\' . $ctrl . '.' . 'php')) {
    try {
        $class = '\App\Controllers\\' . $ctrl;
        $ctrl = new $class();
        $ctrl();

    } catch (\App\DbException $error) {
        echo 'Ошибка в БД при выполнении запроса "' . $error->getQuery() . '": ' . $error->getMessage();
        die;
    } catch (\App\Errors $errors) {
        foreach ($errors->all() as $error) {
            echo $error->getMessage();
            echo '<br>';
        }
    }
} else {
    echo 404;
}