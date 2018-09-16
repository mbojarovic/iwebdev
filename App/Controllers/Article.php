<?php

namespace App\Controllers;

use App\Controller;

class Article extends Controller
{

    protected function handle()
    {
        $this->view->langs = $this->lang;
        $this->view->article = \App\Models\Article::findMultiById($_GET['id']);
        echo $this->view->render(__DIR__ . '/../../templates/article.php');
    }

}