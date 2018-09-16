<?php

namespace App;

abstract class Controller
{
    protected $view;
    protected $lang;

    public function __construct()
    {
        $this->lang = include_once __DIR__ . '/../languages/' . $_SESSION['lang'] . '.php';
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
