<?php

namespace App\Controllers;

use App\Controller;
use App\Errors;
use App\Models\Article;

class Login extends Controller
{

    protected function handle()
    {
        if (!empty($_POST['login']) && !empty($_POST['password'])) {

            $password = $_POST['password'];

            $errors = new Errors;

            if (strlen($password) < 3) {
                $errors->add(new \Exception('Пароль слишком короткий'));
            }

            if (false !== strpos($password, '+')) {
                $errors->add(new \Exception('Пароль содержит +'));
            }

            if (!$errors->empty()) {
                throw $errors;
            }

        }

        echo $this->view->render(__DIR__ . '/../../templates/login.php');
    }

}