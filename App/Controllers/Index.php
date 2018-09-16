<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

class Index extends Controller
{

    protected function handle()
    {
        $this->view->langs = $this->lang;
        $this->view->articles = Article::findMultiAll($_GET['page'] ?? null);
        echo $this->view->render(__DIR__ . '/../../templates/index.php');
    }

}