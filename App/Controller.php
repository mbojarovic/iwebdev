<?php

namespace App;

use App\Classes\Languages;

abstract class Controller
{
    protected $view;
    protected $langText;

    public function __construct()
    {
        //var_dump($action);
        Languages::multiLanguage();
        $this->langText = include_once __DIR__ . '/../languages/' . $_SESSION['lang'] . '.php';

        $this->view = new View();
    }

    protected function access(): bool
    {
        return true;
    }

    public function __invoke()
    {
        if ($this->access()) {
            $this->handle();
        } else {
            die('Нет доступа');
        }
    }

    abstract protected function handle();
}
