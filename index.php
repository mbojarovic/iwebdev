<?php

require __DIR__ . '/App/autoload.php';

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