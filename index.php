<?php

session_start();

require __DIR__ . '/App/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
//var_dump($uri);
$parts = explode('/', $uri);

$parts[1] = $_SESSION['lang'] ?? null;


$parts[2] = $parts[2] ?? null;
$_SESSION['lang'];
//var_dump($parts);
$ctrl = $parts[2] ? ucfirst($parts[2]) : 'Index';

if (file_exists(__DIR__ . '\App\Controllers\\' . $ctrl . '.' . 'php')) {
    try {
        $class = '\App\Controllers\\' . $ctrl;
        $ctrl = new $class();
        $ctrl();
        var_dump($ctrl);

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
}