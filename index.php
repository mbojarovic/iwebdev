<?php

use App\Classes\Languages;

session_start();

require __DIR__ . '/App/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
//var_dump($uri);
$parts = explode('/', $uri);

$ctrl = $parts[1] ? ucfirst($parts[1]) : 'Index';
//var_dump($ctrl);

try {
    $class = '\App\Controllers\\' . $ctrl;
    //var_dump($class);
    $ctrl = new $class;
    $ctrl();
//\App\Controllers\Index::index();
} catch (\App\DbException $error) {
    echo 'Ошибка в БД при выполнении запроса "' . $error->getQuery() . '": ' . $error->getMessage();
    die;
} catch (\App\Errors $errors) {
    foreach ($errors->all() as $error) {
        echo $error->getMessage();
        echo '<br>';
    }
}