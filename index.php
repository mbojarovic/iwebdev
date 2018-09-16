<?php

session_start();

require __DIR__ . '/App/autoload.php';

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

if (isset($_GET['page'])) {
    $page =  $_GET['page'];
}

$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $uri);
$ctrl = $parts[1] ? ucfirst($parts[1]) : 'Index';

try {

    $class = '\App\Controllers\\' . $ctrl;
    $ctrl = new $class;
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