<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;
use App\Classes\Pagination;

class Index extends Controller
{

    protected function handle()
    {
        $this->view->langs = $this->lang;

        $pagination = new Pagination();

        if(isset($_GET['page']))
        {
            $pagination->starting_position = ($_GET['page'] -1) * $pagination->records_per_page;
        }

        $this->view->articles = Article::findMultiAll($pagination->starting_position, $pagination->records_per_page);
        echo $this->view->render(__DIR__ . '/../../templates/index.php');

        $this->view->pagination = [
            'total_no_of_records' => $pagination->total_no_of_records,
            'records_per_page' => $pagination->records_per_page,
            'path' => $pagination->path
        ];
        echo $this->view->render(__DIR__ . '/../../templates/pagination.php');

    }
}