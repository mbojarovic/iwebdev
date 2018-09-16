<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

class Index extends Controller
{

    protected function handle()
    {
        $this->view->lang = $this->lang;
        $this->view->articles = Article::findMultiAll();
        echo $this->view->render(__DIR__ . '/../../templates/index.php');
    }

}