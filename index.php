<?php

use App\Classes\Languages;

session_start();

require __DIR__ . '/App/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
//var_dump($uri);
$parts = explode('/', $uri);

$ctrl = $parts[1] ? ucfirst($parts[1]) : 'Index';

if (file_exists(__DIR__ . '\App\Controllers\\' . $ctrl . '.' . 'php')) {
    try {
        $class = '\App\Controllers\\' . $ctrl;
        $ctrl = new $class();
        $ctrl();

        //$action = $parts[2] ?? 'dsd';
        //var_dump($action);
        //var_dump($parts);

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