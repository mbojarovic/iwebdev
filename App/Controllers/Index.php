<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

class Index extends Controller
{

    protected function handle()
    {
        $this->view->langs = $this->lang;

        if(isset($_GET['page']))
        {

            $offset = ($_GET['page'] - 1) * $_GET['page'];
            var_dump($offset);
        }

        $this->view->articles = Article::findMultiAll($offset ?? 0, $_GET['page'] ?? 10);
        echo $this->view->render(__DIR__ . '/../../templates/index.php');
    }

    protected function pagination()
    {
        if(isset($_GET['page']))
        {
            $cnt = Article::countAll();
            echo $cnt;

            $starting_position = ($_GET['page'] - 1) * $records_per_page;
        }
        $query2=$query." limit $starting_position,$records_per_page";
        return $query2;
    }
}